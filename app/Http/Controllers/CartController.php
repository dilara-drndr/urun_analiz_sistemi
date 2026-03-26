<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // ✅ Sepete Ekle
    public function add($id)
    {
        $product = Product::findOrFail($id);

        $cart = Cart::firstOrCreate([
            'user_id' => Auth::id()
        ]);

        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $id)
            ->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $id,
                'quantity' => 1
            ]);
        }

        return redirect()->back()->with('success', 'Ürün sepete eklendi');
    }

    // ✅ Sepeti Listeleme
    public function index()
    {
        $cart = Cart::where('user_id', auth()->id())
                ->with('items.product')
                ->first();

        $total = 0;

        if ($cart && $cart->items->count()) {
            $total = $cart->items->sum(function ($item) {
                return $item->product->price * $item->quantity;
            });
        }

        return view('cart.index', compact('cart', 'total'));
    }
    public function increase($id)
    {
        $item = CartItem::findOrFail($id);
        $item->increment('quantity');

        return back();
    }

    public function decrease($id)
    {
        $item = CartItem::findOrFail($id);

        if ($item->quantity > 1) {
            $item->decrement('quantity');
        }

        return back();
    }
    public function remove($id)
    {
        $item = CartItem::findOrFail($id);
        $item->delete();

        return back();
    }
}

