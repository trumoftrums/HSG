<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'document';
    const STATUS_ACTIVED = "AC";
    const  STATUS_INACTIVED = "IA";
    const  STATUS_DELETED = "DE";
    public $timestamps = true;
    public static function getList($status = null){
        $dt =array();
        if(!empty($status)){
            $dt = Document::join('project', 'project.id', '=', 'document.idProject')
                ->join('branch', 'branch.id', '=', 'project.idBranch')
                ->where("project.status",Project::STATUS_ACTIVED)
                ->where("branch.status",Branch::STATUS_ACTIVED)
                ->where("document.status",$status)
                ->select('document.*','branch.thumbBranch','branch.name as branchName','project.nameProject')
                ->get();


        }else{
            $dt = Document::join('project', 'project.id', '=', 'document.idProject')
                ->join('branch', 'branch.id', '=', 'project.idBranch')
                ->where("project.status",Project::STATUS_ACTIVED)
                ->where("branch.status",Branch::STATUS_ACTIVED)
                ->select('document.*','branch.thumbBranch','branch.name as branchName','project.nameProject')
                ->get();
        }
        return $dt;
    }
    public static function getDOc($id){
        $dt = Document::join('project', 'project.id', '=', 'document.idProject')
            ->join('branch', 'branch.id', '=', 'project.idBranch')
            ->where("project.status",Project::STATUS_ACTIVED)
            ->where("branch.status",Branch::STATUS_ACTIVED)
            ->where("document.id",$id)
            ->select('document.*','branch.thumbBranch','branch.name as branchName','project.nameProject')
            ->get();
        if(!empty($dt)){
            return $dt[0];
        }
        return null;
    }
}