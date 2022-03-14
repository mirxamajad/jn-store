<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{

    public $table="sub_categories";

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'sluga',
        'category_id',
        'image',
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function childcategory()
    {
        return $this->hasMany(ChildCategory::class);
    }
    public function product()
    {
        return $this->belongsToMany(Product::class);
    }
}
