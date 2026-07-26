<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Notifications\OrderConfirmed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = Cart::with('items.product', 'items.size')->where('user_id', auth()->id())->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Ton panier est vide.');
        }

        return view('checkout.index', compact('cart'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'address_street' => 'required|string|max:255',
            'address_city' => 'required|string|max:100',
            'address_postal' => 'required|string|max:10',
            'address_country' => 'required|string|max:100',
        ]);

        $cart = Cart::with('items.product', 'items.size')->where('user_id', auth()->id())->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Ton panier est vide.');
        }

        $order = DB::transaction(function () use ($cart, $request) {
            $order = Order::create([
                'user_id' => auth()->id(),
                'total' => $cart->total(),
                'status' => 'en_attente',
                'address_street' => $request->address_street,
                'address_city' => $request->address_city,
                'address_postal' => $request->address_postal,
                'address_country' => $request->address_country,
            ]);

            foreach ($cart->items as $item) {
                $order->items()->create([
                    'product_id' => $item->product_id,
                    'product_size_id' => $item->product_size_id,
                    'quantity' => $item->quantity,
                    'unit_price' => $item->product->price,
                ]);

                if ($item->size) {
                    $item->size->decrement('stock', $item->quantity);
                } else {
                    $item->product->decrement('stock', $item->quantity);
                }

                $item->product->refresh();
                $item->product->update([
                    'stock' => $item->product->sizes->isNotEmpty()
                        ? $item->product->sizes->sum('stock')
                        : $item->product->stock,
                ]);
            }

            $cart->items()->delete();

            return $order;
        });

        auth()->user()->notify(new OrderConfirmed($order));

        return redirect()->route('orders.show', $order)->with('success', 'Commande validée ! Un email de confirmation t\'a été envoyé.');
    }
}