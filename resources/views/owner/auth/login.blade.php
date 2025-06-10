@extends('layouts.auth')

@section('title', 'Login Pembeli')

@section('content')
    <div class="card">
        <div class="card-header text-center py-3">
            <h4 class="h5 mb-0">Login Owner</h4>
        </div>
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('owner.login.submit') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email"
                            class="form-control" value="{{ old('email') }}" required autofocus>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password"
                            class="form-control" required>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Masuk sebagai Owner</button>
                </div>
            </form>

        </div>
        <div class="card-footer text-muted text-center small">
            Toko Frozen Food © {{ date('Y') }}
        </div>
    </div>
@endsection
