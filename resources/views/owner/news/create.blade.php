@extends('layouts.owner')

@section('content')
    <h3 class="mb-4">Tambah Berita</h3>
    <form method="POST" action="{{ route('owner.news.store') }}">
        @csrf
        @include('owner.news.form', ['button' => 'Simpan'])
    </form>
@endsection