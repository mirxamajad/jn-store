<?php

namespace App\Http\Controllers;

use App\Models\CheckOut;
use App\Models\Product;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function handleAdmin()
    {
        $users = User::where('is_admin',0)->get();
        $amount = CheckOut::sum('amount');
        $product = Product::all();
        $totalOrders = CheckOut::count();
        return view('handleAdmin',compact('users','product','amount','totalOrders'));
    }
}
