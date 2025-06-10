@extends('layouts.app')

@section('content')
    {{-- === DETAIL PRODUK === --}}
    <div class="row mb-5">
        <div class="col-md-5">
            <img
                src="{{ $product->image ? asset('storage/' . $product->image) : 'https://placehold.co/600x400' }}"
                alt="{{ $product->name }}"
                class="img-fluid rounded mb-4"
                style="object-fit: cover; width: 100%; max-height: 400px;">
        </div>

        <div class="col-md-7">
            <h3>{{ $product->name }}</h3>
            <h5 class="text-success mb-3">Rp{{ number_format($product->price, 0, ',', '.') }}</h5>

            <p><strong>Stok:</strong> {{ $product->stock }}</p>

            @if($product->description)
                <p class="text-muted">{{ $product->description }}</p>
            @endif

            @if($product->stock > 0)
                <form action="{{ route('buyer.cart.add', $product) }}" method="POST" class="mt-4">
                    @csrf
                    <button class="btn btn-primary rounded-pill px-5">Tambah ke Keranjang</button>
                </form>
            @else
                <div class="alert alert-warning mt-3">Stok habis</div>
            @endif
        </div>
    </div>

    <hr>

    {{-- === TESTIMONI === --}}
    <div class="mt-4">
        <h4 class="mb-4">Testimoni Pembeli</h4>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @php
            $approvedTestimonials = $product->testimonials->where('status', 'approved');
        @endphp

        @if($approvedTestimonials->count())
            @foreach($approvedTestimonials as $testimonial)
                <div class="border-bottom pb-3 mb-3">
                    <p class="mb-1"><strong>{{ $testimonial->user->name }}</strong></p>
                    <p class="mb-1 text-warning">
                        @for($i = 1; $i <= 5; $i++)
                            <i class="bi bi-star{{ $i <= $testimonial->rating ? '-fill' : '' }}"></i>
                        @endfor
                    </p>
                    <p class="mb-0">{{ $testimonial->content }}</p>
                    <small class="text-muted">{{ $testimonial->created_at->format('d M Y') }}</small>

                    @if($testimonial->reply)
                        <div class="bg-light border rounded mt-2 p-2">
                            <strong>Balasan Toko:</strong>
                            <p class="mb-0">{{ $testimonial->reply }}</p>
                        </div>
                    @endif
                </div>
            @endforeach
        @else
            <p class="text-muted">Belum ada testimoni untuk produk ini.</p>
        @endif
    </div>

    {{-- === FORM TESTIMONI === --}}
    @auth
        @if(auth()->user()->hasPurchased($product->id))
            <div class="mt-4">
                <h5 class="mb-3">Tulis Testimoni Anda</h5>

                <form action="{{ route('buyer.testimonials.store', $product->id) }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Rating (1–5)</label>
                        <select name="rating" class="form-select" required>
                            <option value="">Pilih rating</option>
                            @for($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}" {{ old('rating') == $i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pesan</label>
                        <textarea name="content" rows="3" class="form-control" required>{{ old('content') }}</textarea>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">Kirim Testimoni</button>
                    </div>
                </form>
            </div>
        @else
            <div class="alert alert-warning mt-4">Anda harus membeli produk ini untuk mengirim testimoni.</div>
        @endif
    @endauth
@endsection