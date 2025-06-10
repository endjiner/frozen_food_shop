@extends('layouts.auth')

@section('title', 'Login Pembeli')

@section('content')
    <div class="card">
        <div class="card-header text-center py-3">
            <h4 class="h5 mb-0">Login Pembeli</h4>
        </div>
        <div class="card-body">

            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('buyer.login.submit') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required autofocus>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>

                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary rounded-pill">Login</button>
                </div>

                <div class="text-center small">
                    Belum punya akun? <a href="{{ route('buyer.register') }}">Daftar di sini</a>
                </div>
            </form>
        </div>
        <div class="card-footer text-muted text-center small">
            Toko Frozen Food © {{ date('Y') }}
        </div>
    </div>
@endsection