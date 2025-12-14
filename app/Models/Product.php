<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    public $timestamps = false;

    public function prices(){ return $this->hasMany('App\Models\ProductPrices','_product','id'); }
    public function category(){
        return $this->belongsTo('App\Models\ProductCategoriesVA', '_category');
    }
}
