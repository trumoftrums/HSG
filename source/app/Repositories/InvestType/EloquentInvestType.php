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
}
