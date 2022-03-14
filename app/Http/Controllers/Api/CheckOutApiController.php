<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CheckOutResource;
use App\Models\CheckOut;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckOutApiController extends Controller
{

    public function store(Request $request)
    {
            $checkout = new CheckOut;
            $checkout->name = $request->fullname;
            $checkout->email = $request->email;
            $checkout->phone = $request->phonenumber;
            $checkout->address_1 = $request->streetAddress;
            $checkout->country = $request->country;
            $checkout->town = $request->city;
            $checkout->postcode = $request->postalCode;
            $checkout->amount = $request->amount;
            $checkout->save();
            $order_id = $checkout->id;
                foreach ($request->orderitem as $key ) {
                    $orderItem = new OrderItem();
                    $orderItem->order_id = $order_id;
                    $orderItem->product_id = $key['product_id'];
                    $orderItem->quantity = $key['quantity'];
                    $orderItem->save();
                }
            return (new CheckOutResource([
                'orderId' => $order_id,
                'status' => 'Order Successfully created'
            ]))->response()->setStatusCode(Response::HTTP_CREATED);
    }
}
