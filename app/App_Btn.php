<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class App_Btn extends Model
{
    use SoftDeletes;

    protected $table = "app_btn";

    protected $fillable =[
        'App_Btn_ID',
        'service_id',
        'btn_name',
        'status'
    ];
}
