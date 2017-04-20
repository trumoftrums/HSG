<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Model;

class InvestDocs extends Model
{
    protected $table = 'invest_document';

    const TYPE_NOPTIEN = "Nộp tiền";
    const TYPE_TRALAI = "Trả lãi";
    const TYPE_HOANVON = "Hoàn vốn";

    public static function getByInvestID($id){

        if(!empty($id)){
            $datas = InvestDocs::where('investID',$id)->get()->toArray();
            if(!empty($datas)){
                return $datas;
            }
        }
        return null;
    }
}