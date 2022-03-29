<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product_Image extends Model
{
    use  SoftDeletes;
    // InteractsWithMedia;

    protected $table = "product_image";

    protected $fillable =[
        'product_id',
        'image',
        'updated_by'
    ];
}
