<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FAQ extends Model
{
    use SoftDeletes;

    protected $table = "mst_faqs";

    protected $fillable =[
        'service_id',
        'que1',
        'ans1',
        'que2',
        'ans2',
        'que3',
        'ans3',
        'que4',
        'ans4',
        'que5',
        'ans5',
        'Deactivate'
    ];
}
