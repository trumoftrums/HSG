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

}
