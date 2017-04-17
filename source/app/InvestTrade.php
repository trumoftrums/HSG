<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Model;

class InvestTrade extends Model
{
    protected $table = 'invest_trade';
    public $timestamps = true;
    const  TRADE_DAUTU =  'Đầu tư';
    const  TRADE_TRALAI =  'Tiền lãi';
    const  TRADE_DAOHAN =  'Đáo hạn';
}