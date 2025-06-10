<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function create()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang kosong.');
        }

        $total = collect($cart)->sum('subtotal');

        return view('buyer.orders.checkout', compact('total'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'shipping_address' => 'required|string|max:500',
            'proof_of_payment' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('buyer.cart.index')->with('error', 'Keranjang kosong.');
        }

        DB::transaction(function () use ($request, $cart) {
            $total = collect($cart)->sum('subtotal');

            // Simpan bukti transfer
            $proofPath = $request->file('proof_of_payment')->store('proofs', 'public');

            // Simpan order utama
            $order = auth()->user()->orders()->create([
                'shipping_address'   => $request->shipping_address,
                'proof_of_payment'   => $proofPath,
                'total_price'        => $total,
                'status'             => 'pending',
            ]);

            // Simpan detail item pesanan
            foreach ($cart as $productId => $item) {
                $order->items()->create([
                    'product_id' => $productId,
                    'quantity'   => $item['quantity'],
                    'subtotal'   => $item['subtotal'],
                ]);
            }

            // Bersihkan keranjang
            session()->forget('cart');
        });

        return redirect()->route('buyer.orders.index')->with('success', 'Pesanan berhasil dibuat. Menunggu konfirmasi admin.');
    }

    // Menampilkan daftar pesanan user
    public function index()
    {
        $orders = auth()->user()->orders()->with('items.product')->get();
        return view('buyer.orders.index', compact('orders'));
    }
}
