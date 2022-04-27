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
        'service_id',
        'tittle',
        'description',
        'image',
        'Deactivate'
    ];


    // public function service_name()
    // {
    //     return $this->belongsTo('App\Mst_Category','ser_name','Banner_ID');
    // }
}
