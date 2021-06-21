<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        return inertia('Checkout', [
            'intent' => auth()->user()->createSetupIntent(),
        ]);
    }

    public function purchase(Request $request, $total)
    {
        $user          = $request->user();
        $paymentMethod = $request->payment_method;

        try {
            $user->createOrGetStripeCustomer();
            $user->updateDefaultPaymentMethod($paymentMethod);
            $user->charge($total * 100, $paymentMethod);
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }

        return back()->with('message', 'Products purchased successfully!');
    }
}
