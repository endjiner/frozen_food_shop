<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // Pastikan user pernah membeli produk ini
        if (!auth()->user()->hasPurchased($product->id)) {
            return back()->with('error', 'Anda belum pernah membeli produk ini.');
        }

        // Cegah testimoni ganda
        if ($product->testimonials()->where('user_id', auth()->id())->exists()) {
            return back()->with('error', 'Anda sudah memberi testimoni untuk produk ini.');
        }

        $product->testimonials()->create([
            'user_id' => auth()->id(),
            'rating' => $request->rating,
            'content' => $request->content,
            'status' => 'pending', // akan diverifikasi oleh owner
        ]);

        return back()->with('success', 'Testimoni berhasil dikirim dan menunggu verifikasi.');
    }
}
