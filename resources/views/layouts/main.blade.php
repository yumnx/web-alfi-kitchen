<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alfi Kitchen - Catering Lezat & Higienis</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <style>
        :root {
            --bg-site: #F4F1EA;
            --brand-terracotta: #D9531E;
            --brand-saffron: #E9C46A;
            --brand-green: #2A9D8F;
            --brand-dark: #264653;
            --text-dark: #1D2D35;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--text-dark);
            background-color: var(--bg-site) !important;
        }

        /* PERBAIKAN 1: NAVBAR BERWARNA KREM HANGAT DENGAN LIS TERRACOTTA */
        nav.custom-navbar {
            background-color: #EFECE6 !important;
            border-bottom: 3px solid #D9531E !important;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        .navbar-brand {
            font-weight: 700;
            color: #D9531E !important;
        }

        .nav-link {
            color: #264653 !important;
            font-weight: 600;
        }

        .nav-link:hover, .nav-link.active {
            color: #D9531E !important;
        }

        /* TOMBOL UTAMA */
        .btn-brand-orange {
            background-color: #D9531E !important;
            color: #FFFFFF !important;
            border-radius: 50px !important;
            padding: 10px 24px !important;
            font-weight: 600;
            border: none !important;
        }

        .btn-brand-orange:hover {
            background-color: #be4313 !important;
            color: #ffffff !important;
        }

        /* FLOATING WHATSAPP BUTTON */
        .floating-wa-btn {
            position: fixed !important;
            bottom: 25px !important;
            right: 25px !important;
            background-color: #25D366 !important;
            color: #FFFFFF !important;
            width: 60px;
            height: 60px;
            border-radius: 50% !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            font-size: 30px !important;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.25) !important;
            z-index: 99999 !important;
            text-decoration: none !important;
        }

        /* PERBAIKAN 2: FOOTER TERANG & MELENGKUNG LEBAR */
        footer.custom-footer {
            background-color: #264653 !important; /* Dark Teal Elegan */
            color: #FFFFFF !important;
            border-radius: 32px 32px 0 0 !important; /* Sudut Melengkung Atas */
            padding-top: 50px;
            padding-bottom: 30px;
        }

        footer.custom-footer h5,
        footer.custom-footer h6 {
            color: #E9C46A !important; /* Judul Warna Emas Saffron */
            font-weight: 700;
        }

        footer.custom-footer p,
        footer.custom-footer li,
        footer.custom-footer a,
        footer.custom-footer small {
            color: #E2ECE9 !important; /* Teks Putih Terang Jelas */
            text-decoration: none;
        }

        footer.custom-footer a:hover {
            color: #E9C46A !important;
        }

        footer.custom-footer .btn-social {
            color: #FFFFFF !important;
            border-color: #E9C46A !important;
        }

        footer.custom-footer .btn-social:hover {
            background-color: #E9C46A !important;
            color: #264653 !important;
        }
    </style>
</head>
<body>

    <!-- NAVBAR DENGAN WARNA HANGAT (LINGKARAN BIRU) -->
    <nav class="navbar navbar-expand-lg custom-navbar sticky-top py-3">
        <div class="container">
            <a class="navbar-brand fs-4" href="/">
                <i class="bi bi-egg-fried me-2"></i>Alfi Kitchen
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto fw-medium">
                    <li class="nav-item"><a class="nav-link px-3" href="/">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="/menu">Menu</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="/about">Tentang Kami</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="/testimoni">Testimoni</a></li>
                </ul>
                <a href="https://wa.me/628xxxxxxxxxx?text=Halo%20Alfi%20Kitchen,%20saya%20ingin%20pesan%20catering"
                   target="_blank" class="btn btn-brand-orange">
                    <i class="bi bi-whatsapp me-2"></i>Pesan Sekarang
                </a>
            </div>
        </div>
    </nav>

    <!-- KONTEN HALAMAN -->
    <main class="py-2">
        @yield('content')
    </main>

    <!-- FLOATING WHATSAPP BUTTON -->
    <a href="https://wa.me/628xxxxxxxxxx?text=Halo%20Alfi%20Kitchen,%20saya%20ingin%20konsultasi%20menu"
       class="floating-wa-btn" target="_blank" title="Chat via WhatsApp">
        <i class="bi bi-whatsapp"></i>
    </a>

    <!-- FOOTER TERANG & RAPI (LINGKARAN MERAH) -->
    <footer class="custom-footer mt-5">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6">
                    <h5 class="mb-3 fs-4">
                        <i class="bi bi-egg-fried me-2"></i>Alfi Kitchen
                    </h5>
                    <p class="small mb-0">Menyediakan layanan catering rumahan, nasi box, hingga event besar dengan bahan segar, higienis, dan 100% halal.</p>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h6 class="mb-3">Navigasi</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="/">Beranda</a></li>
                        <li class="mb-2"><a href="/menu">Daftar Menu</a></li>
                        <li class="mb-2"><a href="/about">Tentang Kami</a></li>
                        <li class="mb-2"><a href="/testimoni">Testimoni</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h6 class="mb-3">Kontak & Lokasi</h6>
                    <ul class="list-unstyled small mb-0">
                        <li class="mb-2"><i class="bi bi-geo-alt me-2" style="color: #E9C46A;"></i>Jl. Raya Contoh No. 123, Kota Anda</li>
                        <li class="mb-2"><i class="bi bi-telephone me-2" style="color: #E9C46A;"></i>+62 812-3456-7890</li>
                        <li class="mb-2"><i class="bi bi-clock me-2" style="color: #E9C46A;"></i>Buka Setiap Hari: 08.00 - 20.00 WIB</li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h6 class="mb-3">Ikuti Kami</h6>
                    <div class="d-flex gap-2">
                        <a href="#" class="btn btn-sm btn-social rounded-circle"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="btn btn-sm btn-social rounded-circle"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="btn btn-sm btn-social rounded-circle"><i class="bi bi-tiktok"></i></a>
                    </div>
                </div>
            </div>
            <hr class="my-4" style="border-color: rgba(255,255,255,0.2);">
            <div class="text-center small">
                &copy; {{ date('Y') }} Alfi Kitchen. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>