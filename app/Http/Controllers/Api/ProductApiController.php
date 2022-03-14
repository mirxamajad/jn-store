<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    public function index()
    {
        return new ProductResource(Product::with('image')->get());
    }
    public function show(Product $product)
    {
        return new ProductResource($product->load(['image','productvariant']));
    }
}
