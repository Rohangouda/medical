<?php

namespace App;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mst_Brand extends Model
{
    use SoftDeletes;

    protected $table = "mst_brands";

    protected $fillable =[
        'brand_name',
        'updated_by'
    ];
}
