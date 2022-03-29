<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Enquiry extends Model
{
    use  SoftDeletes;

    protected $table = "enquiries";

    protected $fillable =[
        'name',
        'email',
        'phone',
        'message'
    ];
}
