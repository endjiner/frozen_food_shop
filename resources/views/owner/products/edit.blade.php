@extends('layouts.owner')

@section('content')
    <h3 class="mb-4">Edit Produk</h3>

    <form method="POST" action="{{ route('owner.products.update', $product) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('owner.products.form', ['button' => 'Perbarui'])
    </form>
@endsection