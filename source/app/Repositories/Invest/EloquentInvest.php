<?php

namespace Vanguard\Repositories\Invest;

use Vanguard\Invest;

class EloquentInvest implements InvestRepository
{
    /**
     * {@inheritdoc}
     */

    public function create(array $data)
    {
        if(!empty($data)){
            if(isset($data['_token'])){
                unset($data['_token']);
            }
//            var_dump($data);exit();
            return Invest::create($data);
        }
        return false;
    }

    public function updateStatus($status, $id)
    {
        $bd = Invest::find($id);
        $bd->status = $status;

        $bd->save();
    }

    public function paginate($perPage, $search = null, $status = null)
    {
        $query = Invest::join('users', 'users.id', '=', 'invest.userID')
        ->join('md_invest_type', 'md_invest_type.id', '=', 'invest.investTypeID')
        ->select(['invest.id','users.username', 'md_invest_type.typeName', 'invest.money', 'invest.interest', 'invest.estStartDate',
        'invest.estEndDate', 'invest.interestMethod', 'invest.status']);

        if ($status && $status != "All") {
            $query->where('invest.status', $status);
        }
        $result = $query->orderBy('invest.created_at', 'desc')
            ->paginate($perPage);

        return $result;
    }

}
