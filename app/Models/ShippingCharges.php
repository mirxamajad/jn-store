<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingCharges extends Model
{
    public $table="shipping_charges";

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'country',
        'states',
        'charges',
        'created_at',
        'updated_at',
    ];
}
