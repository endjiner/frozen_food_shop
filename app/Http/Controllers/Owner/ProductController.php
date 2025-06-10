<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('owner.products.index', compact('products'));
    }

    public function create()
    {
        return view('owner.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image',
        ]);

        $data = $request->only(['name', 'description', 'price', 'stock']);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);
        return redirect()->route('owner.products.index')->with('success', 'Produk ditambahkan');
    }

    public function edit(Product $product)
    {
        return view('owner.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image',
        ]);

        $data = $request->only(['name', 'description', 'price', 'stock']);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);
        return redirect()->route('owner.products.index')->with('success', 'Produk diupdate');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('success', 'Produk dihapus');
    }
}
