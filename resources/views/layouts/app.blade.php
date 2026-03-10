<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Katalog Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('produk.index') }}">
            <i class="bi bi-box-seam"></i> Katalog Produk
        </a>

        <div class="d-flex align-items-center ms-auto">
            @auth
                <span class="text-white me-3">
                    <i class="bi bi-person-circle"></i> {{ Auth::user()->username }}
                </span>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-outline-light btn-sm px-3">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
            @endauth
        </div>
    </div>
</nav>

<main>
    @yield('content')
</main>

</body>
</html>