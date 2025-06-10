@extends('layouts.owner')

@section('content')
    <h3 class="mb-4">Selamat Datang, {{ auth()->user()->name }}</h3>

    <div class="row g-4">
        <div class="col-md-6 col-lg-3">
            <div class="card border-start border-primary">
                <div class="card-body">
                    <h5 class="card-title">Produk</h5>
                    <p class="display-6">{{ $productCount }}</p>
                    <a href="{{ route('owner.products.index') }}" class="btn btn-sm btn-primary w-100">Kelola Produk</a>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card border-start border-success">
                <div class="card-body">
                    <h5 class="card-title">Pesanan</h5>
                    <p class="display-6">{{ $orderCount }}</p>
                    <a href="{{ route('owner.orders.index') }}" class="btn btn-sm btn-success w-100">Lihat Pesanan</a>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card border-start border-warning">
                <div class="card-body">
                    <h5 class="card-title">Testimoni</h5>
                    <p class="display-6">{{ $testimonialCount }}</p>
                    <a href="{{ route('owner.testimonials.index') }}" class="btn btn-sm btn-warning w-100">Lihat Testimoni</a>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card border-start border-info">
                <div class="card-body">
                    <h5 class="card-title">Berita</h5>
                    <p class="display-6">{{ $newsCount }}</p>
                    <a href="{{ route('owner.news.index') }}" class="btn btn-sm btn-info w-100">Kelola Berita</a>
                </div>
            </div>
        </div>
    </div>
@endsection