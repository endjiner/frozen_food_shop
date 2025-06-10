@extends('layouts.app')

@section('content')
    <h3 class="mb-4">Daftar Pesanan Saya</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($orders->count())
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Kode Pesanan</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Bukti Transfer</th>
                        <th>Detail Item</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>#{{ $order->id }}</td>
                            <td>Rp{{ number_format($order->total_price, 0, ',', '.') }}</td>
                            <td>
                                @php
                                    $badgeClass = match($order->status) {
                                        'pending' => 'bg-warning',
                                        'confirmed' => 'bg-info',
                                        'processing' => 'bg-primary',
                                        'completed' => 'bg-success',
                                        'rejected' => 'bg-danger',
                                        default => 'bg-secondary',
                                    };
                                @endphp
                                <span class="badge {{ $badgeClass }}">{{ ucfirst($order->status) }}</span>
                            </td>
                            <td>
                                @if($order->proof_of_payment)
                                    <a href="{{ asset('storage/' . $order->proof_of_payment) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                        Lihat
                                    </a>
                                @else
                                    <span class="text-muted">Tidak ada</span>
                                @endif
                            </td>
                            <td>
                                <ul class="mb-0 small">
                                    @foreach($order->items as $item)
                                        <li>{{ $item->product->name }} × {{ $item->quantity }}</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-muted">Belum ada pesanan.</p>
        <a href="{{ route('buyer.products') }}" class="btn btn-primary rounded-pill px-4 mt-3">Belanja Sekarang</a>
    @endif
@endsection