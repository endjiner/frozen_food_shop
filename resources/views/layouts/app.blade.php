<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Toko Frozen Food</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.scss'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">

    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container g-5">
            <a class="navbar-brand" href="{{ route('home') }}">Toko Frozen Food</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('buyer.products') ? 'active' : '' }}" href="{{ route('buyer.products') }}">Produk</a>
                    </li>
                </ul>

                <div class="d-flex align-items-center">
                    @auth
                        <a href="{{ route('buyer.orders.index') }}" class="btn btn-outline-light btn-sm rounded-pill px-4 me-2">Pesanan Saya</a>
                        <a href="{{ route('buyer.cart.index') }}" class="btn btn-outline-light btn-sm rounded-pill px-4 me-2">Keranjang</a>
                        <form method="POST" action="{{ route('buyer.logout') }}" class="d-inline">
                            @csrf
                            <button class="btn btn-light rounded-pill px-4 btn-sm">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('buyer.login') }}" class="btn btn-light btn-sm rounded-pill px-4">Login</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    {{-- MAIN CONTENT --}}
    <main class="flex-grow-1">
        <div class="container g-5 py-4">
            @yield('content')
        </div>
    </main>

    {{-- FOOTER --}}
    <footer class="bg-light text-center text-muted py-3 mt-auto border-top">
        <div class="container g-5">
            &copy; {{ date('Y') }} Toko Frozen Food &middot;
            <a href="{{ route('contact') }}" class="text-decoration-none">Hubungi Kami</a>
        </div>
    </footer>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>