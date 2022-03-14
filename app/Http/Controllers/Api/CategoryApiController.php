<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
    public function index()
    {
        return new CategoryResource(Category::all());
    }
    public function show(Category $category)
    {
        $category->load('subcategory');
        $category->load('product')->with('image');
        $product = $category->load('product');
        $product['product']->load('image');
        return new CategoryResource($product);
    }
}
