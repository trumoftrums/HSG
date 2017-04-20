<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    const STATUS_ACTIVED = "AC";
    const  STATUS_INACTIVED = "IA";
    const  STATUS_DELETED = "DE";
    public $timestamps = true;

}