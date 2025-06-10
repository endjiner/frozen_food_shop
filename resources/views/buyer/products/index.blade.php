@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($products->count())
        <div class="row justify-content-center g-4">
            @foreach($products as $product)
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100">
                        <img
                            src="{{ $product->image ? asset('storage/' . $product->image) : 'https://placehold.co/300x160' }}"
                            class="card-img-top"
                            style="object-fit: cover; height: 160px;"
                            alt="{{ $product->name }}">

                        <div class="card-body d-flex flex-column">
                            <h6 class="card-title">{{ $product->name }}</h6>
                            <p class="card-text small text-muted mb-2">
                                Rp{{ number_format($product->price, 0, ',', '.') }} <br>
                                <span class="text-success">Stok: {{ $product->stock }}</span>
                            </p>

                            <form method="POST" action="{{ route('buyer.cart.add', $product) }}" class="mt-auto">
                                @csrf
                                <button class="btn btn-sm btn-primary rounded-pill w-100">Tambah ke Keranjang</button>
                            </form>
                            <a href="{{ route('buyer.products.show', $product->id) }}" class="btn btn-sm btn-outline-primary rounded-pill w-100 mt-2">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $products->links() }}
        </div>
    @else
        <p class="text-muted">Tidak ada produk tersedia saat ini.</p>
    @endif
@endsection