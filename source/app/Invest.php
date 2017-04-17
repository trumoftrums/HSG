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
}