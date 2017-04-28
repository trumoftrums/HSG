<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'document';
    const STATUS_ACTIVED = "AC";
    const  STATUS_INACTIVED = "IA";
    const  STATUS_DELETED = "DE";
    public $timestamps = true;

}