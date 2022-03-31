<?php

namespace App;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use SoftDeletes;

    protected $table = "banner";

    protected $fillable =[
        'service_name',
        'tittle',
        'description',
        'updated_by'
    ];
}
