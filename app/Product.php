<?php

namespace App;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\ProductHistory;

class Product extends Model
{
    use SoftDeletes;

    protected $table = "products";

    protected $fillable =[
        'product_name',
        'price',
        'detail',
        'updated_by'
    ];
    public function rln_pro_cat()
    {
        return $this->hasOne('App\Rln_Product_Category','product_id','id');
    }
    public function productDetails() {
        return $this->hasMany(ProductHistory::class,'product_id')->withTrashed();
    }
    public function productExtraProp(){
        return $this->hasOne(ProductHistory::class,'product_id');
    }

    public function productImagesByMaster(){
        return $this->hasMany(Product_Image::class,'product_id');
    }
    public function productImages(){
        return $this->hasMany(Product_Image::class,'product_id');
    }
     public function productFirstImg(){
        return $this->hasOne(Product_Image::class,'product_id');
    }
    public function productOrderDetails()
    {
        return $this->hasMany(MasterOrder::class,'product_id')->withTrashed();
    }
    //sold item
    public function productSold() {
        return $this->hasMany(ProductHistory::class,'product_id','id')->whereNotNull('order_id')->where('order_status',2)->onlyTrashed();
    }

}
