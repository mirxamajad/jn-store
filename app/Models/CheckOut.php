<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CheckOut extends Model
{
    public $table="check_outs";

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address_1',
        'address_2',
        'town',
        'postcode',
        'country',
        'amount',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function orderitem()
    {
        return $this->belongsToMany(OrderItem::class);
    }
}
