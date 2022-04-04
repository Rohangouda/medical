<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Overview extends Model
{
    use SoftDeletes;

    protected $table = "mst_treatment_option";

    protected $fillable =[
        'service_name',
        'heading',
        'subheading',
        'acc_tittle_to',
        'bullet_tittle_to',
        'bullet_content_to',
        'acc_content_to',
        'Deactivate'
    ];
}
