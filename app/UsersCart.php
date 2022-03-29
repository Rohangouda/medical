<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UsersCart extends Model
{
    use SoftDeletes;

    protected $table = "users_cart";

    protected $fillable =[
        'user_id',
        'product_id',
        'quantity',
        'updated_by'
    ];
}
