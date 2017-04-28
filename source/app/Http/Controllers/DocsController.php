<?php

namespace Vanguard\Http\Controllers;

use Cache;
use Vanguard\Branch;
use Vanguard\Document;
use Vanguard\Http\Requests\Role\CreateRoleRequest;
use Vanguard\Http\Requests\Role\UpdateRoleRequest;
use Vanguard\Invest;
use Vanguard\InvestType;
use Vanguard\Project;
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
use Vanguard\InvestTrade;
use Vanguard\InvestDocs;

/**
 * Class InvestController
 * @package Vanguard\Http\Controllers
 */
class DocsController extends Controller
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
        $this->middleware('permission:docs.manage');
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

    public function listDocs(){

        $crBranch = "";
        $crProject ="";
        $crStatus ="";
        $result =array(
            'data'=>array(),
            'listBranch'=>Branch::getList(),
            'crBranch'=>$crBranch,
            'crProject'=>$crProject,
            'crStatus'=>$crStatus

        );
        $result['data'] = Document::getList();
        return view('docs.list-tai-lieu',$result);
    }
    public function getProject(){
        $result=array(
            'result'=>false,
            'mess'=>''
        );
        $formDT = Request::all();
        if(!empty($formDT) && !empty($formDT['idBranch'])){
            $result['data'] = Project::getList($formDT['idBranch']);
            if(!empty($result['data'])){
                $result['result'] =true;
            }
        }
        return response($result)
            ->withHeaders([
                'Content-Type' => 'application/json'
            ]);
    }
    public function addDoc(){
        $result =array(
            'data'=>array(),
            'listBranch'=>Branch::getList(),

        );
        return view('docs.add-edit',$result);

    }
    public function submitAddDoc(){
        $formDT = Request::all();
        $result = false;
        $mess = "";
        if(!empty($formDT['idProject']) && !empty($formDT['idBranch']) && !empty($formDT['nameFile'])  && !empty($formDT['fileDoc'])){
            $upload = $this->uploadDocs($formDT['idBranch'],$formDT['idBranch'],$_FILES['fileDoc']);
            if($upload['result']){
                $dt =date("Y-m-d H:i:s");
                $create =array(
                    'idProject'=>$formDT['idProject'],
                    'nameFile'=>$formDT['nameFile'],
                    'image'=>$upload['path'],
                    'status'=>Document::STATUS_ACTIVED
                );
                if(!empty($formDT['id'])){
                    $create['updated_at'] = $dt;
                    $r = DB::table("document")->where("id",$formDT['id'])->update($create);
                }else{
                    $create['created_at'] = $dt;
                    $r = DB::table("document")->insert($create);
                }

                if($r){
                    $result = true;
                    $mess ="Thêm tài liệu thành công!";
                }else{
                    $mess ="Thêm tài liệu thất bại, vui lòng thử lại sau!";
                }
            }else{
                $mess ="Upload tài liệu thất bại, vui lòng thử lại sau!";
            }

        }else{
            $mess ="Vui lòng điền đầy đủ thông tin bắt buộc!";
        }
        if ($result) {
            return redirect()->route('docs.tai-lieu.list')
                ->withSuccess($mess);
        } else {
            return redirect()->route('docs.tai-lieu.list')
                ->withErrors($mess);
        }

    }
    private function uploadDocs($idBranch = null, $idProject = null,$fdt = array())
    {
        $result =array(
            'name' =>'',
            'path' =>'',
            'result'=>false
        );
        if (!empty($idBranch) && !empty($idProject)&& !empty($fdt['name'])) {
            $uploads_dir = 'upload/docs/' . $idBranch.'/'.$idProject;
            if (!file_exists($uploads_dir)) {
                mkdir($uploads_dir, 0777,true);
            }
            $tmp_name = $fdt['tmp_name'];
            $nfname = $fdt['name'];


            if (file_exists("$uploads_dir/$nfname")) {
                $nfname = time()."-".$nfname;
            }
            $nPath = "$uploads_dir/$nfname";
            if (!file_exists($nPath)) {
                if (move_uploaded_file($tmp_name, $nPath)) {
                    $result['result'] =true;
                    $result['name'] =$nfname;
                    $result['path'] =$nPath;
                }
            }

        }
        return $result;

    }
    public function editDoc($id){
        $result =array(
            'idDoc'=>$id,
            'data'=>array(),
            'listBranch'=>Branch::getList(),

        );
        if(!empty($id)){
            $result['data'] = Document::getDOc($id);
            if(empty($result['data'])){
                return redirect()->route('docs.tai-lieu.list')
                    ->withErrors("Không tìm thấy tài liệu");
            }
        }else{
            return redirect()->route('docs.tai-lieu.list')
                ->withErrors("Không tìm thấy tài liệu");
        }
        return view('docs.add-edit',$result);
    }
    public function delDoc($id){

    }
    public function listDuAn(){

    }
    public function listChiNhanh(){

    }
}