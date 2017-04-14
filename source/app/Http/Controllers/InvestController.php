<?php

namespace Vanguard\Http\Controllers;

use Cache;
use Vanguard\Http\Requests\Role\CreateRoleRequest;
use Vanguard\Http\Requests\Role\UpdateRoleRequest;
use Vanguard\Invest;
use Vanguard\Repositories\Role\RoleRepository;
use Vanguard\Repositories\User\UserRepository;
use Vanguard\Repositories\InvestType\InvestTypeRepository;
use Vanguard\Repositories\Invest\InvestRepository;
use Vanguard\Role;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use  Request;
use DB;

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
            'edit' =>$edit,
            'listIVT' =>$listIVT
        );
        return view('invest.add-edit', $datas);
    }

    public function contract()
    {
        $edit = false;

        return view('invest.contract', compact('edit'));
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
    public function store(InvestTypeRepository $investTypes ,InvestRepository $invest )
    {
        if (Auth::check()) {
            $user = Auth::user();
            $formData = Request::all();

            if(!empty($formData['estStartDate']) && !empty($formData['money']) && !empty($formData['investTypeID'])){

                $estStartDate = $formData['estStartDate'];
                $money = str_replace(",","",$formData['money']);
                $formData['money'] = $money;
                $ivType = $investTypes->getTypebyID($formData['investTypeID'],true);
                if(!empty($formData['paymentReceipt'] ) && !empty($_FILES['paymentReceipt'])){
                    $formData['paymentReceipt'] = $this->uploadReceipt($user->id,$_FILES['paymentReceipt']);
                }
//                var_dump($formData);exit();

                if(!empty($ivType)){
                    $formData['status'] = Invest::STATUS_NEW;
                    $formData['userID'] = $user->id;
                    $formData['interest'] = $ivType['interest'];
                    $formData['further'] = $ivType['interestFurther'];
                    $formData['onetimeBonus'] = $ivType['onetimeBonus'];

                    $formData['estEndDate'] = date( "Y-m-d", strtotime( $formData['estStartDate']." + ".$ivType['period']." month" ) );

                    if(!empty($formData['interestMethod']) && $formData['interestMethod'] =="MONTHLY"){
                        $formData['nextPayment'] = date( "Y-m-d", strtotime( $formData['estStartDate']." + 1 month" ) );

                    }else{
                        $formData['nextPayment'] = $formData['estEndDate'];

                    }
                    if(isset($formData['_token'])){
                        unset($formData['_token']);
                    }

//                    var_dump($formData);exit();
                    $id = DB::table('invest')->insert([$formData]);
                    if(!empty($id) && $id>0){
                        //calculate result
                        $this->calculateInterest($id,$formData,$ivType['period']);


                    }
                }

            }
        }
        exit();
        return redirect()->route('role.index')
            ->withSuccess(trans('app.role_created'));
    }
    private function  calculateInterest($id,$formDT,$period){

        $money = $formDT['money'];
        $laiSuat = $formDT['interest'];
        $laiSuatBienDong = $formDT['further'];
        $thuongNhanLai1Lan = $formDT['onetimeBonus'];

        $saveDT = array(
            'investID' =>$id,
            'ngayBatDau' =>$formDT['estStartDate'],
            'loaiTien' =>$formDT['currency'],
            'soTienDauTu' =>$money,
            'investTypeID' =>$formDT['investTypeID'],
            'laiSuat' =>$formDT['interest'],
            'laiSuatBienDong' =>$formDT['further'],
            'laiKep' =>$formDT['isCompInterest'],
            'phanTramLaiKep' =>$formDT['compInterestPercent'],
            'hinhThucNhanLai' =>$formDT['interestMethod'],
            'ngayDaoHan' =>$formDT['estEndDate'],
            'thuongNhanLai1Lan' =>$formDT['onetimeBonus'],
            'taiDauTu'=>$formDT['isCompInterest'],

        );

        $ngayNhanLai = $saveDT['ngayDaoHan'];
        if($saveDT['hinhThucNhanLai'] == "MONTHLY"){
            $ngayNhanLai = "Ngày ".date("d",strtotime($saveDT['ngayBatDau']))." hàng tháng";
        }
//        var_dump($ngayNhanLai);exit();
        $laiHangThang = round($money*$laiSuat/1200,2);

        if($saveDT['laiKep']==1 && $saveDT['phanTramLaiKep']>0){
            $laiKepHT = array();
            $tongTienKep = $money;
            for($i = 0; $i<$period;$i++){
                $laiHangThang = $tongTienKep*$laiSuat/1200;
                $laiGop = $laiHangThang*$saveDT['phanTramLaiKep']/100;
                $tongTienKep +=  $laiGop;
                $laiKepHT[] = array(
                    'tienlai' =>$laiHangThang,
                    'gop' =>$laiGop,
                    'conlai' =>round($laiHangThang-$laiGop,2),
                    'tongTienDauTu' =>$tongTienKep
                );
            }
            var_dump($laiKepHT);exit();

        }else{
            $tongTien = $money + $laiHangThang*$period + $laiSuatBienDong*$money/100 ;
            if($saveDT['hinhThucNhanLai']=="ONETIME"){
                $tongTien +=  $tongTien*$thuongNhanLai1Lan/100;
            }
        }
        $tongTien = round($tongTien,2);

    }
    private function uploadReceipt($userID = null, $fdt =array()){
        if(!empty($userID) && !empty($fdt)){
            $uploads_dir = 'upload/invests/'.$userID;
            if(!file_exists($uploads_dir)){
                mkdir($uploads_dir,0777);
            }
            $tmp_name = $fdt['tmp_name'];
//            $name = basename($fdt["originalName"]);
            $orginName = explode(".",$fdt['name']);
            $ext = "";
            if(count($orginName)>1){
                $ext =".".$orginName[count($orginName)-1];
            }
            $nfname = md5_file($tmp_name).$ext;

            $nPath = "$uploads_dir/$nfname";

            if(!file_exists($nPath)){
                if(move_uploaded_file($tmp_name, $nPath)){
                    return $nPath;
                }
            }else{
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
        if (! $role->removable) {
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