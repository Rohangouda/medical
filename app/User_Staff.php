<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class User_Staff extends Model
{
use  SoftDeletes;

    protected $table = "user__staff";

    protected $fillable =[
        'first_name',
        'last_name',
        'email',
        'phone',
        'gender',
        'password',
        'address'
    ];
}
