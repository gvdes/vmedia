<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPrices extends Model
{
    protected $table = 'product_prices';

    public function pricelist(){ return $this->hasOne('App\Models\PriceLists','id','_type'); }
}
