<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Alfi Kitchen') - Catering Harian & Acara</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,700;1,700&display=swap" rel="stylesheet">

    <!-- Swiper CSS (untuk efek carousel 3 card) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        :root {
            --primary: #E4701D;
            --primary-dark: #8D380F;
            --text-primary: #221608;
            --text-secondary: #4A3517;
            --background: #FDF7F1;
            --surface: #F7EBE1;
            --accent: #DBA36B;
            --border: #E0CBB7;
        }

        body {
            background-color: var(--background);
            color: var(--text-primary);
            font-family: 'Plus Jakarta Sans', sans-serif;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, .font-serif {
            font-family: 'Playfair Display', serif;
        }

        /* Navbar */
        .navbar {
            background-color: var(--background);
            border-bottom: 1px solid var(--border);
        }
        .navbar-brand {
            color: var(--primary-dark);
            font-weight: 800;
            font-size: 1.5rem;
            letter-spacing: -0.5px;
        }
        .navbar-brand span {
            color: var(--primary);
        }
        .nav-link {
            color: var(--text-secondary);
            font-weight: 500;
            transition: all 0.2s ease;
        }
        .nav-link:hover, .nav-link.active {
            color: var(--primary) !important;
            font-weight: 700;
        }

        .btn-custom-primary {
            background-color: var(--primary);
            color: #ffffff;
            border: none;
            border-radius: 50px;
            font-weight: 600;
            padding: 10px 24px;
            transition: all 0.3s ease;
        }
        .btn-custom-primary:hover {
            background-color: var(--primary-dark);
            color: #ffffff;
            transform: translateY(-2px);
        }

        /* Footer */
        footer {
            background-color: #1a1005;
            color: #d1c2b4;
            border-top: 1px solid var(--primary-dark);
        }
        footer a {
            color: #d1c2b4;
            text-decoration: none;
        }
        footer a:hover {
            color: var(--accent);
        }
    </style>
    @yield('styles')
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg sticky-top py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/') }}">
                <i class="bi bi-fire text-warning"></i>
                Alfi<span>Kitchen</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-lg-3 text-center">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('menu') ? 'active' : '' }}" href="{{ url('/menu') }}">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('testimoni') ? 'active' : '' }}" href="{{ url('/testimoni') }}">Testimoni</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{ url('/about') }}">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- CONTENT -->
    <main class="flex-grow-1">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="pt-5 pb-4 mt-5">
        <div class="container">
            <div class="row g-4 justify-content-between mb-4">
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-white fw-bold mb-3">
                        <i class="bi bi-fire text-warning"></i> Alfi<span style="color: var(--primary);">Kitchen</span>
                    </h4>
                    <p class="small leading-relaxed">
                        UMKM catering rumahan terpercaya sejak 2018. Menyajikan aneka masakan nusantara higienis, halal, dan lezat untuk segala acara.
                    </p>
                    <div class="d-flex gap-3 fs-5 mt-3">
                        <a href="https://facebook.com" target="_blank"><i class="bi bi-facebook"></i></a>
                        <a href="https://instagram.com" target="_blank"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <h5 class="text-white fw-bold mb-3">Hubungi Kami</h5>
                    <ul class="list-unstyled small d-flex flex-column gap-2 mb-0">
                        <li class="d-flex align-items-start gap-2">
                            <i class="bi bi-telephone-fill text-warning mt-1"></i>
                            <span>+62 812-3456-7890 (WhatsApp & Panggilan)</span>
                        </li>
                        <li class="d-flex align-items-start gap-2">
                            <i class="bi bi-geo-alt-fill text-warning mt-1"></i>
                            <span>Jl. Melati Raya No. 24, Kelurahan Sukamaju, Kecamatan Pancoran, Jakarta Selatan, DKI Jakarta 12780</span>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white fw-bold mb-3">Halaman</h5>
                    <ul class="list-unstyled small d-flex flex-column gap-2">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('/menu') }}">Menu Katering</a></li>
                        <li><a href="{{ url('/testimoni') }}">Testimoni Pelanggan</a></li>
                        <li><a href="{{ url('/about') }}">Tentang Kami</a></li>
                    </ul>
                </div>
            </div>

            <hr style="border-color: rgba(255,255,255,0.1);">
            <div class="text-center small pt-2">
                &copy; {{ date('Y') }} Alfi Kitchen. Seluruh Hak Cipta Dilindungi.
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    @yield('scripts')
</body>
</html>