<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUsModel extends Model
{
    protected $table = "xit_contact_us";

    protected $fillable =[
        'email',
        'mobile',
        'whatsapp_mobile',
        'address'
    ];
}
