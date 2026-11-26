<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alfi Kitchen - Catering Lezat & Higienis</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;0,800;1,600;1,700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <style>
        :root {
            --bg-site: #F8EDE3;
            --brand-terracotta: #E4701D;
            --brand-crimson: #7B2809;
            --brand-saffron: #F3A71C;
            --text-dark: #221608;
        }

        html, body {
            margin: 0;
            padding: 0;
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--text-dark);
            background-color: var(--bg-site);
            overflow-x: hidden;
        }

        /* ============================================================
           NAVBAR TRANSPARENT OVERLAY -> STICKY SAAT SCROLL
           ============================================================ */
        .ak-dynamic-navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background-color: transparent !important;
            border-bottom: none !important;
            padding-top: 1.25rem;
            padding-bottom: 1.25rem;
            transition: all 0.35s cubic-bezier(0.22, 1, 0.36, 1);
            z-index: 1040;
        }

        /* Teks Putih/Krem saat berada di atas Hero Gelap (Beranda) */
        .ak-dynamic-navbar.hero-dark-top .navbar-brand,
        .ak-dynamic-navbar.hero-dark-top .nav-link {
            color: #FFF9F2 !important;
        }
        .ak-dynamic-navbar.hero-dark-top .nav-link:hover,
        .ak-dynamic-navbar.hero-dark-top .nav-link.active {
            color: #F3A71C !important;
        }
        .ak-dynamic-navbar.hero-dark-top .btn-profile-icon {
            border: 1.5px solid rgba(255, 249, 242, 0.55) !important;
            color: #FFF9F2 !important;
            background: transparent !important;
        }
        .ak-dynamic-navbar.hero-dark-top .btn-profile-icon:hover {
            background: rgba(255, 249, 242, 0.15) !important;
        }

        /* Teks Gelap saat berada di atas Hero Terang (Menu, Testimoni, Riwayat, dll) */
        .ak-dynamic-navbar.hero-light-top .navbar-brand,
        .ak-dynamic-navbar.hero-light-top .nav-link {
            color: #221608 !important;
        }
        .ak-dynamic-navbar.hero-light-top .nav-link:hover,
        .ak-dynamic-navbar.hero-light-top .nav-link.active {
            color: #E4701D !important;
        }
        .ak-dynamic-navbar.hero-light-top .btn-profile-icon {
            border: 1.5px solid #8D380F !important;
            color: #8D380F !important;
            background: transparent !important;
        }
        .ak-dynamic-navbar.hero-light-top .btn-profile-icon:hover {
            background: #8D380F !important;
            color: #FFF9F2 !important;
        }

        /* Kondisi Setelah Di-scroll: Berubah Menjadi Sticky Solid Hangat */
        .ak-dynamic-navbar.is-scrolled {
            background-color: rgba(253, 247, 241, 0.96) !important;
            backdrop-filter: blur(12px);
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
            box-shadow: 0 10px 30px rgba(34, 22, 8, 0.08);
        }
        .ak-dynamic-navbar.is-scrolled .navbar-brand,
        .ak-dynamic-navbar.is-scrolled .nav-link {
            color: #221608 !important;
        }
        .ak-dynamic-navbar.is-scrolled .nav-link:hover,
        .ak-dynamic-navbar.is-scrolled .nav-link.active {
            color: #E4701D !important;
        }
        .ak-dynamic-navbar.is-scrolled .btn-profile-icon {
            border: 1.5px solid #8D380F !important;
            color: #8D380F !important;
        }

        /* Menu Mobile Collapse Background */
        @media (max-width: 991.98px) {
            .ak-dynamic-navbar .navbar-collapse.show,
            .ak-dynamic-navbar .navbar-collapse.collapsing {
                background-color: #FDF7F1;
                border-radius: 24px;
                padding: 1.25rem;
                margin-top: 0.75rem;
                box-shadow: 0 18px 40px rgba(34, 22, 8, 0.16);
            }
            .ak-dynamic-navbar.hero-dark-top .navbar-collapse.show .nav-link,
            .ak-dynamic-navbar.hero-dark-top .navbar-collapse.collapsing .nav-link {
                color: #221608 !important;
            }
            .ak-dynamic-navbar.hero-dark-top .navbar-collapse.show .btn-profile-icon {
                border-color: #8D380F !important;
                color: #8D380F !important;
            }
        }

        /* TOMBOL UTAMA */
        .btn-brand-orange {
            background-color: #E4701D !important;
            color: #FFFFFF !important;
            border-radius: 50px !important;
            padding: 10px 24px !important;
            font-weight: 600;
            border: none !important;
            box-shadow: 0 6px 18px rgba(228, 112, 29, 0.28);
            transition: all 0.25s ease;
        }
        .btn-brand-orange:hover {
            background-color: #c95d12 !important;
            color: #ffffff !important;
            transform: translateY(-2px);
        }

        /* FLOATING WHATSAPP BUTTON */
        .floating-wa-btn {
            position: fixed !important;
            bottom: 24px !important;
            right: 24px !important;
            background-color: #25D366 !important;
            color: #FFFFFF !important;
            width: 56px;
            height: 56px;
            border-radius: 50% !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            font-size: 28px !important;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.25) !important;
            z-index: 9999 !important;
            text-decoration: none !important;
            transition: transform 0.25s ease;
        }
        .floating-wa-btn:hover {
            transform: scale(1.08);
        }

        /* FOOTER RINGKAS & PENDEK */
        footer.ak-compact-footer {
            background-color: #3D1002 !important;
            color: rgba(253, 247, 241, 0.85) !important;
            padding: 2.25rem 0 1.75rem;
            margin-top: 0 !important;
        }
        footer.ak-compact-footer a {
            color: rgba(253, 247, 241, 0.82) !important;
            text-decoration: none;
            transition: color 0.2s ease;
        }
        footer.ak-compact-footer a:hover {
            color: #F3A71C !important;
        }
        footer.ak-compact-footer .btn-social {
            width: 36px;
            height: 36px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(255, 249, 242, 0.1);
            color: #FFF9F2 !important;
            border: none;
        }
        footer.ak-compact-footer .btn-social:hover {
            background-color: #F3A71C !important;
            color: #221608 !important;
        }
    </style>
</head>
<body>

    @php
        $isHome = request()->routeIs('home');
    @endphp

    <nav id="mainNavbar" class="navbar navbar-expand-lg ak-dynamic-navbar hero-dark-top">
        <div class="container">
            <a class="navbar-brand fs-4 fw-bold d-flex align-items-center" href="{{ route('home') }}" style="font-family: 'Playfair Display', serif;">
                <i class="bi bi-egg-fried me-2" style="color: #F3A71C;"></i>Alfi Kitchen
            </a>
            <button class="navbar-toggler border-0 bg-white bg-opacity-75 rounded-3 px-2 py-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto fw-medium align-items-center text-center my-2 my-lg-0">
                    <li class="nav-item">
                        <a class="nav-link px-3 py-2 {{ request()->routeIs('home') ? 'active fw-bold' : '' }}" href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 py-2 {{ request()->routeIs('menu') ? 'active fw-bold' : '' }}" href="{{ route('menu') }}">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 py-2 {{ request()->routeIs('testimoni') ? 'active fw-bold' : '' }}" href="{{ route('testimoni') }}">Testimoni</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 py-2 {{ request()->routeIs('about') ? 'active fw-bold' : '' }}" href="{{ route('about') }}">Tentang Kami</a>
                    </li>
                </ul>

                <div class="d-flex align-items-center justify-content-center gap-2 mt-2 mt-lg-0">
                    @auth
                        <a href="{{ route('orders.create') }}" class="btn btn-brand-orange rounded-pill px-4 py-2 d-inline-flex align-items-center">
                            <i class="bi bi-bag-heart me-2"></i>Pesan Sekarang
                        </a>
                        <div class="dropdown">
                            <button class="btn btn-profile-icon rounded-circle d-flex align-items-center justify-content-center p-0"
                                    type="button"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                    title="Akun Saya"
                                    style="width: 42px; height: 42px;">
                                <i class="bi bi-person fs-5"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm rounded-4 mt-2">
                                @if(Auth::user()?->role === 'admin')
                                    <li>
                                        <a class="dropdown-item py-2 fw-semibold" style="color: #8D380F;" href="{{ route('admin.dashboard') }}">
                                            <i class="bi bi-speedometer2 me-2"></i>Panel Admin
                                        </a>
                                    </li>
                                @endif
                                <li>
                                    <a class="dropdown-item py-2" href="{{ route('orders.history') }}">
                                        <i class="bi bi-clock-history me-2"></i>Riwayat Pesanan
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item py-2 text-danger fw-semibold">
                                            <i class="bi bi-box-arrow-right me-2"></i>Keluar
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-brand-orange rounded-pill px-4 py-2 d-inline-flex align-items-center">
                            <i class="bi bi-person me-2"></i>Masuk / Daftar
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- NOTIFIKASI GLOBAL MELAYANG (TANPA MENDORONG HERO KE BAWAH) -->
    @if (session('success'))
        <div class="position-fixed top-0 end-0 p-3" style="margin-top: 78px; z-index: 1080; max-width: 420px;">
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-lg rounded-4 mb-0" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="position-fixed top-0 end-0 p-3" style="margin-top: 78px; z-index: 1080; max-width: 420px;">
            <div class="alert alert-danger alert-dismissible fade show border-0 shadow-lg rounded-4 mb-0" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>Terjadi kesalahan input. Silakan periksa kembali isian formulir Anda.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    <!-- KONTEN HALAMAN (MENYATU LANGSUNG KE ATAS TANPA JARAK PUTIH) -->
    <main>
        @yield('content')
    </main>

    <!-- FLOATING WHATSAPP BUTTON -->
    <a href="https://wa.me/628xxxxxxxxxx?text=Halo%20Alfi%20Kitchen,%20saya%20ingin%20konsultasi%20menu"
       class="floating-wa-btn" target="_blank" title="Chat via WhatsApp">
        <i class="bi bi-whatsapp"></i>
    </a>

    <!-- FOOTER RINGKAS & PENDEK -->
    <footer class="ak-compact-footer">
        <div class="container">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 pb-3" style="border-bottom: 1px solid rgba(253, 247, 241, 0.15);">
                <a class="fs-5 fw-bold d-flex align-items-center text-white" href="{{ route('home') }}" style="font-family: 'Playfair Display', serif;">
                    <i class="bi bi-egg-fried me-2" style="color: #F3A71C;"></i>Alfi Kitchen
                </a>

                <div class="d-flex flex-wrap justify-content-center gap-4 small fw-medium">
                    <a href="{{ route('home') }}">Beranda</a>
                    <a href="{{ route('menu') }}">Daftar Menu</a>
                    <a href="{{ route('testimoni') }}">Testimoni</a>
                    <a href="{{ route('about') }}">Tentang Kami</a>
                </div>

                <div class="d-flex gap-2">
                    <a href="#" class="btn btn-sm btn-social rounded-circle" title="Instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="btn btn-sm btn-social rounded-circle" title="Facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="btn btn-sm btn-social rounded-circle" title="TikTok"><i class="bi bi-tiktok"></i></a>
                </div>
            </div>

            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center gap-2 pt-3 small" style="color: rgba(253, 247, 241, 0.65);">
                <span>&copy; {{ date('Y') }} Alfi Kitchen. 100% Halal &amp; Higienis.</span>
                <span>Buka Setiap Hari: 08.00 – 20.00 WIB</span>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script Transisi Navbar Transparan ke Sticky -->
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const navbar = document.getElementById('mainNavbar');
        function handleNavbarScroll() {
            if (window.scrollY > 35) {
                navbar.classList.add('is-scrolled');
            } else {
                navbar.classList.remove('is-scrolled');
            }
        }
        handleNavbarScroll();
        window.addEventListener('scroll', handleNavbarScroll);
    });
    </script>
</body>
</html>