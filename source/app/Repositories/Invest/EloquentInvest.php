<?php

namespace Vanguard\Repositories\Invest;

use Vanguard\Invest;
use Vanguard\InvestType;

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
        $hd = Invest::find($id);
        $investType = InvestType::where('id', $hd->investTypeID)->first();
        $hd->status = $status;
        if ($status == Invest::STATUS_ACTIVED) {
            $hd->actStartDate = date("Y-m-d");
            $dateEnd = mktime(0, 0, 0, date("m") + $investType->period, date("d"), date("Y"));
            $hd->actEndDate = date('Y-m-d', $dateEnd);

        }

        $hd->save();
    }

    public function paginate($perPage, $search = null, $status = null)
    {
        $query = Invest::join('users', 'users.id', '=', 'invest.userID')
            ->join('md_invest_type', 'md_invest_type.id', '=', 'invest.investTypeID')
            ->select(['invest.id', 'users.username', 'md_invest_type.typeName', 'invest.money', 'invest.interest', 'invest.estStartDate',
                'invest.actEndDate', 'invest.actStartDate', 'invest.interestMethod', 'invest.status']);
        if ($status && $status != "All") {
            $query->where('invest.status', $status);
        }
        if ($search) {
            $timestamp = strtotime($search);
            $dateSearch = date("d", $timestamp);
            $query->where(function ($q) use ($search, $dateSearch) {
                $q->where('actStartDate', '<=', $search)
                    ->where('actEndDate', '>=', $search)
                    ->whereRaw("DAY(actStartDate) = ?", $dateSearch);
            });
        }
        $result = $query->orderBy('invest.created_at', 'desc')
            ->paginate($perPage);
        if ($search) {
            $result->appends(['search' => $search]);
        }

        return $result;
    }

}
