<?php

namespace Vanguard\Repositories\BienDong;

use Vanguard\BienDong;

class EloquentBienDong implements BienDongRepository
{
    /**
     * {@inheritdoc}
     */

    public function getByDate($date = null)
    {
        // TODO: Implement getTypebyID() method.
        if(!empty($date)){
            $where = " `fr` <='$date' and `to` >= '$date' " ;

            $datas = BienDong::whereRaw($where)->orderBy('updated_at', 'desc')->limit(1)->get()->toArray();
            if(!empty($datas)){
                return $datas[0]['interest'];
            }
        }

        return null;

    }

}
