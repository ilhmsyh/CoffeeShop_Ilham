<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Coffee Shop')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Latar belakang efek galaxy */
        body {
            background: radial-gradient(circle, #1e3c72 0%, #2a5298 50%, #000000 100%);
            color: #fff;
            font-family: 'Arial', sans-serif;
            height: 100vh;
            overflow-x: hidden;
            position: relative;
        }

        /* Animasi bintang */
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 200%;
            height: 200%;
            background: url('https://www.transparenttextures.com/patterns/stardust.png') repeat;
            animation: starryBG 100s linear infinite;
            z-index: -1;
        }

        @keyframes starryBG {
            0% { transform: translate(0, 0); }
            100% { transform: translate(-50%, -50%); }
        }

        /* Navbar */
        .navbar {
            background: rgba(30, 30, 30, 0.8);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
        }
        .navbar-brand {
            font-size: 2.5rem;
            font-weight: bold;
            color: #f9a825;
            text-transform: uppercase;
            text-shadow: 2px 2px 10px rgba(255, 255, 0, 0.5);
            transition: all 0.3s ease;
        }
        .navbar-brand:hover {
            text-shadow: 4px 4px 20px rgba(255, 255, 0, 1);
            transform: scale(1.1);
        }
        .nav-link {
            color: #ddd;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }
        .nav-link:hover {
            color: #f9a825;
            text-decoration: underline;
        }

        /* Tombol Cetak */
        .btn-cetak {
            background: linear-gradient(45deg, #43cea2, #185a9d);
            color: white;
            font-size: 1.1rem;
            border: none;
            border-radius: 30px;
            padding: 10px 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .btn-cetak:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 255, 255, 0.6);
        }

        /* Card Style untuk Konten */
        .container {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 20px 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(15px);
        }

        /* Footer */
        footer {
            background: rgba(0, 0, 0, 0.9);
            padding: 20px;
            text-align: center;
            color: #bbb;
            font-size: 1rem;
        }
        footer a {
            color: #f9a825;
            text-decoration: none;
        }
        footer a:hover {
            text-decoration: underline;
            color: #fff;
        }

        /* Responsif */
        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 2rem;
            }
            .nav-link {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <span class="navbar-brand">Ilhamkzz Coffee & eatery</span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">
                                <i class="fas fa-home"></i> Home
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kasir.index') }}">
                            <i class="fas fa-cash-register"></i> Kasir
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('produk.index') }}">
                            <i class="fas fa-coffee"></i> Produk
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('transaksi.index') }}">
                            <i class="fas fa-exchange-alt"></i> Transaksi
                        </a>
                    </li>
                    @if (Auth::check())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item btn-logout">
                                            <i class="fas fa-sign-out-alt"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>@yield('title', '')</h1>
            @if (request()->routeIs('transaksi.index') || request()->routeIs('transaksi.show'))
                <button class="btn btn-cetak" onclick="window.print()">
                    <i class="fas fa-print"></i> Cetak
                </button>
            @endif
        </div>

        @yield('content')
    </div>

    <footer>
        <p>&copy; 2025 Ilhamkzz coffee & eatery. Designed by <a href="#">Muhammad Ilhamsyah</a>.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
