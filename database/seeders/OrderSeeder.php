<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $buyer = User::where('role', 'buyer')->first();
        $products = Product::take(5)->get();

        if ($buyer && $products->count() >= 4) {
            // === Order 1 ===
            $order1 = Order::create([
                'user_id' => $buyer->id,
                'total_price' => ($products[0]->price * 2) + ($products[1]->price * 1),
                'status' => 'confirmed',
                'shipping_address' => 'Jl. Durian No. 5, Bekasi',
                'proof_of_payment' => 'proofs/dummy1.jpg',
            ]);

            OrderItem::create([
                'order_id' => $order1->id,
                'product_id' => $products[0]->id,
                'quantity' => 2,
                'subtotal' => $products[0]->price * 2,
            ]);

            OrderItem::create([
                'order_id' => $order1->id,
                'product_id' => $products[1]->id,
                'quantity' => 1,
                'subtotal' => $products[1]->price,
            ]);

            // === Order 2 ===
            $order2 = Order::create([
                'user_id' => $buyer->id,
                'total_price' => $products[2]->price * 3,
                'status' => 'pending',
                'shipping_address' => 'Jl. Anggrek No. 8, Tangerang',
                'proof_of_payment' => 'proofs/dummy2.jpg',
            ]);

            OrderItem::create([
                'order_id' => $order2->id,
                'product_id' => $products[2]->id,
                'quantity' => 3,
                'subtotal' => $products[2]->price * 3,
            ]);

            // === Order 3 ===
            $order3 = Order::create([
                'user_id' => $buyer->id,
                'total_price' => $products[3]->price,
                'status' => 'completed',
                'shipping_address' => 'Jl. Melati No. 12, Jakarta',
                'proof_of_payment' => 'proofs/dummy3.jpg',
            ]);

            OrderItem::create([
                'order_id' => $order3->id,
                'product_id' => $products[3]->id,
                'quantity' => 1,
                'subtotal' => $products[3]->price,
            ]);
        }
    }
}
