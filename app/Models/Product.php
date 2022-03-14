<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = 'products';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'name',
        'brandname',
        'status',
        'price',
        'discount',
        'tags',
        'bestsallers',
        'dis',
        'newarrivel',
        'featured',
        'tags',
        'slugs',
        'sku',
        'summary',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function image()
    {
        return $this->belongsToMany(Images::class);
    }
    public function category()
    {
        return $this->belongsToMany(Category::class);
    }
    public function subcategory()
    {
        return $this->belongsToMany(SubCategory::class);
    }
    public function childcategory()
    {
        return $this->belongsToMany(ChildCategory::class);
    }
    public function productvariant()
    {
        return $this->hasMany(ProductVariant::class);
    }
}
