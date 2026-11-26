@extends('layouts.main')

@section('content')
<style>
    :root {
        --ak-crimson: #7B2809;
        --ak-terracotta: #9E3710;
        --ak-flame: #E4701D;
        --ak-saffron: #F3A71C;
        --ak-cream: #F8EDE3;
        --ak-espresso: #1E1106;
    }

    /* ============================================================
       ANIMASI PEMBUKA (POSTER LAYER ENTRANCE)
       ============================================================ */
    @keyframes giantTextReveal {
        0% { opacity: 0; transform: translate(-50%, -42%) scale(0.92); letter-spacing: 0.14em; }
        100% { opacity: 1; transform: translate(-50%, -50%) scale(1); letter-spacing: 0.02em; }
    }
    @keyframes ownerHeroRise {
        0% { opacity: 0; transform: translate3d(0, 90px, 0) scale(0.96); }
        100% { opacity: 1; transform: translate3d(0, 0, 0) scale(1); }
    }
    @keyframes sideFadeLeft {
        0% { opacity: 0; transform: translate3d(-45px, 0, 0); }
        100% { opacity: 1; transform: translate3d(0, 0, 0); }
    }
    @keyframes sideFadeRight {
        0% { opacity: 0; transform: translate3d(45px, 0, 0); }
        100% { opacity: 1; transform: translate3d(0, 0, 0); }
    }
    @keyframes herbFloat {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-16px) rotate(12deg); }
    }

    .anim-giant-word { opacity: 0; animation: giantTextReveal 1.1s cubic-bezier(0.22, 1, 0.36, 1) 0.05s forwards; }
    .anim-owner-cutout { opacity: 0; animation: ownerHeroRise 1.15s cubic-bezier(0.22, 1, 0.36, 1) 0.2s forwards; }
    .anim-caption-left { opacity: 0; animation: sideFadeLeft 0.9s cubic-bezier(0.22, 1, 0.36, 1) 0.4s forwards; }
    .anim-caption-right { opacity: 0; animation: sideFadeRight 0.9s cubic-bezier(0.22, 1, 0.36, 1) 0.5s forwards; }

    .reveal-about {
        opacity: 0;
        transform: translateY(40px);
        transition: opacity 0.85s cubic-bezier(0.22, 1, 0.36, 1), transform 0.85s cubic-bezier(0.22, 1, 0.36, 1);
    }
    .reveal-about.is-visible {
        opacity: 1;
        transform: translateY(0);
    }

    /* ============================================================
       1. HERO POSTER FULL-SCREEN (MEET THE OWNER)
       ============================================================ */
    .owner-poster-hero {
        position: relative;
        min-height: 100vh;
        background: radial-gradient(circle at 50% 48%, #B84214 0%, #6E2106 58%, #340D02 100%);
        color: #FFF9F2;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding-top: 7.5rem;
        padding-bottom: 0;
        overflow: hidden;
    }

    /* Teks Raksasa Menjulang di Belakang Sosok Owner */
    .poster-giant-typography {
        position: absolute;
        top: 47%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-family: 'Playfair Display', serif;
        font-size: clamp(4.8rem, 15.5vw, 14.5rem);
        font-weight: 900;
        line-height: 0.85;
        text-transform: uppercase;
        color: #E4701D;
        opacity: 0.42;
        white-space: nowrap;
        pointer-events: none;
        user-select: none;
        z-index: 1;
    }

    /* Foto Sosok Ibu Besar Tanpa Background di Tengah */
    .owner-center-cutout {
        position: relative;
        z-index: 3;
        width: 100%;
        max-width: 540px;
        margin: 0 auto;
        display: flex;
        justify-content: center;
        align-items: flex-end;
    }
    .owner-center-cutout img {
        width: 100%;
        height: auto;
        max-height: 76vh;
        object-fit: contain;
        object-position: bottom center;
        filter: drop-shadow(0 25px 45px rgba(15, 4, 0, 0.7));
        -webkit-mask-image: linear-gradient(to bottom, rgba(0,0,0,1) 88%, rgba(0,0,0,0) 100%);
        mask-image: linear-gradient(to bottom, rgba(0,0,0,1) 88%, rgba(0,0,0,0) 100%);
    }

    /* Teks Simpel Kiri & Pojok Kanan Bawah */
    .poster-left-label {
        position: relative;
        z-index: 4;
        padding-bottom: 3.5rem;
    }
    .poster-left-script {
        font-family: 'Playfair Display', serif;
        font-style: italic;
        font-size: 1.55rem;
        color: var(--ak-saffron);
        display: block;
        margin-bottom: -4px;
    }
    .poster-left-bold {
        font-family: 'Playfair Display', serif;
        font-size: clamp(2.1rem, 3.6vw, 3.1rem);
        font-weight: 800;
        line-height: 1.05;
        text-transform: uppercase;
        letter-spacing: 0.02em;
        color: #FFF9F2;
    }

    .poster-right-signature {
        position: relative;
        z-index: 4;
        padding-bottom: 3.5rem;
        text-align: right;
    }
    .owner-name-badge {
        font-family: 'Playfair Display', serif;
        font-size: clamp(1.7rem, 2.8vw, 2.4rem);
        font-weight: 800;
        color: var(--ak-saffron);
        line-height: 1.1;
    }
    .owner-role-sub {
        font-size: 0.85rem;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        color: rgba(255, 249, 242, 0.82);
        font-weight: 600;
    }

    .floating-herb {
        position: absolute;
        z-index: 2;
        pointer-events: none;
        animation: herbFloat 5s ease-in-out infinite;
    }

    /* ============================================================
       2. CERITA & NILAI DAPUR (TANPA KOTAK)
       ============================================================ */
    .about-values-band {
        background-color: var(--ak-cream);
        padding: 5.5rem 0;
    }
    .editorial-pillar {
        position: relative;
        padding: 1rem 1.25rem;
        border-left: 2px solid rgba(228, 112, 29, 0.35);
        transition: border-color 0.3s ease, transform 0.3s ease;
    }
    .editorial-pillar:hover {
        border-left-color: var(--ak-flame);
        transform: translateX(6px);
    }
    .pillar-giant-num {
        font-family: 'Playfair Display', serif;
        font-size: 3.4rem;
        font-weight: 800;
        line-height: 1;
        color: rgba(228, 112, 29, 0.28);
        margin-bottom: 0.75rem;
    }

    /* ============================================================
       3. GALERI SUASANA DAPUR (ORGANIC BLOB SHAPES)
       ============================================================ */
    .about-gallery-band {
        background: linear-gradient(135deg, #E4701D 0%, #F29F1B 55%, #D95B12 100%);
        padding: 5.5rem 0;
        color: #FFF9F2;
    }
    .organic-gallery-blob {
        width: 100%;
        height: 290px;
        overflow: hidden;
        box-shadow: 0 24px 48px rgba(74, 21, 3, 0.32);
        transition: transform 0.4s cubic-bezier(0.22, 1, 0.36, 1);
    }
    .organic-gallery-blob:hover {
        transform: translateY(-10px) scale(1.02);
    }
    .blob-shape-1 { border-radius: 62% 38% 46% 54% / 56% 44% 56% 44%; }
    .blob-shape-2 { border-radius: 44% 56% 60% 40% / 48% 58% 42% 52%; }
    .blob-shape-3 { border-radius: 54% 46% 38% 62% / 52% 40% 60% 48%; }
    .organic-gallery-blob img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* ============================================================
       4. CTA PENUTUP
       ============================================================ */
    .about-closing-cta {
        background: linear-gradient(155deg, #6B2107 0%, #3D1002 100%);
        color: #FFF9F2;
        padding: 5rem 0;
    }
    .btn-saffron-cta {
        background: linear-gradient(135deg, #F3A71C 0%, #E4701D 100%);
        color: #1E1106;
        font-weight: 700;
        border-radius: 999px;
        padding: 14px 34px;
        border: none;
        box-shadow: 0 14px 28px rgba(0, 0, 0, 0.28);
        transition: transform 0.25s ease;
    }
    .btn-saffron-cta:hover {
        transform: translateY(-3px);
        color: #1E1106;
    }

    @media (max-width: 991.98px) {
        .owner-poster-hero { min-height: auto; padding-top: 7rem; }
        .poster-left-label, .poster-right-signature { text-align: center; padding-bottom: 1.5rem; }
        .owner-center-cutout img { max-height: 430px; }
    }
</style>

<!-- =================================================================
     1. HERO POSTER FULL-SCREEN (MEET THE OWNER)
     ================================================================= -->
<section class="owner-poster-hero">
    <!-- Tipografi Raksasa di Belakang Subjek -->
    <div class="poster-giant-typography anim-giant-word">THE OWNER</div>

    <!-- Daun & Rempah Melayang Halus -->


    <div class="container mt-auto position-relative" style="z-index: 3;">
        <div class="row align-items-end">
            <!-- Kiri Bawah: Tulisan Simpel Meet The Owner -->
            <div class="col-lg-3 poster-left-label anim-caption-left">
                <div class="poster-left-bold">Meet The<br>Owner</div>
                <p class="small mt-2 mb-0" style="color: rgba(255, 249, 242, 0.78);">
                    Meracik kehangatan masakan rumahan untuk setiap acara spesial Anda.
                </p>
            </div>

            <!-- Tengah: Foto Sosok Ibu Besar Tanpa Background -->
            <div class="col-lg-6 text-center anim-owner-cutout">
                <div class="owner-center-cutout">
                    <img src="{{ asset('images/owner-alfi.png') }}"
                         alt="Ibu Alfi - Owner Alfi Kitchen"
                         onerror="this.src='https://images.unsplash.com/photo-1595273670150-bd0c3c392e46?q=80&w=900'">
                </div>
            </div>

            <!-- Pojok Kanan Bawah: Identitas Ibu Alfi, Owner -->
            <div class="col-lg-3 poster-right-signature anim-caption-right">
                <div class="owner-name-badge">Ibu Alfi</div>
                <div class="owner-role-sub mb-3">Founder &amp; Owner</div>
                <div class="d-inline-flex gap-4 text-end">
                    <div>
                        <div class="fw-bold fs-4 text-white lh-1">100%</div>
                        <small style="color: rgba(255,249,242,0.7); font-size: 0.72rem;">HALAL &amp; SEGAR</small>
                    </div>
                    <div>
                        <div class="fw-bold fs-4 text-white lh-1">10+</div>
                        <small style="color: rgba(255,249,242,0.7); font-size: 0.72rem;">TAHUN RESEP</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pemisah Gelombang dari Hero ke Krem Hangat -->
<div style="background-color: #340D02; line-height: 0; margin-top: -2px;">
    <svg viewBox="0 0 1440 85" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="width: 100%; height: 65px;">
        <path d="M0,25 C360,95 1080,-15 1440,50 L1440,85 L0,85 Z" fill="#F8EDE3"/>
    </svg>
</div>

<!-- =================================================================
     2. CERITA & STANDAR KUALITAS DAPUR (TANPA KOTAK)
     ================================================================= -->
<section class="about-values-band">
    <div class="container">
        <div class="row align-items-end mb-5 reveal-about">
            <div class="col-lg-6">
                <p class="text-uppercase fw-bold small mb-1" style="color: var(--ak-terracotta); letter-spacing: 0.14em;">Cerita &amp; Prinsip Dapur</p>
                <h2 class="display-6 fw-bold mb-0" style="font-family: 'Playfair Display', serif; color: var(--ak-espresso);">
                    Berawal dari Meja Makan Keluarga
                </h2>
            </div>
            <div class="col-lg-6">
                <p class="text-muted small mb-0 mt-2 mt-lg-0" style="line-height: 1.75;">
                    Alfi Kitchen lahir dari kecintaan Ibu Alfi meracik bumbu rempah Nusantara untuk menjamu kerabat. Kini, standar rasa hangat dan tulus tersebut kami bawa ke setiap paket nasi box, catering harian, hingga prasmanan acara besar.
                </p>
            </div>
        </div>

        <div class="row g-5">
            <div class="col-md-4 reveal-about">
                <div class="editorial-pillar">
                    <div class="pillar-giant-num">01</div>
                    <h5 class="fw-bold mb-2" style="font-family: 'Playfair Display', serif; color: var(--ak-espresso);">Bahan Pasar Segar &amp; Halal</h5>
                    <p class="text-muted small mb-0" style="line-height: 1.75;">
                        Seluruh daging, ayam, ikan, dan sayuran dibeli serta diolah pada hari acara berlangsung tanpa penyimpanan beku berhari-hari.
                    </p>
                </div>
            </div>

            <div class="col-md-4 reveal-about" style="transition-delay: 0.14s;">
                <div class="editorial-pillar">
                    <div class="pillar-giant-num">02</div>
                    <h5 class="fw-bold mb-2" style="font-family: 'Playfair Display', serif; color: var(--ak-espresso);">Racikan Rempah Asli</h5>
                    <p class="text-muted small mb-0" style="line-height: 1.75;">
                        Menggunakan bumbu rempah segar yang dihaluskan sendiri setiap pagi tanpa pengawet maupun pewarna buatan.
                    </p>
                </div>
            </div>

            <div class="col-md-4 reveal-about" style="transition-delay: 0.28s;">
                <div class="editorial-pillar">
                    <div class="pillar-giant-num">03</div>
                    <h5 class="fw-bold mb-2" style="font-family: 'Playfair Display', serif; color: var(--ak-espresso);">Kemasan Rapi &amp; Tepat Waktu</h5>
                    <p class="text-muted small mb-0" style="line-height: 1.75;">
                        Setiap hidangan dikemas higienis agar kuah dan sambal tetap rapi, lalu diantar terjadwal sebelum acara dimulai.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pemisah Gelombang ke Band Oranye Kunyit -->
<div style="background-color: #F8EDE3; line-height: 0;">
    <svg viewBox="0 0 1440 85" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="width: 100%; height: 65px;">
        <path d="M0,55 C420,-15 1020,95 1440,20 L1440,85 L0,85 Z" fill="#E4701D"/>
    </svg>
</div>

<!-- =================================================================
     3. GALERI DOKUMENTASI (ORGANIC BLOB SHAPES, BEBAS KOTAK)
     ================================================================= -->
<section class="about-gallery-band">
    <div class="container">
        <div class="text-center mb-5 reveal-about">
            <p class="text-uppercase fw-bold small mb-1" style="color: #FFF9F2; letter-spacing: 0.14em;">Suasana Dapur &amp; Sajian</p>
            <h2 class="display-6 fw-bold text-white" style="font-family: 'Playfair Display', serif;">
                Potret Hangat Penyajian Kami
            </h2>
        </div>

        <div class="row g-4 align-items-center">
            <div class="col-md-4 reveal-about">
                <div class="organic-gallery-blob blob-shape-1">
                    <img src="{{ asset('images/galeri-1.jpg') }}"
                         alt="Menu Sehat Harian Alfi Kitchen"
                         onerror="this.src='https://images.unsplash.com/photo-1512621776951-a57141f2eefd?q=80&w=700'">
                </div>
                <p class="text-center fw-semibold small mt-3 mb-0">Sajian Catering Harian Bergizi</p>
            </div>

            <div class="col-md-4 reveal-about" style="transition-delay: 0.12s;">
                <div class="organic-gallery-blob blob-shape-2">
                    <img src="{{ asset('images/galeri-2.jpg') }}"
                         alt="Jamuan Prasmanan Alfi Kitchen"
                         onerror="this.src='https://images.unsplash.com/photo-1555244162-803834f70033?q=80&w=700'">
                </div>
                <p class="text-center fw-semibold small mt-3 mb-0">Penataan Meja Prasmanan Acara</p>
            </div>

            <div class="col-md-4 reveal-about" style="transition-delay: 0.24s;">
                <div class="organic-gallery-blob blob-shape-3">
                    <img src="{{ asset('images/galeri-3.jpg') }}"
                         alt="Aneka Kue & Snack Box"
                         onerror="this.src='https://images.unsplash.com/photo-1509440159596-0249088772ff?q=80&w=700'">
                </div>
                <p class="text-center fw-semibold small mt-3 mb-0">Aneka Kue Segar untuk Snack Box</p>
            </div>
        </div>
    </div>
</section>

<!-- Pemisah Gelombang ke CTA Gelap -->
<div style="background-color: #D95B12; line-height: 0;">
    <svg viewBox="0 0 1440 85" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="width: 100%; height: 65px;">
        <path d="M0,20 C380,95 1060,-15 1440,50 L1440,85 L0,85 Z" fill="#6B2107"/>
    </svg>
</div>

<!-- =================================================================
     4. CTA PENUTUP
     ================================================================= -->
<section class="about-closing-cta text-center">
    <div class="container reveal-about">
        <p class="text-uppercase fw-bold small mb-2" style="color: var(--ak-saffron); letter-spacing: 0.14em;">Siap Melayani Acaramu</p>
        <h2 class="display-5 fw-bold mb-3" style="font-family: 'Playfair Display', serif;">
            Rasakan Sendiri Kehangatan Dapur Ibu Alfi
        </h2>
        <p class="mx-auto mb-4" style="max-width: 540px; color: rgba(255, 249, 242, 0.85);">
            Pilih paket hidangan favorit Anda sekarang atau lihat ulasan nyata dari para pelanggan yang telah mempercayakan acaranya kepada kami.
        </p>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="{{ auth()->check() ? route('orders.create') : route('login') }}" class="btn btn-saffron-cta">
                Pesan Katering Sekarang <i class="bi bi-arrow-right ms-2"></i>
            </a>
            <a href="{{ route('menu') }}" class="btn btn-outline-light rounded-pill px-4 py-3 fw-semibold">
                Lihat Daftar Menu
            </a>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const revealEls = document.querySelectorAll('.reveal-about');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.14 });

    revealEls.forEach(el => observer.observe(el));
});
</script>
@endsection