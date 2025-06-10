@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Selamat Datang di Toko Frozen Food</h2>

    <p class="mb-5">
        Kami menyediakan berbagai makanan beku seperti nugget, sosis, bakso, dan lainnya.
        Segar, berkualitas, dan praktis!
    </p>

    {{-- === PRODUK TERBARU === --}}
    <div class="hstack justify-content-between gap-3 mb-4">
        <h4 class="mb-0">Produk Terbaru</h4>
        <a href="{{ route('buyer.products') }}" class="btn btn-primary rounded-pill px-4">Lihat Semua</a>
    </div>
    <div class="row justify-content-center g-4 mb-2">
        @forelse($latestProducts as $product)
            <div class="col-md-6 col-lg-3">
                <div class="card h-100">
                    <img 
                        src="{{ $product->image ? asset('storage/' . $product->image) : 'https://placehold.co/300x160' }}" 
                        class="card-img-top" 
                        style="object-fit: cover; height: 160px;"
                        alt="{{ $product->name }}">
                    <div class="card-body">
                        <h6 class="card-title mb-1">{{ $product->name }}</h6>
                        <p class="card-text small text-muted mb-2">
                            Rp{{ number_format($product->price, 0, ',', '.') }}
                        </p>
                        <a href="{{ route('buyer.products.show', $product->id) }}" class="btn btn-sm btn-outline-primary rounded-pill w-100">Lihat Detail</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Belum ada produk.</p>
        @endforelse
    </div>


    {{-- === BERITA TERBARU === --}}
    <h4 class="mt-5 mb-4">Berita & Promo</h4>
    @if($news->count())
        <div class="row g-4">
            @foreach($news as $item)
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h6 class="card-title">{{ $item->title }}</h6>
                            <p class="card-text small">{{ Str::limit($item->content, 100) }}</p>
                        </div>
                        <div class="card-footer text-muted small">
                            Diposting: {{ $item->published_at->format('d M Y') }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-muted">Belum ada berita atau promo.</p>
    @endif
@endsection