<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Owner - Toko Frozen Food</title>
    @vite(['resources/css/app.scss'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container g-5">
            <a class="navbar-brand" href="{{ route('owner.dashboard') }}">Owner Panel</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarOwner"
                aria-controls="navbarOwner" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarOwner">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link{{ request()->is('dashboard') ? ' active' : '' }}" href="{{ route('owner.dashboard') }}">
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ request()->is('dashboard/products') ? ' active' : '' }}" href="{{ route('owner.products.index') }}">
                            Produk
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ request()->is('dashboard/orders') ? ' active' : '' }}" href="{{ route('owner.orders.index') }}">
                            Pesanan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ request()->is('dashboard/testimonials*') ? ' active' : '' }}" href="{{ route('owner.testimonials.index') }}">
                            Testimoni
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ request()->is('dashboard/news') ? ' active' : '' }}" href="{{ route('owner.news.index') }}">
                            Berita
                        </a>
                    </li>
                </ul>

                <form method="POST" action="{{ route('owner.logout') }}" class="d-inline">
                    @csrf
                    <button class="btn btn-light btn-sm">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <main class="container g-5 py-4">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>