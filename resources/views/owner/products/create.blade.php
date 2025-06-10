@extends('layouts.owner')

@section('content')
    <h3 class="mb-4">Tambah Produk</h3>

    <form method="POST" action="{{ route('owner.products.store') }}" enctype="multipart/form-data">
        @csrf

        @include('owner.products.form', ['button' => 'Simpan'])
    </form>
@endsection