<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Stripe;
use Session;
class StripeController extends Controller
{
    /**
     * payment view
     */
    public function handleGet()
    {
        return view('home');
    }

    /**
     * handling payment with POST
     */
    // public function handlePost(Request $request)
    // {
    //     Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    //     Stripe\Charge::create ([
    //             'amount' => 100*10,
    //             'currency' => 'usd',
    //             "source" => $request->stripeToken,
    //             "description" => "Making test payment."
    //     ]);
    //     Session::flash('success', 'Payment has been successfully processed.');

    //     return back();
    // }
    public function checkout($amount)
    {
        \Stripe\Stripe::setApiKey('sk_test_sbzhHhQbF4eCX1sAhztinp8m00ABspl82b');
        $payment_intent = \Stripe\PaymentIntent::create([
			'description' => 'Stripe Test Payment',
			'amount' =>  $amount*100,
			'currency' => 'USD',
			'description' => 'Payment From Codehunger',
			'payment_method_types' => ['card'],
		]);
		$intent = $payment_intent->client_secret;
        return view('frontend.parts.stripe',compact('intent'));
    }
    public function afterPayment()
    {
        return ('Payment Has been Received');
    }
}
