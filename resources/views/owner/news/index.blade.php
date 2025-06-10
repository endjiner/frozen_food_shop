@extends('layouts.owner')

@section('content')
    <div class="hstack justify-content-between gap-3 mb-4">
        <h3 class="mb-0">Berita & Diskon</h3>
        <a href="{{ route('owner.news.create') }}" class="btn btn-success">Tambah Berita</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th style="min-width: 10rem">Judul</th>
                    <th style="min-width: 10rem">Tanggal</th>
                    <th style="min-width: 15rem">Konten</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($news as $n)
                    <tr>
                        <td>{{ $n->title }}</td>
                        <td>{{ $n->published_at->format('d M Y H:i') }}</td>
                        <td>{{ Str::limit($n->content, 80) }}</td>
                        <td class="text-nowrap">
                            <a href="{{ route('owner.news.edit', $n) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('owner.news.destroy', $n) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus berita ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center">Belum ada berita.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection