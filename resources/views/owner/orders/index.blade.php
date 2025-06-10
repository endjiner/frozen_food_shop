@extends('layouts.owner')

@section('content')
    <h3 class="mb-4">Daftar Pesanan</h3>

    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th style="min-width: 10rem">Pembeli</th>
                    <th>Total Harga</th>
                    <th style="min-width: 12.5rem">Status</th>
                    <th style="min-width: 12.5rem">Alamat Pengiriman</th>
                    <th>Bukti Transfer</th>
                    <th style="min-width: 15rem">Item Pesanan</th>
                    <th style="min-width: 7.5rem">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>Rp{{ number_format($order->total_price, 0, ',', '.') }}</td>

                        {{-- === Ubah Status === --}}
                        <td>
                            <form action="{{ route('owner.orders.update', $order->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="input-group input-group-sm">
                                    <select name="status" class="form-select">
                                        @foreach(['pending', 'confirmed', 'processing', 'completed', 'rejected'] as $status)
                                            <option value="{{ $status }}" {{ $order->status === $status ? 'selected' : '' }}>
                                                {{ ucfirst($status) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button class="btn btn-outline-secondary" type="submit">
                                        <i class="bi bi-check"></i>
                                    </button>
                                </div>
                            </form>
                        </td>

                        {{-- === Alamat Pengiriman === --}}
                        <td>
                            <small>{{ $order->shipping_address }}</small>
                        </td>

                        {{-- === Bukti Transfer === --}}
                        <td class="text-nowrap">
                            @if($order->proof_of_payment)
                                <a href="{{ asset('storage/' . $order->proof_of_payment) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                    Lihat Bukti
                                </a>
                            @else
                                <span class="text-muted">Belum ada</span>
                            @endif
                        </td>

                        {{-- === Item Pesanan === --}}
                        <td>
                            <ul class="list-unstyled small mb-0">
                                @foreach($order->items as $item)
                                    <li>{{ $item->product->name }} ({{ $item->quantity }}x) - Rp{{ number_format($item->subtotal, 0, ',', '.') }}</li>
                                @endforeach
                            </ul>
                        </td>

                        <td>{{ $order->created_at->format('d M Y H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">Belum ada pesanan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection