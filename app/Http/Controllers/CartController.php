<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductSize;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = $this->getOrCreateCart();
        $cart->load('items.product', 'items.size');

        return view('cart.index', compact('cart'));
    }

    public function add(Request $request, Product $product)
    {
        $request->validate([
            'product_size_id' => 'required|exists:product_sizes,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $size = ProductSize::where('id', $request->product_size_id)
            ->where('product_id', $product->id)
            ->firstOrFail();

        $request->validate([
            'quantity' => 'integer|min:1|max:'.$size->stock,
        ]);

        $cart = $this->getOrCreateCart();

        $item = $cart->items()
            ->where('product_id', $product->id)
            ->where('product_size_id', $size->id)
            ->first();

        if ($item) {
            $item->increment('quantity', $request->quantity);
        } else {
            $cart->items()->create([
                'product_id' => $product->id,
                'product_size_id' => $size->id,
                'quantity' => $request->quantity,
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Produit ajouté au panier.');
    }

    public function update(Request $request, $itemId)
    {
        $request->validate(['quantity' => 'required|integer|min:1']);

        $cart = $this->getOrCreateCart();
        $item = $cart->items()->findOrFail($itemId);
        $item->update(['quantity' => $request->quantity]);

        return redirect()->route('cart.index')->with('success', 'Panier mis à jour.');
    }

    public function remove($itemId)
    {
        $cart = $this->getOrCreateCart();
        $cart->items()->where('id', $itemId)->delete();

        return redirect()->route('cart.index')->with('success', 'Produit retiré du panier.');
    }

    private function getOrCreateCart(): Cart
    {
        return Cart::firstOrCreate(['user_id' => auth()->id()]);
    }
}