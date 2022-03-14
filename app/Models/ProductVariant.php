<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    public $table ='product_variants';


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
