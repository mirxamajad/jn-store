<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    public $table = 'images';

    protected $dates = [
        'created_at',
        'updated_at',
    ];
    protected $fillable =[
        'name',
        'created_at',
        'updated_at'
    ];

    public function product()
    {
        return $this->belongsToMany(Product::class);
    }

}
