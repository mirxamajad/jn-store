<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChildCategory extends Model
{
    public $table="child_categories";

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'sluga',
        'subcategory_id',
        'image',
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    public function subcategory()
    {
        return $this->belongsToMany(SubCategory::class);
    }
    public function product()
    {
        return $this->belongsToMany(Product::class);
    }
}
