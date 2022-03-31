<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Overview extends Model
{
    use SoftDeletes;

    protected $table = "mst_overview";

    protected $fillable =[
        'service_name',
        'tittle',
        'description',
        'updated_by'
    ];
}
