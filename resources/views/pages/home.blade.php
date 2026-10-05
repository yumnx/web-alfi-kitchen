<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alfi Kitchen - Catering Harian & Acara</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts: Plus Jakarta Sans / Playfair Display -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,700;1,700&display=swap" rel="stylesheet">

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

        h1, h2, h3, .font-serif {
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

        /* Tombol Utama */
        .btn-custom-primary {
            background-color: var(--primary);
            color: #ffffff;
            border: none;
            border-radius: 50px;
            font-weight: 600;
            padding: 12px 28px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 14px rgba(228, 112, 29, 0.25);
        }
        .btn-custom-primary:hover {
            background-color: var(--primary-dark);
            color: #ffffff;
            transform: translateY(-2px);
        }

        .btn-custom-outline {
            border: 2px solid var(--border);
            color: var(--text-secondary);
            border-radius: 50px;
            font-weight: 600;
            padding: 10px 24px;
            background: transparent;
        }
        .btn-custom-outline:hover {
            background-color: var(--surface);
            color: var(--primary-dark);
            border-color: var(--accent);
        }

        /* Hero */
        .hero-title {
            color: var(--text-primary);
            font-size: 3.5rem;
            line-height: 1.15;
            font-weight: 700;
        }
        .hero-title span {
            color: var(--primary);
        }
        .hero-badge {
            background-color: var(--surface);
            color: var(--primary-dark);
            border: 1px solid var(--border);
            border-radius: 50px;
            padding: 6px 16px;
            font-size: 0.85rem;
            font-weight: 600;
            display: inline-block;
        }

        /* Floating Promo Box di Hero (seperti referensi gambar) */
        .hero-floating-card {
            position: absolute;
            bottom: 20px;
            right: 10px;
            background: #ffffff;
            border-radius: 18px;
            padding: 16px 20px;
            border: 1px solid var(--border);
            box-shadow: 0 12px 30px rgba(74, 53, 23, 0.1);
            max-width: 250px;
        }

        /* Custom Shadow Oranye Hangat */
.hero-food-shadow {
    /* Format: horizontal, vertikal, blur, spread, warna RGBA */
    box-shadow: 0 20px 45px rgba(228, 112, 29, 0.7) !important;
    transition: box-shadow 0.3s ease, transform 0.3s ease;
}

/* Opsional: saat di-hover, efek bayangannya makin menyala lembut */
.hero-food-shadow:hover {
    box-shadow: 0 25px 55px rgba(228, 112, 29, 0.48) !important;
    transform: translateY(-4px);
}

        /* Features Bar Tersekat */
        .features-bar {
            background-color: #ffffff;
            border: 1.5px solid var(--border);
            border-radius: 20px;
            box-shadow: 0 6px 20px rgba(74, 53, 23, 0.05);
        }
        .feature-item {
            padding: 24px 20px;
        }
        .feature-divider {
            border-right: 1.5px solid var(--border);
        }
        @media (max-width: 768px) {
            .feature-divider {
                border-right: none;
                border-bottom: 1.5px solid var(--border);
            }
        }

        /* Menu Cards */
        .menu-card {
            background-color: #ffffff;
            border: 1px solid var(--border);
            border-radius: 24px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .menu-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 15px 30px rgba(74, 53, 23, 0.1);
        }
        .menu-card img {
            height: 220px;
            object-fit: cover;
            width: 100%;
        }

        /* Testimoni Carousel */
        .testimonial-card {
            background-color: var(--surface);
            border: 1px solid var(--border);
            border-radius: 24px;
            padding: 35px;
            min-height: 230px;
        }
        .carousel-indicators [data-bs-target] {
            background-color: var(--primary);
            width: 12px;
            height: 12px;
            border-radius: 50%;
        }

        /* Banner CTA */
        .cta-banner {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border-radius: 28px;
            color: #ffffff;
            padding: 60px 40px;
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
            transition: color 0.2s;
        }
        footer a:hover {
            color: var(--accent);
        }
    </style>
</head>
<body>

    <!-- 1. NAVBAR -->
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
                        <a class="nav-link active" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/menu') }}">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/testimoni') }}">Testimoni</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/about') }}">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- 2. HERO SECTION -->
    <section class="pt-3 pb-5">
    <div class="container">
            <div class="row align-items-center g-5">
                <!-- Kiri: Teks & CTA -->
                <div class="col-lg-6">
                    <h1 class="hero-title my-3">
                        Delicious Food <br>For <span>Every Mood</span>
                    </h1>
                    <p class="lead mb-4" style="color: var(--text-secondary); font-size: 1.05rem;">
                        Nikmati kelezatan masakan rumahan premium dari Alfi Kitchen untuk santap harian keluarga, konsumsi kantor, hingga hajatan istimewa Anda.
                    </p>
                    <div class="d-flex flex-wrap gap-3 align-items-center">
                        <a href="https://wa.me/6281234567890?text=Halo%20Alfi%20Kitchen,%20saya%20mau%20order" target="_blank" class="btn btn-custom-primary">
                            Pesan Sekarang <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                        <a href="{{ url('/menu') }}" class="btn btn-custom-outline">
                            <i class="bi bi-book-half me-1"></i> Lihat Daftar Menu
                        </a>
                    </div>
                </div>

                <!-- Kanan: Gambar Makanan Hero -->
                <div class="col-lg-6 position-relative text-center">
                    <div class="position-relative d-inline-block">
                        <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&w=800&q=80" 
                             alt="Hidangan Alfi Kitchen" 
                             class="img-fluid rounded-circle hero-food-shadow" 
                             style="width: 440px; height: 440px; object-fit: cover; border: 10px solid var(--surface);">
                        
                        <!-- Floating Card Diskon / Special (ala visual Foodie) -->
                        <div class="hero-floating-card text-start d-none d-sm-block">
                            <span class="badge bg-warning text-dark px-2 py-1 mb-1">Promo Acara</span>
                            <h6 class="fw-bold mb-1" style="color: var(--primary-dark);">Diskon 10%</h6>
                            <p class="text-muted small mb-2">Pemesanan di atas 50 box pertama</p>
                            <a href="https://wa.me/6281234567890" class="btn btn-sm btn-custom-primary py-1 px-3" style="font-size: 0.75rem;">Klaim Promo</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. PERSEGI PANJANG TERSEKAT GARIS (KEUNGGULAN) -->
    <section class="container my-4">
        <div class="features-bar">
            <div class="row text-center g-0">
                <div class="col-md-4 feature-item feature-divider d-flex align-items-center justify-content-center gap-3">
                    <i class="bi bi-award fs-1" style="color: var(--primary);"></i>
                    <div class="text-start">
                        <h5 class="fw-bold mb-0">Since 2018</h5>
                        <small style="color: var(--text-secondary);">6+ Tahun Melayani Pelanggan</small>
                    </div>
                </div>
                <div class="col-md-4 feature-item feature-divider d-flex align-items-center justify-content-center gap-3">
                    <i class="bi bi-shield-check fs-1" style="color: var(--primary);"></i>
                    <div class="text-start">
                        <h5 class="fw-bold mb-0">Halal</h5>
                        <small style="color: var(--text-secondary);">Sudah Tersertifikasi Resmi</small>
                    </div>
                </div>
                <div class="col-md-4 feature-item d-flex align-items-center justify-content-center gap-3">
                    <i class="bi bi-egg-fried fs-1" style="color: var(--primary);"></i>
                    <div class="text-start">
                        <h5 class="fw-bold mb-0">100+ Pilihan Menu</h5>
                        <small style="color: var(--text-secondary);">Variasi Menu Harian & Acara</small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. TIGA MENU UNGGULAN -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold display-6" style="color: var(--primary-dark);">3 Menu Unggulan Kami</h2>
                <p style="color: var(--text-secondary);">Pilihan menu paling sering dipesan untuk hajatan dan konsumsi kantor</p>
            </div>

            <div class="row g-4">
                <!-- Menu 1: Tumpeng -->
                <div class="col-md-4">
                    <div class="card menu-card h-100">
                        <img src="https://images.unsplash.com/photo-1626082927389-6cd097cdc6ec?auto=format&fit=crop&w=600&q=80" alt="Tumpeng Kuning">
                        <div class="card-body p-4 d-flex flex-column">
                            <span class="badge align-self-start mb-2" style="background-color: var(--surface); color: var(--primary-dark);">Spesial Acara</span>
                            <h4 class="fw-bold mb-2">Tumpeng Mini / Besar</h4>
                            <p class="small flex-grow-1" style="color: var(--text-secondary);">
                                Nasi kuning wangi rempah dengan lauk komplit: ayam suwir gurih, perkedel, orek tempe kacang, telur dadar iris, dan sambal goreng ati.
                            </p>
                            <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top" style="border-color: var(--border) !important;">
                                <span class="fw-bold fs-5" style="color: var(--primary);">Mulai Rp 35.000</span>
                                <a href="https://wa.me/6281234567890?text=Halo%20saya%20mau%20tanya%20Tumpeng" target="_blank" class="btn btn-sm btn-custom-primary">Pesan</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Menu 2: Nasi Box Ayam Bakar -->
                <div class="col-md-4">
                    <div class="card menu-card h-100">
                        <img src="https://images.unsplash.com/photo-1598515214211-89d3c73ae83b?auto=format&fit=crop&w=600&q=80" alt="Nasi Box Ayam Bakar">
                        <div class="card-body p-4 d-flex flex-column">
                            <span class="badge align-self-start mb-2" style="background-color: var(--surface); color: var(--primary-dark);">Paling Laris</span>
                            <h4 class="fw-bold mb-2">Nasi Box Ayam Bakar</h4>
                            <p class="small flex-grow-1" style="color: var(--text-secondary);">
                                Ayam bakar bumbu manis gurih meresap sampai ke tulang, dilengkapi nasi pulen, tahu tempe goreng, lalap segar, dan sambal terasi matang.
                            </p>
                            <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top" style="border-color: var(--border) !important;">
                                <span class="fw-bold fs-5" style="color: var(--primary);">Mulai Rp 28.000</span>
                                <a href="https://wa.me/6281234567890?text=Halo%20saya%20mau%20tanya%20Nasi%20Box%20Ayam%20Bakar" target="_blank" class="btn btn-sm btn-custom-primary">Pesan</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Menu 3: Snack Box -->
                <div class="col-md-4">
                    <div class="card menu-card h-100">
                        <img src="https://images.unsplash.com/photo-1509440159596-0249088772ff?auto=format&fit=crop&w=600&q=80" alt="Snack Box">
                        <div class="card-body p-4 d-flex flex-column">
                            <span class="badge align-self-start mb-2" style="background-color: var(--surface); color: var(--primary-dark);">Meeting & Rapat</span>
                            <h4 class="fw-bold mb-2">Snack Box Premium</h4>
                            <p class="small flex-grow-1" style="color: var(--text-secondary);">
                                Kombinasi 3 kue pilihan (asin & manis) seperti lemper ayam, pastel renyah, bolu gulung keju, ditambah air mineral kemasan rapi.
                            </p>
                            <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top" style="border-color: var(--border) !important;">
                                <span class="fw-bold fs-5" style="color: var(--primary);">Mulai Rp 15.000</span>
                                <a href="https://wa.me/6281234567890?text=Halo%20saya%20mau%20tanya%20Snack%20Box" target="_blank" class="btn btn-sm btn-custom-primary">Pesan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. TESTIMONI (CAROUSEL / BISA DIGESER-GESER) -->
    <section class="py-5" style="background-color: #fffaf5;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold display-6" style="color: var(--primary-dark);">Kata Pelanggan Alfi Kitchen</h2>
                <p style="color: var(--text-secondary);">Geser untuk melihat pengalaman nyata dari pelanggan setia kami</p>
            </div>

            <div id="testimoniCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner pb-5">
                    <!-- Slide 1 -->
                    <div class="carousel-item active">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="testimonial-card text-center shadow-sm">
                                    <div class="text-warning mb-3 fs-5">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                    </div>
                                    <p class="fs-5 fst-italic mb-4" style="color: var(--text-primary);">
                                        "Pesan 120 box Nasi Ayam Bakar buat acara syukuran kantor. Semua rekan bilang bumbunya meresap banget dan ayamnya empuk. Pengiriman on-time!"
                                    </p>
                                    <h6 class="fw-bold mb-0" style="color: var(--primary-dark);">Ibu Ratna Dewi</h6>
                                    <small style="color: var(--text-secondary);">Divisi HRD & GA - Jakarta</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="carousel-item">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="testimonial-card text-center shadow-sm">
                                    <div class="text-warning mb-3 fs-5">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                    </div>
                                    <p class="fs-5 fst-italic mb-4" style="color: var(--text-primary);">
                                        "Tumpeng mini buat ulang tahun anak tampilannya lucu dan bersih banget. Porsinya pas, sambal goreng atinya juara rasanya."
                                    </p>
                                    <h6 class="fw-bold mb-0" style="color: var(--primary-dark);">Kak Sarah Amelia</h6>
                                    <small style="color: var(--text-secondary);">Ibu Rumah Tangga</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="carousel-item">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="testimonial-card text-center shadow-sm">
                                    <div class="text-warning mb-3 fs-5">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                    </div>
                                    <p class="fs-5 fst-italic mb-4" style="color: var(--text-primary);">
                                        "Langganan snack box tiap ada seminar kampus. Kuenya selalu fresh, pastelnya crunchy nggak berminyak. Recommended banget!"
                                    </p>
                                    <h6 class="fw-bold mb-0" style="color: var(--primary-dark);">Rizky Pratama</h6>
                                    <small style="color: var(--text-secondary);">Panitia Event Kampus</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kontrol Navigasi Panah -->
                <button class="carousel-control-prev" type="button" data-bs-target="#testimoniCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon p-3 rounded-circle" style="background-color: var(--primary);" aria-hidden="true"></span>
                    <span class="visually-hidden">Sebelumnya</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#testimoniCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon p-3 rounded-circle" style="background-color: var(--primary);" aria-hidden="true"></span>
                    <span class="visually-hidden">Selanjutnya</span>
                </button>

                <!-- Kontrol Titik Indikator -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#testimoniCarousel" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#testimoniCarousel" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#testimoniCarousel" data-bs-slide-to="2"></button>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. CALL TO ACTION (CTA PENCET PESAN) -->
    <section class="py-5">
        <div class="container">
            <div class="cta-banner text-center shadow-lg">
                <h2 class="display-6 fw-bold mb-3 font-serif">Punya Rencana Acara atau Butuh Catering Harian?</h2>
                <p class="lead mb-4 mx-auto" style="max-width: 600px; opacity: 0.95;">
                    Konsultasikan kebutuhan menu, jumlah porsi, dan jadwal kirim Anda bersama tim dapur Alfi Kitchen.
                </p>
                <a href="https://wa.me/6281234567890?text=Halo%20Alfi%20Kitchen,%20saya%20ingin%20konsultasi%20pesanan%20katering" 
                   target="_blank" 
                   class="btn btn-light btn-lg px-5 py-3 rounded-pill fw-bold" 
                   style="color: var(--primary-dark); font-size: 1.1rem;">
                    <i class="bi bi-whatsapp text-success me-2 fs-5"></i> Pesan Sekarang via WhatsApp
                </a>
            </div>
        </div>
    </section>

    <!-- 7. FOOTER -->
    <footer class="pt-5 pb-4">
        <div class="container">
            <div class="row g-4 justify-content-between mb-4">
                <!-- Info Brand -->
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-white fw-bold mb-3">
                        <i class="bi bi-fire text-warning"></i> Alfi<span style="color: var(--primary);">Kitchen</span>
                    </h4>
                    <p class="small leading-relaxed">
                        UMKM catering rumahan terpercaya sejak 2018. Menyajikan berbagai hidangan nusantara yang halal, higienis, dan kaya cita rasa untuk semua momen spesial Anda.
                    </p>
                    <div class="d-flex gap-3 fs-5 mt-3">
                        <a href="https://facebook.com" target="_blank" title="Facebook"><i class="bi bi-facebook"></i></a>
                        <a href="https://instagram.com" target="_blank" title="Instagram"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>

                <!-- Kontak & Alamat Lengkap -->
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

                <!-- Navigasi Cepat -->
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

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>