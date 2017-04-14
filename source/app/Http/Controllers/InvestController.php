<?php

namespace Vanguard\Http\Controllers;

use Cache;
use Vanguard\Http\Requests\Role\CreateRoleRequest;
use Vanguard\Http\Requests\Role\UpdateRoleRequest;
use Vanguard\Invest;
use Vanguard\Repositories\BienDong\BienDongRepository;
use Vanguard\Repositories\Role\RoleRepository;
use Vanguard\Repositories\User\UserRepository;
use Vanguard\Repositories\InvestType\InvestTypeRepository;
use Vanguard\Repositories\Invest\InvestRepository;
use Vanguard\Role;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use  Request;
use DB;
use Vanguard\InvestResult;

/**
 * Class InvestController
 * @package Vanguard\Http\Controllers
 */
class InvestController extends Controller
{
    /**
     * @var RoleRepository
     */
    private $roles;

    /**
     * RolesController constructor.
     * @param RoleRepository $roles
     */
    public function __construct(RoleRepository $roles)
    {
        $this->middleware('auth');
        $this->middleware('permission:roles.manage');
        $this->roles = $roles;


    }

    /**
     * Display page with all available roles.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $roles = $this->roles->getAllWithUsersCount();

        return view('role.index', compact('roles'));
    }

    /**
     * Display form for creating new role.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(InvestTypeRepository $investTypes)
    {
        $edit = false;
        $listIVT = $investTypes->getAll();
        $datas = array(
            'edit' => $edit,
            'listIVT' => $listIVT
        );
        return view('invest.add-edit', $datas);
    }

    public function contract()
    {
        $datas =array();
        if (Auth::check()) {
            $user = Auth::user();
            $where = " (`invest`.`status`='".Invest::STATUS_ACTIVED."' OR `invest`.`status`='".Invest::STATUS_NEW."') AND `invest`.`userID` = ".$user->id." ";
            $datas = DB::table('invest')
                ->join('invest_result', 'invest.id', '=', 'invest_result.investID')
                ->select('invest.*', 'invest_result.*')
                ->whereRaw($where)->get()->toArray();
            if(!empty($datas)){
                foreach ($datas as $k =>$v){
                    $v->ketQuaChiTiet = json_decode($v->ketQuaChiTiet,true);
                    //var_dump($v->ketQuaChiTiet);exit();
                    $datas[$k] = $v;
                }
            }


        }
        $result = array(
            'edit'=>false,
            'datas'=>$datas
        );


        return view('invest.contract', $result);
    }

    public function refundInvest()
    {
        $edit = false;

        return view('invest.refund-invest', compact('edit'));
    }


    /**
     * Store newly created role to database.
     *
     * @param CreateRoleRequest $request
     * @return mixed
     */
    public function store(InvestTypeRepository $investTypes, InvestRepository $invest, BienDongRepository $bd)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $formData = Request::all();

            if (!empty($formData['estStartDate']) && !empty($formData['money']) && !empty($formData['investTypeID'])) {

                $estStartDate = $formData['estStartDate'];
                $money = str_replace(",", "", $formData['money']);
                $formData['money'] = $money;
                $ivType = $investTypes->getTypebyID($formData['investTypeID'], true);
                if (!empty($formData['paymentReceipt']) && !empty($_FILES['paymentReceipt'])) {
                    $formData['paymentReceipt'] = $this->uploadReceipt($user->id, $_FILES['paymentReceipt']);
                }
//                var_dump($formData);exit();

                if (!empty($ivType)) {
                    $formData['status'] = Invest::STATUS_NEW;
                    $formData['userID'] = $user->id;
                    $formData['interest'] = $ivType['interest'];
                    $formData['further'] = $bd->getByDate($formData['estStartDate']);
                    $formData['onetimeBonus'] = $ivType['onetimeBonus'];

                    $formData['estEndDate'] = date("Y-m-d", strtotime($formData['estStartDate'] . " + " . $ivType['period'] . " month"));

                    if (!empty($formData['interestMethod']) && $formData['interestMethod'] == "MONTHLY") {
                        $formData['nextPayment'] = date("Y-m-d", strtotime($formData['estStartDate'] . " + 1 month"));

                    } else {
                        $formData['nextPayment'] = $formData['estEndDate'];

                    }
                    if (isset($formData['_token'])) {
                        unset($formData['_token']);
                    }

                    DB::beginTransaction();
                    $id = DB::table('invest')->insertGetId($formData,'id');
                    if (!empty($id) && $id > 0) {
                        //calculate result
                        $resultDT = $this->calculateInterest($id, $formData, $ivType['period']);
                        $r = DB::table('invest_result')->insert([$resultDT]);
                        if ($r) {
                            DB::commit();
                            $result = true;
                            $mess = "Tạo gói đầu tư thành công!";
                        } else {
                            DB::rollBack();
                        }

                    } else {
                        DB::rollBack();
                    }

                }

            }
        }

        return redirect()->route('invest.hop_dong')
            ->withSuccess($mess);
    }

    private function calculateInterest($id, $formDT, $period)
    {

        $money = $formDT['money'];
        $laiSuat = $formDT['interest'];
        $laiSuatBienDong = $formDT['further'];
        $thuongNhanLai1Lan = $formDT['onetimeBonus'];

        $saveDT = array(
            'investID' => $id,
            'ngayBatDau' => $formDT['estStartDate'],
            'loaiTien' => $formDT['currency'],
            'soTienDauTu' => $money,
            'investTypeID' => $formDT['investTypeID'],
            'laiSuat' => $formDT['interest'],
            'laiSuatBienDong' => $formDT['further'],
            'laiKep' => $formDT['isCompInterest'],
            'phanTramLaiKep' => $formDT['compInterestPercent'],
            'hinhThucNhanLai' => $formDT['interestMethod'],
            'ngayDaoHan' => $formDT['estEndDate'],
            'thuongNhanLai1Lan' => $formDT['onetimeBonus'],
            'taiDauTu' => $formDT['isCompInterest'],

        );

        $ngayNhanLai = $saveDT['ngayDaoHan'];
        if ($saveDT['hinhThucNhanLai'] == Invest::INTEREST_METHOD_MONTHLY) {
            $ngayNhanLai = "Ngày " . date("d", strtotime($saveDT['ngayBatDau'])) . " hàng tháng";

        }
        $saveDT['ngayNhanLai'] = $ngayNhanLai;
        $laiHangThang = round($money * $laiSuat / 1200, 2);
        $quyTrinhTraLai = array();
        $tongTienDT = $money;
        $tongLai = 0;
        for ($i = 0; $i < $period; $i++) {
            if ($saveDT['laiKep'] == 1 && $saveDT['phanTramLaiKep'] > 0) {
                $laiHangThang = $tongTienDT * $laiSuat / 1200;
                $laiGop = $laiHangThang * $saveDT['phanTramLaiKep'] / 100;
                $tongTienDT += $laiGop;
                $tongLai += $laiHangThang - $laiGop;

            } else {
                $laiGop = 0;
                $tongLai += $laiHangThang;
            }
            $quyTrinhTraLai[] = array(
                'tienlai' => $laiHangThang,
                'gop' => $laiGop,
                'conlai' => $laiHangThang - $laiGop,
                'tongTienDauTu' => $tongTienDT
            );

        }

        $tongTien = $quyTrinhTraLai[$period - 1]['tongTienDauTu'] + $tongLai + $laiSuatBienDong * $money / 100;
        if ($saveDT['hinhThucNhanLai'] == Invest::INTEREST_METHOD_ONETIME) {
            $tongTien += $money * $thuongNhanLai1Lan / 100;
        }
        $saveDT['tongTien'] =$tongTien;
        $saveDT['ketQuaChiTiet'] =json_encode($quyTrinhTraLai);

        return $saveDT;

    }

    private function uploadReceipt($userID = null, $fdt = array())
    {
        if (!empty($userID) && !empty($fdt)) {
            $uploads_dir = 'upload/invests/' . $userID;
            if (!file_exists($uploads_dir)) {
                mkdir($uploads_dir, 0777);
            }
            $tmp_name = $fdt['tmp_name'];
//            $name = basename($fdt["originalName"]);
            $orginName = explode(".", $fdt['name']);
            $ext = "";
            if (count($orginName) > 1) {
                $ext = "." . $orginName[count($orginName) - 1];
            }
            $nfname = md5_file($tmp_name) . $ext;

            $nPath = "$uploads_dir/$nfname";

            if (!file_exists($nPath)) {
                if (move_uploaded_file($tmp_name, $nPath)) {
                    return $nPath;
                }
            } else {
                return $nPath;
            }

        }
        return null;

    }

    /**
     * Display for for editing specified role.
     *
     * @param Role $role
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Role $role)
    {
        $edit = true;

        return view('role.add-edit', compact('edit', 'role'));
    }

    /**
     * Update specified role with provided data.
     *
     * @param Role $role
     * @param UpdateRoleRequest $request
     * @return mixed
     */
    public function update(Role $role, UpdateRoleRequest $request)
    {
        $this->roles->update($role->id, $request->all());

        return redirect()->route('role.index')
            ->withSuccess(trans('app.role_updated'));
    }

    /**
     * Remove specified role from system.
     *
     * @param Role $role
     * @param UserRepository $userRepository
     * @return mixed
     */
    public function delete(Role $role, UserRepository $userRepository)
    {
        if (!$role->removable) {
            throw new NotFoundHttpException;
        }

        $userRole = $this->roles->findByName('User');

        $userRepository->switchRolesForUsers($role->id, $userRole->id);

        $this->roles->delete($role->id);

        Cache::flush();

        return redirect()->route('role.index')
            ->withSuccess(trans('app.role_deleted'));
    }
}