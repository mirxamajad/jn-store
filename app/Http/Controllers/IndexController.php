<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $category = Category::all();
        $subcategory = SubCategory::all();
        $men = ChildCategory::where('sub_category_id','1')->get();
        $women = ChildCategory::where('sub_category_id','2')->get();
        $kids = ChildCategory::where('sub_category_id','3')->get();
        $fragrance = ChildCategory::where('sub_category_id','4')->get();
        $jewelery = ChildCategory::where('sub_category_id','5')->get();
        $makeups = ChildCategory::where('sub_category_id','6')->get();
        $product = Product::all();
        return view('welcome', compact('category','subcategory','men','women','kids','fragrance','jewelery','makeups','product'));
    }
    public function cart()
    {
        $category = Category::all();
        $subcategory = SubCategory::all();
        $men = ChildCategory::where('sub_category_id','1')->get();
        $women = ChildCategory::where('sub_category_id','2')->get();
        $kids = ChildCategory::where('sub_category_id','3')->get();
        $fragrance = ChildCategory::where('sub_category_id','4')->get();
        $jewelery = ChildCategory::where('sub_category_id','5')->get();
        $makeups = ChildCategory::where('sub_category_id','6')->get();
        $product = Product::all();
        return view('frontend.parts.cartview', compact('category','subcategory','men','women','kids','fragrance','jewelery','makeups','product'));
    }
    public function getProduct(Request $request)
    {
        $product = Product::find($request->id);
        return view('frontend.productView',compact('product'));
    }
    public function singnleproduct($id,$name)
    {
        $category = Category::all();
        $subcategory = SubCategory::all();
        $men = ChildCategory::where('sub_category_id','1')->get();
        $women = ChildCategory::where('sub_category_id','2')->get();
        $kids = ChildCategory::where('sub_category_id','3')->get();
        $fragrance = ChildCategory::where('sub_category_id','4')->get();
        $jewelery = ChildCategory::where('sub_category_id','5')->get();
        $makeups = ChildCategory::where('sub_category_id','6')->get();
        $product = Product::find($id);
        return view('frontend.singleProduct' , compact('category','subcategory','men','women','kids','fragrance','jewelery','makeups','product'));
    }
    public function allproduct($id,$slug)
    {
        $category = Category::all();
        $subcategory = SubCategory::all();
        $men = ChildCategory::where('sub_category_id','1')->get();
        $women = ChildCategory::where('sub_category_id','2')->get();
        $kids = ChildCategory::where('sub_category_id','3')->get();
        $fragrance = ChildCategory::where('sub_category_id','4')->get();
        $jewelery = ChildCategory::where('sub_category_id','5')->get();
        $makeups = ChildCategory::where('sub_category_id','6')->get();
        $cat = Category::where('id',$id)->get();
        $cates = SubCategory::where('category_id',$id)->get();
        return view('frontend.product' , compact('category','subcategory','men','women','kids','cat','fragrance','jewelery','makeups','cates'));
    }
    public function allsubproduct($cat,$id,$slug)
    {
        $category = Category::all();
        $subcategory = SubCategory::all();
        $men = ChildCategory::where('sub_category_id','1')->get();
        $women = ChildCategory::where('sub_category_id','2')->get();
        $kids = ChildCategory::where('sub_category_id','3')->get();
        $fragrance = ChildCategory::where('sub_category_id','4')->get();
        $jewelery = ChildCategory::where('sub_category_id','5')->get();
        $makeups = ChildCategory::where('sub_category_id','6')->get();
        $cat = SubCategory::where('id',$id)->get();
        $childcat = ChildCategory::where('sub_category_id',$id)->get();
        return view('frontend.products' , compact('category','subcategory','men','women','kids','cat','fragrance','jewelery','makeups','childcat'));
    }
    public function allchildproduct($subcat,$id,$slug)
    {
        $category = Category::all();
        $subcategory = SubCategory::all();
        $men = ChildCategory::where('sub_category_id','1')->get();
        $women = ChildCategory::where('sub_category_id','2')->get();
        $kids = ChildCategory::where('sub_category_id','3')->get();
        $fragrance = ChildCategory::where('sub_category_id','4')->get();
        $jewelery = ChildCategory::where('sub_category_id','5')->get();
        $makeups = ChildCategory::where('sub_category_id','6')->get();
        $cat = ChildCategory::where('id',$id)->get();
        return view('frontend.productz' , compact('category','subcategory','men','women','kids','cat','fragrance','jewelery','makeups'));
    }
    public function application()
    {
        $category = Category::all();
        $subcategory = SubCategory::all();
        $men = ChildCategory::where('sub_category_id','1')->get();
        $women = ChildCategory::where('sub_category_id','2')->get();
        $kids = ChildCategory::where('sub_category_id','3')->get();
        $fragrance = ChildCategory::where('sub_category_id','4')->get();
        $jewelery = ChildCategory::where('sub_category_id','5')->get();
        $makeups = ChildCategory::where('sub_category_id','6')->get();
        return view('frontend.app' , compact('category','subcategory','men','women','kids','fragrance','jewelery','makeups'));
    }
}
