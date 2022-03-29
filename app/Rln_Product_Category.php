<?php

namespace App;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rln_Product_Category extends Model
{
    use SoftDeletes;

    protected $table = "rln_product_categories";

    protected $fillable =[
        'product_id',
        'rln_category',
        'brand_id'
    ];
    public function category()
    {
        return $this->BelongsTo('App\Mst_Category','rln_category', 'id')->withTrashed();
    }
    public function brand()
    {
        return $this->BelongsTo('App\Mst_Brand', 'brand_id', 'id');
    }

    public function getProduct(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
    public function productImages(){
        return $this->hasMany(Product_Image::class,'product_id','id');
    }
}
