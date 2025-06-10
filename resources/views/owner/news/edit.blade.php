@extends('layouts.owner')

@section('content')
    <h3 class="mb-4">Edit Berita</h3>
    <form method="POST" action="{{ route('owner.news.update', $news) }}">
        @csrf
        @method('PUT')
        @include('owner.news.form', ['button' => 'Perbarui'])
    </form>
@endsection