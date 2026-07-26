<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class PaymentController extends Controller
{
    public function checkout(Order $order)
    {
        abort_if($order->user_id !== auth()->id(), 403);

        Stripe::setApiKey(config('services.stripe.secret'));

        $lineItems = $order->items->map(function ($item) {
            return [
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => $item->product->name.
                            ($item->size ? ' ('.$item->size->size.')' : ''),
                    ],
                    'unit_amount' => (int) ($item->unit_price * 100),
                ],
                'quantity' => $item->quantity,
            ];
        })->toArray();

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('payment.success', $order).'?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('payment.cancel', $order),
            'customer_email' => auth()->user()->email,
        ]);

        return redirect($session->url);
    }

    public function success(Request $request, Order $order)
    {
        abort_if($order->user_id !== auth()->id(), 403);

        Stripe::setApiKey(config('services.stripe.secret'));

        $session = Session::retrieve($request->session_id);

        if ($session->payment_status === 'paid') {
            $order->update(['status' => 'en_cours']);
        }

        return view('payment.success', compact('order'));
    }

    public function cancel(Order $order)
    {
        abort_if($order->user_id !== auth()->id(), 403);

        return view('payment.cancel', compact('order'));
    }
}