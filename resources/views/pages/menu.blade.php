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
       ANIMASI PEMBUKA & SCROLL REVEAL
       ============================================================ */
    @keyframes menuHeroLeft {
        0% { opacity: 0; transform: translate3d(-55px, 15px, 0); }
        100% { opacity: 1; transform: translate3d(0, 0, 0); }
    }
    @keyframes spotlightSpinIn {
        0% { opacity: 0; transform: scale(0.8) rotate(-22deg); }
        100% { opacity: 1; transform: scale(1) rotate(0deg); }
    }
    @keyframes sidePillSlide {
        0% { opacity: 0; transform: translate3d(70px, 0, 0); }
        100% { opacity: 1; transform: translate3d(0, 0, 0); }
    }
    @keyframes herbFloat {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-15px) rotate(11deg); }
    }

    .anim-menu-left { opacity: 0; animation: menuHeroLeft 0.9s cubic-bezier(0.22, 1, 0.36, 1) 0.1s forwards; }
    .anim-menu-plate { opacity: 0; animation: spotlightSpinIn 1.1s cubic-bezier(0.22, 1, 0.36, 1) 0.2s forwards; }
    .anim-side-1 { opacity: 0; animation: sidePillSlide 0.85s cubic-bezier(0.22, 1, 0.36, 1) 0.25s forwards; }
    .anim-side-2 { opacity: 0; animation: sidePillSlide 0.85s cubic-bezier(0.22, 1, 0.36, 1) 0.38s forwards; }
    .anim-side-3 { opacity: 0; animation: sidePillSlide 0.85s cubic-bezier(0.22, 1, 0.36, 1) 0.51s forwards; }

    .reveal-menu {
        opacity: 0;
        transform: translateY(40px) scale(0.96);
        transition: opacity 0.8s cubic-bezier(0.22, 1, 0.36, 1), transform 0.8s cubic-bezier(0.22, 1, 0.36, 1);
    }
    .reveal-menu.is-visible {
        opacity: 1;
        transform: translateY(0) scale(1);
    }

    /* ============================================================
       1. HERO EDITORIAL MENU (TERAKOTA PEKAT + SIDE-DOCKED PILLS)
       ============================================================ */
    .menu-hero-bold {
        position: relative;
        background: radial-gradient(circle at 68% 45%, #B84214 0%, #7B2809 58%, #421203 100%);
        color: #FFF9F2;
        padding: 8.5rem 0 5.5rem;
        overflow: hidden;
    }
    .menu-hero-diagonal {
        position: absolute;
        top: 0;
        right: 0;
        width: 44%;
        height: 100%;
        background: linear-gradient(155deg, rgba(243, 167, 28, 0.16) 0%, rgba(228, 112, 29, 0.05) 100%);
        clip-path: polygon(24% 0, 100% 0, 100% 100%, 0% 100%);
        z-index: 1;
        pointer-events: none;
    }
    .menu-watermark {
        position: absolute;
        left: 34%;
        top: 52%;
        transform: translateY(-50%) rotate(-90deg);
        font-family: 'Playfair Display', serif;
        font-size: 5.5rem;
        font-weight: 900;
        letter-spacing: 0.12em;
        color: rgba(255, 249, 242, 0.06);
        pointer-events: none;
        user-select: none;
        white-space: nowrap;
        z-index: 1;
    }
    .spotlight-plate-stage {
        position: relative;
        width: 335px;
        height: 335px;
        margin: 0 auto;
        border-radius: 50%;
        padding: 12px;
        background: linear-gradient(135deg, rgba(243, 167, 28, 0.65), rgba(255, 249, 242, 0.18));
        box-shadow: 0 32px 65px rgba(18, 5, 1, 0.62);
        z-index: 3;
    }
    .spotlight-plate-stage img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
    }
    /* Kartu Pil Menempel di Sisi Kanan */
    .side-pill-stack {
        display: flex;
        flex-direction: column;
        gap: 16px;
        position: relative;
        z-index: 3;
    }
    .side-docked-pill {
        display: flex;
        align-items: center;
        gap: 16px;
        background: rgba(255, 249, 242, 0.12);
        backdrop-filter: blur(10px);
        padding: 11px 24px 11px 11px;
        border-radius: 999px 0 0 999px;
        margin-right: -3.5rem;
        box-shadow: 0 14px 32px rgba(18, 5, 1, 0.35);
        text-decoration: none;
        color: #FFF9F2;
        transition: all 0.3s ease;
    }
    .side-docked-pill:hover,
    .side-docked-pill.featured-pill {
        background: linear-gradient(135deg, #F3A71C 0%, #E4701D 100%);
        color: #1E1106;
        transform: translateX(-10px);
    }
    .side-docked-pill img {
        width: 62px;
        height: 62px;
        border-radius: 50%;
        object-fit: cover;
        border: 2.5px solid rgba(255, 249, 242, 0.6);
        flex-shrink: 0;
    }
    .floating-herb {
        position: absolute;
        z-index: 2;
        pointer-events: none;
        animation: herbFloat 4.8s ease-in-out infinite;
    }

    /* ============================================================
       2. KATALOG MENU (BEBAS KOTAK — PIRING MELAYANG DI ATAS KREM)
       ============================================================ */
    .menu-catalog-band {
        background-color: var(--ak-cream);
        padding: 4.5rem 0 6rem;
    }
    .category-pill-nav .nav-link {
        border-radius: 999px;
        padding: 11px 26px;
        font-weight: 600;
        color: var(--ak-espresso);
        background-color: rgba(141, 56, 15, 0.1);
        transition: all 0.25s ease;
    }
    .category-pill-nav .nav-link:hover {
        background-color: rgba(228, 112, 29, 0.2);
    }
    .category-pill-nav .nav-link.active {
        background: linear-gradient(135deg, #E4701D 0%, #B84214 100%) !important;
        color: #FFF9F2 !important;
        box-shadow: 0 10px 24px rgba(184, 66, 20, 0.32);
    }

    /* Item Menu Bebas Kotak (Free-Floating Plate Item) */
    .frameless-dish-entry {
        text-align: center;
        padding: 1rem 1.25rem 2rem;
        transition: transform 0.35s cubic-bezier(0.22, 1, 0.36, 1);
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    .frameless-dish-entry:hover {
        transform: translateY(-10px);
    }
    .frameless-plate-disc {
        width: 215px;
        height: 215px;
        margin: 0 auto 1.35rem;
        border-radius: 50%;
        padding: 9px;
        background: linear-gradient(135deg, #ffffff 0%, #EFE0D1 100%);
        box-shadow: 0 22px 45px rgba(74, 21, 3, 0.18);
        transition: transform 0.4s ease, box-shadow 0.4s ease;
    }
    .frameless-dish-entry:hover .frameless-plate-disc {
        transform: rotate(6deg) scale(1.03);
        box-shadow: 0 28px 52px rgba(123, 40, 9, 0.26);
    }
    .frameless-plate-disc img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
    }
    .dish-cat-label {
        font-size: 0.74rem;
        letter-spacing: 0.14em;
        text-transform: uppercase;
        font-weight: 700;
        color: var(--ak-terracotta);
    }
    .dish-price-tag {
        display: inline-block;
        background-color: var(--ak-crimson);
        color: #FFF9F2;
        font-weight: 700;
        font-size: 0.92rem;
        padding: 6px 20px;
        border-radius: 999px;
        margin-bottom: 12px;
    }
    .btn-order-dish {
        background: linear-gradient(135deg, #E4701D 0%, #B84214 100%);
        color: #FFF9F2;
        font-weight: 600;
        border-radius: 999px;
        padding: 10px 28px;
        border: none;
        box-shadow: 0 8px 20px rgba(228, 112, 29, 0.25);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .btn-order-dish:hover {
        transform: translateY(-2px);
        color: #FFF9F2;
        box-shadow: 0 12px 26px rgba(228, 112, 29, 0.38);
    }

    @media (max-width: 991.98px) {
        .menu-hero-diagonal { width: 100%; clip-path: none; opacity: 0.4; }
        .side-docked-pill { border-radius: 999px; margin-right: 0; }
        .spotlight-plate-stage { width: 265px; height: 265px; }
    }
</style>

<!-- =================================================================
     1. HERO EDITORIAL MENU (TERAKOTA PEKAT)
     ================================================================= -->
<section class="menu-hero-bold">
    <div class="menu-hero-diagonal"></div>
    <div class="menu-watermark">ALFI KITCHEN</div>


    <div class="container position-relative" style="z-index: 3;">
        <div class="row align-items-center gy-5">
            <!-- Kiri: Judul Editorial -->
            <div class="col-lg-4 anim-menu-left">
                <p class="text-uppercase fw-bold small mb-2" style="color: var(--ak-saffron); letter-spacing: 0.16em;">
                    Katalog Sajian Dapur
                </p>
                <h1 class="display-4 fw-bold mb-3" style="font-family: 'Playfair Display', serif; color: #FFF9F2; line-height: 1.08;">
                    Sajian<br><span style="color: var(--ak-saffron); font-style: italic;">Pilihan</span>
                </h1>
                <div style="width: 48px; height: 3px; background-color: var(--ak-saffron); margin-bottom: 18px;"></div>
                <p class="small mb-4" style="color: rgba(255, 249, 242, 0.85); line-height: 1.75;">
                    Setiap paket dimasak segar sesuai pesanan dengan bumbu racikan dapur Ibu Alfi—tanpa pengawet dan 100% halal.
                </p>
                <a href="{{ auth()->check() ? route('orders.create') : route('login') }}"
                   class="btn rounded-pill px-4 py-3 fw-bold shadow"
                   style="background: linear-gradient(135deg, #F3A71C 0%, #E4701D 100%); color: #1E1106;">
                    Pesan Sekarang <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>

            <!-- Tengah: Piring Bundar Spotlight -->
            <div class="col-lg-4 text-center anim-menu-plate">
                @php
                    $spotlight = $featuredMenu ?? $menus->first();
                @endphp
                <div class="spotlight-plate-stage">
                    <img src="{{ $spotlight->image ?? 'https://images.unsplash.com/photo-1541544741938-0af808871cc0?q=80&w=800' }}"
                         alt="{{ $spotlight->name ?? 'Menu Unggulan' }}"
                         onerror="this.src='https://images.unsplash.com/photo-1541544741938-0af808871cc0?q=80&w=800'">
                </div>
                @if($spotlight)
                    <div class="mt-3">
                        <span class="fw-bold d-block text-white fs-5" style="font-family: 'Playfair Display', serif;">{{ $spotlight->name }}</span>
                        <span class="small fw-semibold" style="color: var(--ak-saffron);">Rp {{ number_format($spotlight->price, 0, ',', '.') }} / porsi</span>
                    </div>
                @endif
            </div>

            <!-- Kanan: Side-Docked Menu Pills -->
            <div class="col-lg-4">
                <div class="side-pill-stack">
                    @foreach(($sideSpotlightMenus ?? $menus->take(3)) as $idx => $sideItem)
                        <a href="{{ auth()->check() ? route('orders.create', ['menu_id' => $sideItem->id]) : route('login') }}"
                           class="side-docked-pill {{ $idx === 0 ? 'featured-pill' : '' }} anim-side-{{ $idx + 1 }}">
                            <img src="{{ $sideItem->image }}"
                                 alt="{{ $sideItem->name }}"
                                 onerror="this.src='https://images.unsplash.com/photo-1598515214211-89d3c73ae83b?q=80&w=600'">
                            <div>
                                <div class="small text-uppercase fw-bold opacity-75" style="font-size: 0.7rem; letter-spacing: 0.08em;">
                                    {{ $sideItem->category->name ?? 'Menu Pilihan' }}
                                </div>
                                <div class="fw-bold fs-6">{{ $sideItem->name }}</div>
                                <div class="fw-semibold small">Rp {{ number_format($sideItem->price, 0, ',', '.') }}</div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pemisah Gelombang Organik -->
<div style="background-color: #421203; line-height: 0; margin-top: -2px;">
    <svg viewBox="0 0 1440 85" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="width: 100%; height: 65px;">
        <path d="M0,25 C360,95 1080,-15 1440,50 L1440,85 L0,85 Z" fill="#F8EDE3"/>
    </svg>
</div>

<!-- =================================================================
     2. KATALOG LENGKAP MENU (BEBAS KOTAK, PIRING MELAYANG)
     ================================================================= -->
<section class="menu-catalog-band">
    <div class="container">
        <div class="text-center mb-4 reveal-menu">
            <p class="dish-cat-label mb-1">Eksplorasi Hidangan</p>
            <h2 class="display-6 fw-bold" style="font-family: 'Playfair Display', serif; color: var(--ak-espresso);">
                Pilih Paket Sesuai Kebutuhan Acaramu
            </h2>
        </div>

        <!-- Filter Tab Kategori -->
        <ul class="nav nav-pills justify-content-center mb-5 gap-2 category-pill-nav reveal-menu" id="menuTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all-menu" type="button" role="tab">
                    Semua Sajian ({{ $menus->count() }})
                </button>
            </li>
            @foreach($categories as $category)
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="cat-{{ $category->id }}-tab" data-bs-toggle="tab" data-bs-target="#cat-{{ $category->id }}" type="button" role="tab">
                        {{ $category->name }}
                    </button>
                </li>
            @endforeach
        </ul>

        <div class="tab-content" id="menuTabContent">
            <!-- Tab Semua Menu -->
            <div class="tab-pane fade show active" id="all-menu" role="tabpanel">
                <div class="row g-4">
                    @forelse($menus as $idx => $menu)
                        <div class="col-md-6 col-lg-4 reveal-menu" style="transition-delay: {{ ($idx % 3) * 0.1 }}s;">
                            <div class="frameless-dish-entry">
                                <div class="frameless-plate-disc">
                                    <img src="{{ $menu->image }}"
                                         alt="{{ $menu->name }}"
                                         onerror="this.src='https://images.unsplash.com/photo-1598515214211-89d3c73ae83b?q=80&w=600'">
                                </div>

                                <span class="dish-cat-label mb-1">{{ $menu->category->name ?? 'Katering' }}</span>
                                <h4 class="fw-bold mb-2" style="font-family: 'Playfair Display', serif; color: var(--ak-espresso);">
                                    {{ $menu->name }}
                                </h4>

                                <div>
                                    <span class="dish-price-tag">Rp {{ number_format($menu->price, 0, ',', '.') }} / porsi</span>
                                </div>

                                <p class="text-muted small mb-2 px-lg-3">{{ $menu->description }}</p>
                                <p class="small mb-4" style="color: var(--ak-terracotta);">
                                    Minimal pemesanan: <strong>{{ $menu->min_order ?? 1 }} porsi</strong>
                                </p>

                                <div class="mt-auto">
                                    <a href="{{ auth()->check() ? route('orders.create', ['menu_id' => $menu->id]) : route('login') }}"
                                       class="btn btn-order-dish">
                                        Pesan Menu Ini <i class="bi bi-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5">
                            <p class="text-muted">Belum ada menu yang tersedia di database.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Tab Per Kategori -->
            @foreach($categories as $category)
                <div class="tab-pane fade" id="cat-{{ $category->id }}" role="tabpanel">
                    @php
                        $categoryMenus = $menusByCategory->get($category->name, collect());
                    @endphp
                    <div class="row g-4">
                        @forelse($categoryMenus as $menu)
                            <div class="col-md-6 col-lg-4">
                                <div class="frameless-dish-entry">
                                    <div class="frameless-plate-disc">
                                        <img src="{{ $menu->image }}"
                                             alt="{{ $menu->name }}"
                                             onerror="this.src='https://images.unsplash.com/photo-1598515214211-89d3c73ae83b?q=80&w=600'">
                                    </div>

                                    <span class="dish-cat-label mb-1">{{ $category->name }}</span>
                                    <h4 class="fw-bold mb-2" style="font-family: 'Playfair Display', serif; color: var(--ak-espresso);">
                                        {{ $menu->name }}
                                    </h4>

                                    <div>
                                        <span class="dish-price-tag">Rp {{ number_format($menu->price, 0, ',', '.') }} / porsi</span>
                                    </div>

                                    <p class="text-muted small mb-2 px-lg-3">{{ $menu->description }}</p>
                                    <p class="small mb-4" style="color: var(--ak-terracotta);">
                                        Minimal pemesanan: <strong>{{ $menu->min_order ?? 1 }} porsi</strong>
                                    </p>

                                    <div class="mt-auto">
                                        <a href="{{ auth()->check() ? route('orders.create', ['menu_id' => $menu->id]) : route('login') }}"
                                           class="btn btn-order-dish">
                                            Pesan Menu Ini <i class="bi bi-arrow-right ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center py-5">
                                <p class="text-muted">Belum ada menu pada kategori {{ $category->name }}.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const revealEls = document.querySelectorAll('.reveal-menu');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.12 });

    revealEls.forEach(el => observer.observe(el));
});
</script>
@endsection