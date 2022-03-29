<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductSlider extends Model
{
    use  SoftDeletes;
    protected $table = "xit_product_slider";

    protected $fillable =[
        'image_name',
        'order_id'
    ];
}
