<?php

namespace App\Http\Controllers;

use App\Models\ShippingCharges;
use Illuminate\Http\Request;

class ShippingChargesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $shipping=ShippingCharges :: all();
       return view('backend.shipping.index',compact('shipping'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $shipping = ShippingCharges::create($request->all());
        if (empty($shipping)) {
            return ('error');
        }else{
            return (' sucsess');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $shipping = ShippingCharges::find($id);
       return view('backend.shipping.show',compact('shipping'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shipping = ShippingCharges::find($id);
        return view('backend.shipping.edit',compact('shipping'));
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
        $ship= new ShippingCharges;
        $ship->exists = true;
        $ship->id = $id;
        $ship->states = $request->states;
        $ship->charges = $request->charges;
        $ship->save();
        return redirect()->route('shipping.index')->with('status','Shipping Charges Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ShippingCharges::find($id)->delete();
        return back();
    }
}
