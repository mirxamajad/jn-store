<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CheckOut;
use App\Models\ChildCategory;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ShippingCharges;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    public function index()
    {
        if (!empty(session('cart'))) {
            $category = Category::all();
            $subcategory = SubCategory::all();
            $men = ChildCategory::where('sub_category_id','1')->get();
            $women = ChildCategory::where('sub_category_id','2')->get();
            $kids = ChildCategory::where('sub_category_id','3')->get();
            $fragrance = ChildCategory::where('sub_category_id','4')->get();
            $jewelery = ChildCategory::where('sub_category_id','5')->get();
            $makeups = ChildCategory::where('sub_category_id','6')->get();
            $product = Product::all();
            $shipping = ShippingCharges::all();
            return view('frontend.parts.checkout',compact('shipping','category','subcategory','men','women','kids','fragrance','jewelery','makeups','product'));
        }else{
            return redirect('/')->with('modal','true');
        }
    }
    function store(Request $request )
    {
        // dd($request);
        $checkout = CheckOut::create($request->all());
        $order_id = $checkout->id;
        foreach (session('cart') as $id => $details) {
            $orderItem = new OrderItem;
            $orderItem->order_id = $order_id;
            $orderItem->product_id = $id;
            $orderItem->quantity = $details['quantity'];
            $orderItem->save();
        }
        session()->put('cart', []);

        return redirect('/')->with('modal','true');
    }
    public function getall()
    {
        if (!empty(Auth::user()->name)) {
            $checkout = CheckOut::all();
           return view('backend.order.index',compact('checkout'));
        }else{
            return redirect()->route('login');
        }
    }
    public function getCharges($id)
    {
        $shipping = ShippingCharges::find($id);
        return $shipping;
    }
}
