<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductSliders extends Model
{
    use  SoftDeletes;
    protected $table = "xit_product_sliders";

    protected $fillable =[
        'image_name',
        'updated_by'
    ];
}
