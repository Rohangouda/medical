<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductVisitUsers extends Model
{
    use  SoftDeletes;

    protected $table = "product_visit_user";
    protected $fillable = [
        'user_id',
        'product_id'
    ];

}
