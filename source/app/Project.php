<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project';
    const STATUS_ACTIVED = "AC";
    const  STATUS_INACTIVED = "IA";
    const  STATUS_DELETED = "DE";
    public $timestamps = true;

}