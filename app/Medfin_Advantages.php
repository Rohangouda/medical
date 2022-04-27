<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medfin_Advantages extends Model
{
    use SoftDeletes;

    protected $table = "mst_advantages";

    protected $fillable =[
        'service_id',
        'heading',
        'image',
        'Deactivate'
    ];
}
