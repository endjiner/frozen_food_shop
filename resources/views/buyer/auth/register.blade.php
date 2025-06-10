@extends('layouts.auth')

@section('title', 'Login Pembeli')

@section('content')
    <div class="card">
        <div class="card-header text-center py-3">
            <h4 class="h5 mb-0">Daftar Akun Pembeli</h4>
        </div>
        <div class="card-body">

            {{-- Error validation --}}
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('buyer.register.submit') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" name="name" id="name"
                            class="form-control" value="{{ old('name') }}" required autofocus>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email"
                            class="form-control" value="{{ old('email') }}" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password"
                            class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-control" required>
                </div>

                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-success rounded-pill">Daftar</button>
                </div>

                <div class="text-center small">
                    Sudah punya akun? <a href="{{ route('buyer.login') }}">Login di sini</a>
                </div>
            </form>

        </div>
        <div class="card-footer text-muted text-center small">
            &copy; {{ date('Y') }} Toko Frozen Food
        </div>
    </div>
@endsection