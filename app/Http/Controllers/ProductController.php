<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\Images;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('backend.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('backend.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $product = Product::create($request->all());
        $id= $product->id;
        $imageIdCollector= [];
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $key ) {
                $name = $key->getClientOriginalName();
                $path = public_path().'/product';
                $uplaod = $key->move($path,$name);
                $img = new Images;
                $img->name = $name;
                $img->save();
                $imgid = $img->id;
                array_push($imageIdCollector,$imgid);
            }
        }
        $product->image()->sync($request->input('img',$imageIdCollector));
        $product->category()->sync($request->input('category', []));
        $product->subcategory()->sync($request->input('subcategory', []));
        $product->childcategory()->sync($request->input('childcategory', []));
        return redirect()->route('products.index')->with('status','Product Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('backend.product.show',compact('product'));
    }
    public function edit(Product $product)
    {
        $childcategories = ChildCategory::all();
        $subcategories = SubCategory::all();
        $categories=Category::all();
        return view('backend.product.edit',compact('product','categories','childcategories' , 'subcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        $id= $product->id;
        $imageIdCollector= [];
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $key ) {
                $name = $key->getClientOriginalName();
                $path = public_path().'/product';
                $uplaod = $key->move($path,$name);
                $img = new Images;
                $img->name = $name;
                $img->save();
                $imgid = $img->id;
                array_push($imageIdCollector,$imgid);
            }
            $product->image()->sync($request->input('img',$imageIdCollector));
        }
        $product->category()->sync($request->input('category', []));
        $product->subcategory()->sync($request->input('subcategory', []));
        $product->childcategory()->sync($request->input('childcategory', []));
        return redirect()->route('products.index')->with('status','Product Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return back();
    }
}
