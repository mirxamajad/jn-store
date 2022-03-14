<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    //order_items
    public $table="order_items";

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function checkout()
    {
        return $this->belongsToMany(CheckOut::class);
    }
}
