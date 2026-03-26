<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store()
    {
        $cart = Cart::where('user_id', auth()->id())
            ->with('items.product')
            ->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->back()->with('error', 'Sepet boş.');
        }

        DB::transaction(function () use ($cart) {

            $total = 0;

            foreach ($cart->items as $item) {
                if ($item->product->stock < $item->quantity) {
                    throw new \Exception('Yeterli stok yok.');
                }
                $total += $item->product->price * $item->quantity;

                // stok düş
                $item->product->decrement('stock', $item->quantity);

                $product->increment('sales_count', $request->quantity);
            }

            Order::create([
                'user_id' => auth()->id(),
                'total_price' => $total
            ]);

            // sepeti temizle
            $cart->items()->delete();
        });

        return redirect('/')->with('success', 'Sipariş başarıyla oluşturuldu.');
    }

    public function index()
    {
        if (auth()->user()->role !== 'admin') {
            return redirect('/');
        }

        $orders = Order::with('user')
            ->latest()
            ->get();

        return view('admin.orders', compact('orders'));
    }

}
