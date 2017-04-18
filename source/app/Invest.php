<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Model;

class Invest extends Model
{
    protected $table = 'invest';
    const STATUS_NEW= "NE";
    const STATUS_ACTIVED = "AC";
    const  STATUS_INACTIVED = "IA";
    const  STATUS_DELETED = "DE";
    const  STATUS_REQUEST_REFUND= "RF";
    public $timestamps = true;
    const  INTEREST_METHOD_ONETIME =  'Cuối kỳ';
    const  INTEREST_METHOD_MONTHLY =  'Hàng tháng';
    public static function yeuCauHoanVon($id,$userID){

        if(!empty($id) && !empty($userID)){
            $where = " `status`='".Invest::STATUS_ACTIVED."' AND `userID` = ".$userID." AND `id`=".$id;
            $datas = Invest::whereRaw($where)->get()->toArray();
            if(!empty($datas)){
                $datas = $datas[0];
                $datas['status'] = 'RF';
                $datas['updated_at'] = date("Y-m-d H:i:s");
                $r = Invest::whereRaw($where)->update($datas);
                return $r;
            }
        }
        return false;
    }
}