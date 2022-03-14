<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
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
        $vari= ProductVariant ::all();
        return view('backend.variants.index',compact('vari'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products= Product::all();
        return view('backend.variants.create',compact('products'));
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
        for ($i=0; $i <count($request->status) ; $i++) {

            $vari = new ProductVariant;
            $vari->product_id= $request->product;
            $vari->size= $request->size[$i];
            $vari->color= $request->color[$i];
            $vari->quntity= $request->quntity[$i];
            $vari->status= $request->status[$i];
            // if ($request->hasFile('image')) {
            //     $key = $request->file('image');
            //     $name = $key->getClientOriginalName();
            //     $image_resize = Image::make($key->getRealPath());
            //     $image_resize->resize(300, 300);
            //     $image_resize->save(public_path('variants/' .$name));
            //     $vari->icon = $name;
            // }
            $vari->save();
        }
    return redirect()->route('productvariant.index')->with('status', 'Variants Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products=Product::all();
        $proVari=ProductVariant::find($id);
        return view('backend.variants.edit',compact('proVari','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vari = new ProductVariant;
        $vari->exists = true;
        $vari->id = $id;
        $vari->product_id= $request->product;
        $vari->size= $request->size;
        $vari->color= $request->color;
        $vari->quntity= $request->quntity;
        $vari->status= $request->status;
        // if ($request->hasFile('image')) {
        //     if ($request->hasFile('image')) {
        //         $file = $request->file('image');
        //         $extension = $file->getClientOriginalExtension();
        //         $filename= time().'.'.$extension;;
        //         $path = public_path().'/variant';
        //         $uplaod = $file->move($path,$filename);
        //         $vari->image = $filename;
        //         }
        // }
        $vari->save();
    return redirect()->route('productvariant.index')->with('status', 'Variants Added!');
    }
    public function destroy($id)
    {
        ProductVariant::find($id)->delete();
        return back();
    }
}
