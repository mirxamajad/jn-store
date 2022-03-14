<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table="categories";

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'sluga',
        'image_path',
        'image',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function subcategory()
    {
        return $this->hasMany(SubCategory::class);
    }
    public function product()
    {
        return $this->belongsToMany(Product::class);
    }
}
