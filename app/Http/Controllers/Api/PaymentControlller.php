<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\StripeClient;

class PaymentControlller extends Controller
{
    public function createPaymentIntent(Request $request){
        $stripe = new StripeClient('pk_test_51JvIZ1Ey3DjpASZjPAzcOwqhblOq2hbchp6i56BsjapvhWcooQXqh33XwCrKiULfAe7NKFwKUhn2nqURE7VZcXXf00wMDzp4YN');

        // Use an existing Customer ID if this is a returning customer.
        $customer = $stripe->customers->create();
        $ephemeralKey = $stripe->ephemeralKeys->create([
            'customer' => $customer->id,
        ], [
            'stripe_version' => '2022-08-01',
        ]);
        $intent = $stripe->paymentIntents->create([
            'amount' => $request->price * 100,
            'currency' => 'usd',
            'customer' => $customer->id,
            'automatic_payment_methods' => [
                'enabled' => true,
            ],

        ]);
        $paymentIntent = json_encode(
            [
              'paymentIntent' => $intent->client_secret,
              'ephemeralKey' => $ephemeralKey->secret,
              'customer' => $customer->id,
              'intent' => $intent,
              'publishableKey' => 'pk_test_51JvIZ1Ey3DjpASZjPAzcOwqhblOq2hbchp6i56BsjapvhWcooQXqh33XwCrKiULfAe7NKFwKUhn2nqURE7VZcXXf00wMDzp4YN'
            ]
          );
          return Api::setResponse('intent',$paymentIntent);
    }
}
