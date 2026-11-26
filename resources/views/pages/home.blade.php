@extends('layouts.main')

@section('content')
@php
    $featuredMenus = \App\Models\Menu::with('category')->where('is_available', true)->take(4)->get();
    $heroMainMenu = $featuredMenus->first();
    $heroSecondaryMenu = $featuredMenus->skip(1)->first() ?? $heroMainMenu;
    $homeTestimonials = \App\Models\Testimonial::latest()->take(3)->get();
@endphp

<style>
    :root {
        --ak-crimson: #7B2809;
        --ak-terracotta: #9E3710;
        --ak-flame: #E4701D;
        --ak-saffron: #F3A71C;
        --ak-cream: #F8EDE3;
        --ak-espresso: #1E1106;
    }

    body {
        background-color: var(--ak-cream);
        overflow-x: hidden;
    }

    /* ============================================================
       ANIMASI PEMBUKA (CHOREOGRAPHED ASSEMBLY ENTRANCE)
       Elemen meluncur dari arah berlawanan & menyatu ke posisi utama
       ============================================================ */
    @keyframes assembleFromLeft {
        0% { opacity: 0; transform: translate3d(-70px, 20px, 0) scale(0.95); }
        100% { opacity: 1; transform: translate3d(0, 0, 0) scale(1); }
    }
    @keyframes assemblePlateRight {
        0% { opacity: 0; transform: translate3d(90px, -40px, 0) rotate(18deg) scale(0.82); }
        100% { opacity: 1; transform: translate3d(0, 0, 0) rotate(0deg) scale(1); }
    }
    @keyframes assemblePlateBottom {
        0% { opacity: 0; transform: translate3d(-50px, 80px, 0) rotate(-14deg) scale(0.85); }
        100% { opacity: 1; transform: translate3d(0, 0, 0) rotate(0deg) scale(1); }
    }
    @keyframes spiceOrbit {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-14px) rotate(12deg); }
    }
    @keyframes pulseGlow {
        0%, 100% { transform: scale(1); opacity: 0.55; }
        50% { transform: scale(1.08); opacity: 0.85; }
    }

    .anim-left-1 { opacity: 0; animation: assembleFromLeft 0.9s cubic-bezier(0.22, 1, 0.36, 1) 0.1s forwards; }
    .anim-left-2 { opacity: 0; animation: assembleFromLeft 0.9s cubic-bezier(0.22, 1, 0.36, 1) 0.25s forwards; }
    .anim-left-3 { opacity: 0; animation: assembleFromLeft 0.9s cubic-bezier(0.22, 1, 0.36, 1) 0.4s forwards; }
    .anim-plate-1 { opacity: 0; animation: assemblePlateRight 1.1s cubic-bezier(0.22, 1, 0.36, 1) 0.2s forwards; }
    .anim-plate-2 { opacity: 0; animation: assemblePlateBottom 1.1s cubic-bezier(0.22, 1, 0.36, 1) 0.42s forwards; }

    /* Scroll Reveal untuk Section Bawah */
    .reveal-item {
        opacity: 0;
        transform: translateY(45px) scale(0.96);
        transition: opacity 0.85s cubic-bezier(0.22, 1, 0.36, 1), transform 0.85s cubic-bezier(0.22, 1, 0.36, 1);
    }
    .reveal-item.is-visible {
        opacity: 1;
        transform: translateY(0) scale(1);
    }

    /* ============================================================
       1. HERO UTAMA (RICH TERRACOTTA + DOUBLE FLOATING PLATES)
       ============================================================ */
    .ak-hero-bold {
        position: relative;
        background: radial-gradient(circle at 75% 42%, #B54114 0%, #7B2809 55%, #4A1503 100%);
        color: #FDF7F1;
        padding: 5rem 0 7rem;
        overflow: hidden;
    }
    .hero-ambient-ring {
        position: absolute;
        right: 6%;
        top: 10%;
        width: 500px;
        height: 500px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(243, 167, 28, 0.28) 0%, transparent 70%);
        animation: pulseGlow 5s ease-in-out infinite;
        pointer-events: none;
    }
    .hero-super-title {
        font-family: 'Playfair Display', serif;
        font-size: clamp(2.8rem, 5.2vw, 4.4rem);
        font-weight: 800;
        line-height: 1.04;
        letter-spacing: -0.02em;
        color: #FFF9F2;
    }
    .hero-super-title span {
        color: var(--ak-saffron);
        font-style: italic;
    }
    .hero-stage {
        position: relative;
        min-height: 430px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    /* Piring Utama Tanpa Kotak (Free-Floating) */
    .floating-dish-primary {
        position: relative;
        width: 340px;
        height: 340px;
        border-radius: 50%;
        padding: 10px;
        background: linear-gradient(135deg, rgba(243, 167, 28, 0.65), rgba(228, 112, 29, 0.2));
        box-shadow: 0 35px 70px rgba(18, 6, 1, 0.65);
        z-index: 3;
        margin-left: auto;
    }
    .floating-dish-primary img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
    }
    /* Piring Kedua Bertumpuk Asimetris */
    .floating-dish-secondary {
        position: absolute;
        bottom: -15px;
        left: 10px;
        width: 225px;
        height: 225px;
        border-radius: 50%;
        padding: 8px;
        background: rgba(253, 247, 241, 0.22);
        backdrop-filter: blur(6px);
        box-shadow: 0 28px 55px rgba(18, 6, 1, 0.6);
        z-index: 4;
    }
    .floating-dish-secondary img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
    }
    /* Partikel Daun & Rempah Melayang (SVG Organik) */
    .floating-botanical {
        position: absolute;
        z-index: 5;
        pointer-events: none;
        animation: spiceOrbit 4.5s ease-in-out infinite;
    }
    .btn-saffron-pill {
        background: linear-gradient(135deg, #F3A71C 0%, #E4701D 100%);
        color: #1E1106;
        font-weight: 700;
        border-radius: 999px;
        padding: 14px 34px;
        border: none;
        box-shadow: 0 14px 30px rgba(0, 0, 0, 0.3);
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }
    .btn-saffron-pill:hover {
        transform: translateY(-3px);
        color: #1E1106;
        box-shadow: 0 18px 36px rgba(243, 167, 28, 0.4);
    }
    .btn-ghost-cream {
        border: 2px solid rgba(253, 247, 241, 0.45);
        color: #FFF9F2;
        font-weight: 600;
        border-radius: 999px;
        padding: 12px 30px;
        transition: all 0.25s ease;
    }
    .btn-ghost-cream:hover {
        background-color: #FFF9F2;
        color: var(--ak-crimson);
    }

    /* ============================================================
       2. KEUNGGULAN (ORGANIC WAVE + FREE-FLOWING PILLARS)
       ============================================================ */
    .ak-usp-section {
        position: relative;
        background-color: var(--ak-cream);
        padding: 3.5rem 0 4.5rem;
    }
    .usp-blob-item {
        position: relative;
        padding: 1.5rem 1.25rem;
        text-align: center;
    }
    .usp-organic-icon {
        width: 82px;
        height: 82px;
        margin: 0 auto 1.25rem;
        background: linear-gradient(145deg, #E4701D, #8D380F);
        color: #FFF9F2;
        border-radius: 62% 38% 46% 54% / 60% 44% 56% 40%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        box-shadow: 0 14px 28px rgba(141, 56, 15, 0.25);
        transition: border-radius 0.4s ease, transform 0.3s ease;
    }
    .usp-blob-item:hover .usp-organic-icon {
        border-radius: 40% 60% 54% 46% / 44% 60% 40% 56%;
        transform: scale(1.06);
    }

    /* ============================================================
       3. ETALASE SAJIAN ANDALAN (SAPUAN KUNYIT & PIRING MELAYANG)
       ============================================================ */
    .ak-showcase-band {
        position: relative;
        background: linear-gradient(125deg, #E4701D 0%, #F29F1B 52%, #D95B12 100%);
        color: #1E1106;
        padding: 6rem 0;
        overflow: hidden;
    }
    .showcase-watermark {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-family: 'Playfair Display', serif;
        font-size: 11vw;
        font-weight: 900;
        color: rgba(255, 255, 255, 0.12);
        white-space: nowrap;
        pointer-events: none;
        user-select: none;
    }
    /* Sajian melayang bebas tanpa kartu kotak */
    .dish-free-float {
        text-align: center;
        position: relative;
        z-index: 2;
        transition: transform 0.35s cubic-bezier(0.22, 1, 0.36, 1);
    }
    .dish-free-float:hover {
        transform: translateY(-12px);
    }
    .dish-circle-frame {
        width: 215px;
        height: 215px;
        margin: 0 auto 1.25rem;
        border-radius: 50%;
        padding: 9px;
        background: rgba(255, 249, 242, 0.35);
        box-shadow: 0 26px 48px rgba(74, 21, 3, 0.34);
    }
    .dish-circle-frame img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
    }
    .dish-price-pill {
        display: inline-block;
        background-color: var(--ak-crimson);
        color: #FFF9F2;
        font-weight: 700;
        font-size: 0.9rem;
        padding: 6px 20px;
        border-radius: 999px;
        margin-bottom: 10px;
    }

    /* ============================================================
       4. ALUR PEMESANAN SINGKAT (ASYMMETRIC EDITORIAL FLOW)
       ============================================================ */
    .ak-flow-section {
        background-color: var(--ak-cream);
        padding: 5.5rem 0;
        position: relative;
    }
    .flow-step-organic {
        display: flex;
        align-items: flex-start;
        gap: 20px;
        padding: 1.5rem 0;
        border-bottom: 1.5px dashed rgba(141, 56, 15, 0.25);
    }
    .flow-step-organic:last-child {
        border-bottom: none;
    }
    .flow-num-blob {
        width: 58px;
        height: 58px;
        flex-shrink: 0;
        border-radius: 55% 45% 40% 60% / 50% 60% 40% 50%;
        background-color: var(--ak-crimson);
        color: var(--ak-saffron);
        font-family: 'Playfair Display', serif;
        font-size: 1.45rem;
        font-weight: 800;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .flow-collage-circle {
        width: 360px;
        height: 360px;
        border-radius: 60% 40% 52% 48% / 48% 58% 42% 52%;
        overflow: hidden;
        margin: 0 auto;
        box-shadow: 0 28px 60px rgba(74, 21, 3, 0.22);
        border: 10px solid #ffffff;
    }
    .flow-collage-circle img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* ============================================================
       5. CUPLIKAN CERITA & CTA PENUTUP (DEEP CRIMSON FINALE)
       ============================================================ */
    .ak-stories-cta {
        position: relative;
        background: linear-gradient(155deg, #6B2107 0%, #3D1002 100%);
        color: #FDF7F1;
        padding: 5.5rem 0 6rem;
        overflow: hidden;
    }
    .story-speech-bubble {
        position: relative;
        background: rgba(255, 249, 242, 0.08);
        backdrop-filter: blur(8px);
        border-radius: 42px 42px 42px 6px;
        padding: 2rem;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    .story-avatar {
        width: 46px;
        height: 46px;
        border-radius: 50%;
        background-color: var(--ak-saffron);
        color: var(--ak-espresso);
        font-family: 'Playfair Display', serif;
        font-weight: 800;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    @media (max-width: 991.98px) {
        .floating-dish-primary { width: 270px; height: 270px; margin: 0 auto; }
        .floating-dish-secondary { width: 175px; height: 175px; left: 5%; }
        .flow-collage-circle { width: 280px; height: 280px; }
    }
</style>

<!-- =================================================================
     1. HERO UTAMA (RICH TERRACOTTA + DOUBLE FLOATING DISHES)
     ================================================================= -->
<section class="ak-hero-bold">
    <div class="hero-ambient-ring"></div>

    <!-- Elemen Rempah & Daun Organik Melayang -->
    <svg class="floating-botanical d-none d-md-block" style="top: 14%; left: 48%; width: 70px; animation-delay: 0.2s;" viewBox="0 0 64 64" fill="none">
        <path d="M10 52C26 48 48 30 54 10C34 16 16 38 10 52Z" fill="#6BBF59"/>
        <path d="M12 50L50 14" stroke="#3D7A31" stroke-width="2.5" stroke-linecap="round"/>
    </svg>
    <svg class="floating-botanical d-none d-md-block" style="bottom: 18%; right: 6%; width: 60px; animation-delay: 1.1s;" viewBox="0 0 64 64" fill="none">
        <path d="M14 46C22 24 38 14 52 14C50 28 40 44 18 52C14 53 12 50 14 46Z" fill="#E63926"/>
    </svg>

    <div class="container position-relative" style="z-index: 3;">
        <div class="row align-items-center gy-5">
            <!-- Sisi Kiri: Tipografi Berani -->
            <div class="col-lg-6 pt-4 pt-lg-5">
                <div class="d-flex align-items-center gap-3 mb-3 anim-left-1">
                    <span style="width: 38px; height: 2px; background-color: var(--ak-saffron);"></span>
                    <span class="text-uppercase fw-bold small" style="letter-spacing: 0.16em; color: var(--ak-saffron);">
                        Dapur Katering Rumahan &amp; Acara
                    </span>
                </div>

                <h1 class="hero-super-title mb-4 anim-left-2">
                    Cita Rasa <span>Hangat</span><br>di Setiap Sajian
                </h1>

                <p class="lead mb-4 anim-left-2" style="color: rgba(253, 247, 241, 0.85); max-width: 500px; font-size: 1.05rem;">
                    Dari nasi box rapat harian hingga prasmanan hajatan besar—dimasak segar di hari pengiriman dengan bumbu rempah pilihan dan 100% halal.
                </p>

                <div class="d-flex flex-wrap align-items-center gap-3 anim-left-3">
                    <a href="{{ auth()->check() ? route('orders.create') : route('login') }}" class="btn btn-saffron-pill">
                        Pesan Katering Sekarang <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                    <a href="{{ route('menu') }}" class="btn btn-ghost-cream">
                        Eksplorasi Menu
                    </a>
                </div>
            </div>

            <!-- Sisi Kanan: Dua Piring Hidangan Melayang Asimetris -->
            <div class="col-lg-6">
                <div class="hero-stage">
                    <div class="floating-dish-primary anim-plate-1">
                        <img src="{{ $heroMainMenu->image ?? 'https://images.unsplash.com/photo-1541544741938-0af808871cc0?q=80&w=800' }}"
                             alt="{{ $heroMainMenu->name ?? 'Sajian Utama Alfi Kitchen' }}"
                             onerror="this.src='https://images.unsplash.com/photo-1541544741938-0af808871cc0?q=80&w=800'">
                    </div>

                    <div class="floating-dish-secondary anim-plate-2">
                        <img src="{{ $heroSecondaryMenu->image ?? 'https://images.unsplash.com/photo-1598515214211-89d3c73ae83b?q=80&w=800' }}"
                             alt="{{ $heroSecondaryMenu->name ?? 'Menu Pilihan Alfi Kitchen' }}"
                             onerror="this.src='https://images.unsplash.com/photo-1598515214211-89d3c73ae83b?q=80&w=800'">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pemisah Sapuan Organik antara Hero & Keunggulan -->
<div style="background-color: #4A1503; line-height: 0; margin-top: -2px;">
    <svg viewBox="0 0 1440 90" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="width: 100%; height: 68px;">
        <path d="M0,25 C240,95 480,-15 760,45 C1040,105 1260,15 1440,50 L1440,90 L0,90 Z" fill="#F8EDE3"/>
    </svg>
</div>

<!-- =================================================================
     2. KEUNGGULAN DAPUR (FREE-FLOWING ORGANIC BLOBS, TANPA KOTAK)
     ================================================================= -->
<section class="ak-usp-section">
    <div class="container">
        <div class="text-center mb-5 reveal-item">
            <p class="text-uppercase fw-bold small mb-1" style="color: var(--ak-terracotta); letter-spacing: 0.14em;">Kenapa Alfi Kitchen</p>
            <h2 class="display-6 fw-bold" style="font-family: 'Playfair Display', serif; color: var(--ak-espresso);">
                Segar, Higienis &amp; Penuh Rasa
            </h2>
        </div>

        <div class="row g-4 justify-content-center">
            <div class="col-md-4 reveal-item">
                <div class="usp-blob-item">
                    <div class="usp-organic-icon">
                        <i class="bi bi-fire"></i>
                    </div>
                    <h5 class="fw-bold mb-2" style="font-family: 'Playfair Display', serif; color: var(--ak-espresso);">Dimasak di Hari Acara</h5>
                    <p class="text-muted small mb-0 px-lg-3">
                        Tidak ada stok masakan bermalam. Seluruh lauk diolah beberapa jam sebelum jadwal pengiriman agar tiba dalam kondisi hangat.
                    </p>
                </div>
            </div>

            <div class="col-md-4 reveal-item" style="transition-delay: 0.12s;">
                <div class="usp-blob-item">
                    <div class="usp-organic-icon">
                        <i class="bi bi-patch-check"></i>
                    </div>
                    <h5 class="fw-bold mb-2" style="font-family: 'Playfair Display', serif; color: var(--ak-espresso);">100% Bahan Segar &amp; Halal</h5>
                    <p class="text-muted small mb-0 px-lg-3">
                        Menggunakan daging, ayam, dan sayuran segar pilihan setiap pagi dengan standar kebersihan dapur rumahan yang terjaga.
                    </p>
                </div>
            </div>

            <div class="col-md-4 reveal-item" style="transition-delay: 0.24s;">
                <div class="usp-blob-item">
                    <div class="usp-organic-icon">
                        <i class="bi bi-clock-history"></i>
                    </div>
                    <h5 class="fw-bold mb-2" style="font-family: 'Playfair Display', serif; color: var(--ak-espresso);">Tepat Waktu ke Lokasi</h5>
                    <p class="text-muted small mb-0 px-lg-3">
                        Penjadwalan pengantaran terukur untuk kebutuhan rapat kantor, catering harian, hingga acara syukuran keluarga.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pemisah Sapuan ke Band Oranye Kunyit -->
<div style="background-color: #F8EDE3; line-height: 0;">
    <svg viewBox="0 0 1440 85" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="width: 100%; height: 65px;">
        <path d="M0,60 C380,-10 980,95 1440,20 L1440,85 L0,85 Z" fill="#E4701D"/>
    </svg>
</div>

<!-- =================================================================
     3. ETALASE SAJIAN ANDALAN (PIRING MELAYANG DI ATAS WARNA STRONG)
     ================================================================= -->
<section class="ak-showcase-band">
    

    <div class="container position-relative" style="z-index: 2;">
        <div class="text-center mb-5 reveal-item">
            <p class="text-uppercase fw-bold small mb-1" style="color: #FFF9F2; letter-spacing: 0.14em;">Menu Andalan Dapur</p>
            <h2 class="display-5 fw-bold text-white" style="font-family: 'Playfair Display', serif;">
                Sajian Paling Sering Dipesan
            </h2>
        </div>

        <div class="row g-5 justify-content-center">
            @foreach($featuredMenus as $idx => $dish)
                <div class="col-sm-6 col-lg-3 reveal-item" style="transition-delay: {{ $idx * 0.1 }}s;">
                    <div class="dish-free-float">
                        <div class="dish-circle-frame">
                            <img src="{{ $dish->image }}"
                                 alt="{{ $dish->name }}"
                                 onerror="this.src='https://images.unsplash.com/photo-1598515214211-89d3c73ae83b?q=80&w=600'">
                        </div>

                        <span class="dish-price-pill">Rp {{ number_format($dish->price, 0, ',', '.') }}</span>

                        <h5 class="fw-bold text-white mb-1" style="font-family: 'Playfair Display', serif;">
                            {{ $dish->name }}
                        </h5>
                        <p class="small mb-3" style="color: rgba(255, 249, 242, 0.88);">
                            {{ \Illuminate\Support\Str::limit($dish->description, 65) }}
                        </p>

                        <a href="{{ auth()->check() ? route('orders.create', ['menu_id' => $dish->id]) : route('login') }}"
                           class="btn btn-sm rounded-pill px-4 py-2 fw-bold"
                           style="background-color: #FFF9F2; color: var(--ak-crimson);">
                            Pesan Menu Ini
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Pemisah Sapuan dari Band Oranye ke Krem Hangat -->
<div style="background-color: #D95B12; line-height: 0;">
    <svg viewBox="0 0 1440 85" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="width: 100%; height: 65px;">
        <path d="M0,15 C420,95 1020,-15 1440,55 L1440,85 L0,85 Z" fill="#F8EDE3"/>
    </svg>
</div>

<!-- =================================================================
     4. ALUR PEMESANAN SINGKAT (ASYMMETRIC EDITORIAL STEPS)
     ================================================================= -->
<section class="ak-flow-section">
    <div class="container">
        <div class="row align-items-center gy-5">
            <!-- Kiri: Foto Kolase Bentuk Organik -->
            <div class="col-lg-5 reveal-item">
                <div class="flow-collage-circle">
                    <img src="https://images.unsplash.com/photo-1555244162-803834f70033?q=80&w=900"
                         alt="Proses Penyajian Katering Alfi Kitchen">
                </div>
            </div>

            <!-- Kanan: 3 Langkah Tanpa Kotak -->
            <div class="col-lg-7 reveal-item" style="transition-delay: 0.15s;">
                <p class="text-uppercase fw-bold small mb-1" style="color: var(--ak-terracotta); letter-spacing: 0.14em;">Cara Pemesanan</p>
                <h2 class="display-6 fw-bold mb-4" style="font-family: 'Playfair Display', serif; color: var(--ak-espresso);">
                    Tiga Langkah Mudah Menuju Meja Acaramu
                </h2>

                <div class="flow-step-organic">
                    <div class="flow-num-blob">01</div>
                    <div>
                        <h5 class="fw-bold mb-1" style="font-family: 'Playfair Display', serif; color: var(--ak-espresso);">Pilih Hidangan &amp; Jumlah Porsi</h5>
                        <p class="text-muted small mb-0">Tentukan kombinasi paket nasi box, catering harian, prasmanan, atau snack box sesuai kebutuhan acara.</p>
                    </div>
                </div>

                <div class="flow-step-organic">
                    <div class="flow-num-blob">02</div>
                    <div>
                        <h5 class="fw-bold mb-1" style="font-family: 'Playfair Display', serif; color: var(--ak-espresso);">Atur Jadwal Kirim &amp; Unggah Bukti Transfer</h5>
                        <p class="text-muted small mb-0">Isi tanggal, jam tiba, alamat pengantaran, dan lampirkan bukti pembayaran agar pesanan langsung masuk antrean dapur.</p>
                    </div>
                </div>

                <div class="flow-step-organic">
                    <div class="flow-num-blob">03</div>
                    <div>
                        <h5 class="fw-bold mb-1" style="font-family: 'Playfair Display', serif; color: var(--ak-espresso);">Sajian Hangat Tiba &amp; Beri Ulasan</h5>
                        <p class="text-muted small mb-0">Pesanan diantar tepat waktu ke lokasi acara, dan Anda dapat membagikan penilaian rasa setelah pesanan selesai.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pemisah Sapuan ke Section Cerita & CTA Gelap -->
<div style="background-color: #F8EDE3; line-height: 0;">
    <svg viewBox="0 0 1440 85" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="width: 100%; height: 65px;">
        <path d="M0,45 C360,-20 1080,100 1440,30 L1440,85 L0,85 Z" fill="#6B2107"/>
    </svg>
</div>

<!-- =================================================================
     5. CUPLIKAN CERITA PELANGGAN & CTA PENUTUP
     ================================================================= -->
<section class="ak-stories-cta">
    <div class="container">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-5 gap-3 reveal-item">
            <div>
                <p class="text-uppercase fw-bold small mb-1" style="color: var(--ak-saffron); letter-spacing: 0.14em;">Cerita Pelanggan</p>
                <h2 class="display-6 fw-bold text-white mb-0" style="font-family: 'Playfair Display', serif;">
                    Kesan Hangat dari Mereka
                </h2>
            </div>
            <a href="{{ route('testimoni') }}" class="text-decoration-none fw-semibold" style="color: var(--ak-saffron);">
                Lihat Semua Ulasan <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>

        <!-- Cuplikan Testimoni dari Database -->
        <div class="row g-4 mb-5">
            @foreach($homeTestimonials as $idx => $testi)
                <div class="col-md-4 reveal-item" style="transition-delay: {{ $idx * 0.12 }}s;">
                    <div class="story-speech-bubble">
                        <div class="mb-3 text-warning">
                            @for($s = 1; $s <= 5; $s++)
                                <i class="bi {{ $s <= $testi->rating ? 'bi-star-fill' : 'bi-star' }}"></i>
                            @endfor
                        </div>

                        <p class="small fst-italic mb-4" style="color: rgba(253, 247, 241, 0.9); line-height: 1.7;">
                            "{{ $testi->comment }}"
                        </p>

                        <div class="d-flex align-items-center gap-3 mt-auto pt-3" style="border-top: 1px solid rgba(253, 247, 241, 0.15);">
                            <div class="story-avatar">
                                {{ strtoupper(substr($testi->customer_name, 0, 1)) }}
                            </div>
                            <div>
                                <h6 class="fw-bold text-white mb-0">{{ $testi->customer_name }}</h6>
                                <small style="color: var(--ak-saffron);">{{ $testi->menu_ordered }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- CTA Penutup Tanpa Kotak Kaku -->
        <div class="text-center pt-4 reveal-item">
            <h2 class="display-5 fw-bold text-white mb-3" style="font-family: 'Playfair Display', serif;">
                Siap Menjamu Tamu dengan Sajian Terbaik?
            </h2>
            <p class="mx-auto mb-4" style="max-width: 560px; color: rgba(253, 247, 241, 0.85);">
                Konsultasikan kebutuhan porsi atau langsung pilih paket hidangan favoritmu sekarang.
            </p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="{{ auth()->check() ? route('orders.create') : route('login') }}" class="btn btn-saffron-pill">
                    Mulai Pesan Sekarang
                </a>
                <a href="{{ route('menu') }}" class="btn btn-ghost-cream">
                    Lihat Katalog Menu
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Script IntersectionObserver untuk Animasi Scroll-Reveal -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const revealElements = document.querySelectorAll('.reveal-item');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.14 });

    revealElements.forEach(el => observer.observe(el));
});
</script>
@endsection