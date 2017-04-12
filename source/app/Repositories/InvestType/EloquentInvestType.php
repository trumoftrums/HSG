<?php

namespace Vanguard\Repositories\InvestType;

use Vanguard\InvestType;

class EloquentInvestType implements InvestTypeRepository
{
    /**
     * {@inheritdoc}
     */
    public function getAll($status = null)
    {
        $where = " 1=1 ";
        if(!empty($status)){
            $where  .= " AND status ='".$status."' ";
        }
        $datas = InvestType::whereRaw($where)->get();
        return $datas;
    }

    public function getTypebyID($id = null,$toArray =false)
    {
        // TODO: Implement getTypebyID() method.
        $datas = null;
        if(!empty($id)){
            $where = "id =$id" ;

            $datas = InvestType::whereRaw($where)->get();
            if($toArray){
                $datas = $datas->toArray();
            }
            if(!empty($datas)){
                $datas = $datas[0];
            }

        }

        return $datas;

    }

}
