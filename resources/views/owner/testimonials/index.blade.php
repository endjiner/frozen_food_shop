@extends('layouts.owner')

@section('content')
    <h3 class="mb-4">Testimoni Pelanggan</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th style="min-width: 10rem">Pelanggan</th>
                    <th style="min-width: 10rem">Produk</th>
                    <th>Rating</th>
                    <th style="min-width: 15rem">Isi Testimoni</th>
                    <th>Balasan</th>
                    <th style="min-width: 15rem">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($testimonials as $t)
                    <tr>
                        <td>{{ $t->user->name }}</td>
                        <td>{{ $t->product->name }}</td>
                        <td>
                            <span class="badge bg-warning text-dark">{{ $t->rating }} / 5</span>
                        </td>
                        <td>{{ $t->content }}</td>
                        <td>
                            @if($t->reply)
                                <div class="text-success">{{ $t->reply }}</div>
                            @else
                                <span class="text-muted">Belum dibalas</span>
                            @endif
                        </td>
                        <td>
                            @if(!$t->reply)
                            <form action="{{ route('owner.testimonials.reply', $t->id) }}" method="POST">
                                @csrf
                                <div class="mb-2">
                                    <textarea name="reply" rows="2" class="form-control" placeholder="Balasan owner..."></textarea>
                                </div>
                                <button class="btn btn-sm btn-success">Balas & Setujui</button>
                            </form>
                            @else
                                <span class="badge bg-success">Sudah dibalas</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center">Belum ada testimoni.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection