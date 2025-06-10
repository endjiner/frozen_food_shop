@extends('layouts.app')

@section('content')
    <h3 class="mb-4">Keranjang Belanja Anda</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(count($cart) > 0)
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Produk</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $id => $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>Rp{{ number_format($item['price'], 0, ',', '.') }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>Rp{{ number_format($item['subtotal'], 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('buyer.cart.remove', $id) }}" method="POST" onsubmit="return confirm('Hapus item ini dari keranjang?')">
                                    @csrf
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <tr class="fw-bold">
                        <td colspan="3" class="text-end">Total</td>
                        <td colspan="2">Rp{{ number_format($total, 0, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <a href="{{ route('buyer.checkout.form') }}" class="btn btn-success rounded-pill px-5">Checkout Sekarang</a>
    @else
        <div class="alert alert-info">Keranjang Anda kosong.</div>
        <a href="{{ route('buyer.products') }}" class="btn btn-primary rounded-pill mt-3">Lihat Produk</a>
    @endif
@endsection