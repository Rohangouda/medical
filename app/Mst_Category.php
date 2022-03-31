<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Mst_Category extends Model
{
    use  SoftDeletes;

    protected $table = "mst_services";
    
    protected $fillable =[
        'ser_name',
        'service_id',
        'tags',
        'level',
        'rel_id'
    ];
}
