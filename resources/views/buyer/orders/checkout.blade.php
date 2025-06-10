@extends('layouts.app')

@section('content')
    <h3 class="mb-4">Checkout</h3>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('buyer.checkout.process') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Alamat Pengiriman</label>
            <textarea name="shipping_address" class="form-control" rows="3" required>{{ old('shipping_address') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Upload Bukti Transfer</label>
            <input type="file" name="proof_of_payment" class="form-control" accept="image/*,application/pdf" required>
            <small class="text-muted">Format JPG, PNG, atau PDF. Maks 2MB.</small>
        </div>

        <div class="mb-4">
            <label class="form-label">Total Pembayaran</label>
            <div class="fw-bold fs-5">Rp{{ number_format($total, 0, ',', '.') }}</div>
        </div>
        <button type="submit" class="btn btn-success rounded-pill px-4">Konfirmasi & Buat Pesanan</button>
    </form>
@endsection