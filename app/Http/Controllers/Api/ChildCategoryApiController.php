<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ChildCategoryResource;
use App\Models\ChildCategory;
use Illuminate\Http\Request;

class ChildCategoryApiController extends Controller
{
    public function index()
    {
        return new ChildCategoryResource(ChildCategory::all());
    }
    public function show(ChildCategory $childcategory)
    {
        $product = $childcategory->load('product');
        $product['product']->load('image');
        return new ChildCategoryResource($product);
    }
}
