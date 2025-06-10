<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Product;

class ProductController extends Controller
{
    public function home()
    {
        $latestProducts = Product::latest()->take(4)->get();
        $news = News::latest()->get();

        return view('buyer.home', compact('latestProducts', 'news'));
    }

    public function index()
    {
        $products = Product::latest()->paginate(8);;
        return view('buyer.products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::with(['testimonials.user'])->findOrFail($id);
        return view('buyer.products.show', compact('product'));
    }
}
