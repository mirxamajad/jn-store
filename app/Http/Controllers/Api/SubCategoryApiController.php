<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SubCategoryResource;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryApiController extends Controller
{
    public function index()
    {
        return new SubCategoryResource(SubCategory::all());
    }
    public function show(SubCategory $subcategory)
    {
        $subcategory->load('childcategory');
        $product = $subcategory->load('product');
        $product['product']->load('image');
        return new SubCategoryResource($product);
    }
}
