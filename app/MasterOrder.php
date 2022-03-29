<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterOrder extends Model
{
    use  SoftDeletes;

    protected $table = "mst_order";
    
    protected $fillable =[
        'user_id',
        'order_id',
        'product_id',
        'order_mode',
        'order_quantity',
        'order_price',
        'order_mrp',
        'order_discount',
        'order_flag',
        'created_by'
    ];

    //-----Relationship-----
    public function productDetails(){
        return $this->hasMany(Product::class, 'id','product_id')->withTrashed();
    }

    public function getUser(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
