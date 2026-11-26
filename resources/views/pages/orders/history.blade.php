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

    @keyframes fadeSlideUp {
        0% { opacity: 0; transform: translateY(32px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    .anim-hist-hero { opacity: 0; animation: fadeSlideUp 0.85s cubic-bezier(0.22, 1, 0.36, 1) 0.1s forwards; }
    .anim-hist-pill { opacity: 0; animation: fadeSlideUp 0.9s cubic-bezier(0.22, 1, 0.36, 1) 0.22s forwards; }

    /* ============================================================
       1. HERO TERAKOTA PEKAT (MENYATU DENGAN NAVBAR PUTIH)
       ============================================================ */
    .history-hero-bold {
        position: relative;
        background: radial-gradient(circle at 65% 42%, #B84214 0%, #7B2809 62%, #421203 100%);
        color: #FFF9F2;
        padding: 8.5rem 0 6.5rem;
        overflow: hidden;
    }
    .history-watermark {
        position: absolute;
        top: 48%;
        right: 5%;
        transform: translateY(-50%);
        font-family: 'Playfair Display', serif;
        font-size: clamp(3.5rem, 10vw, 8.5rem);
        font-weight: 900;
        color: rgba(255, 249, 242, 0.05);
        white-space: nowrap;
        pointer-events: none;
        user-select: none;
    }

    /* ============================================================
       2. KARTU PROFIL MELAYANG & GELEMBUNG RIWAYAT PESANAN
       ============================================================ */
    .user-profile-pill {
        background-color: #FFF9F2;
        border-radius: 999px;
        padding: 1.5rem 2.5rem;
        box-shadow: 0 22px 50px rgba(34, 15, 4, 0.15);
        margin-top: -3.2rem;
        position: relative;
        z-index: 5;
    }
    .user-initial-blob {
        width: 62px;
        height: 62px;
        border-radius: 58% 42% 48% 52% / 52% 58% 42% 48%;
        background: linear-gradient(135deg, #E4701D 0%, #7B2809 100%);
        color: #FFF9F2;
        font-family: 'Playfair Display', serif;
        font-size: 1.65rem;
        font-weight: 800;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .order-bubble-card {
        background-color: #FFF9F2;
        border-radius: 38px 38px 38px 8px;
        padding: 2rem;
        height: 100%;
        display: flex;
        flex-direction: column;
        box-shadow: 0 14px 34px rgba(74, 21, 3, 0.06);
        transition: transform 0.3s cubic-bezier(0.22, 1, 0.36, 1), box-shadow 0.3s ease;
    }
    .order-bubble-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 22px 46px rgba(123, 40, 9, 0.12);
    }
    .menu-line-pill {
        background-color: #F8EDE3;
        border-radius: 18px;
        padding: 11px 16px;
        margin-bottom: 8px;
    }
    .status-indicator-dot {
        display: inline-block;
        width: 9px;
        height: 9px;
        border-radius: 50%;
        margin-right: 7px;
    }

    @media (max-width: 767.98px) {
        .user-profile-pill { border-radius: 32px; margin-top: -1.8rem; }
    }
</style>

<!-- HEADER TERAKOTA PEKAT -->
<section class="history-hero-bold">
    <div class="history-watermark">RIWAYAT SAYA</div>
    <div class="container position-relative anim-hist-hero" style="z-index: 2;">
        <p class="text-uppercase fw-bold small mb-2" style="color: var(--ak-saffron); letter-spacing: 0.16em;">
            Profil &amp; Aktivitas Pelanggan
        </p>
        <h1 class="display-4 fw-bold mb-2" style="font-family: 'Playfair Display', serif; color: #FFF9F2;">
            Riwayat <span style="color: var(--ak-saffron); font-style: italic;">Pesanan</span> Saya
        </h1>
        <p class="small mb-0" style="max-width: 560px; color: rgba(255, 249, 242, 0.84);">
            Pantau status pemrosesan katering dan lihat daftar lengkap hidangan yang pernah Anda pesan di Alfi Kitchen.
        </p>
    </div>
</section>

<!-- KARTU IDENTITAS USER LOGIN MELAYANG -->
<div class="container anim-hist-pill">
    <div class="user-profile-pill">
        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
            <div class="d-flex align-items-center gap-3">
                <div class="user-initial-blob">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
                <div>
                    <h4 class="fw-bold mb-0" style="font-family: 'Playfair Display', serif; color: var(--ak-espresso);">{{ $user->name }}</h4>
                    <p class="text-muted small mb-0">{{ $user->email }}</p>
                </div>
            </div>

            <div class="d-flex align-items-center gap-4">
                <div class="text-md-end">
                    <span class="small text-muted d-block">Total Transaksi</span>
                    <strong class="fs-5" style="color: var(--ak-crimson);">{{ $orders->count() }} Pesanan</strong>
                </div>
                <a href="{{ route('orders.create') }}"
                   class="btn rounded-pill px-4 py-2 fw-bold text-white shadow-sm"
                   style="background: linear-gradient(135deg, #E4701D, #B84214);">
                    Pesan Lagi <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- DAFTAR PESANAN USER -->
<section class="py-5" style="background-color: var(--ak-cream);">
    <div class="container pb-4">
        <div class="row g-4">
            @forelse($orders as $order)
                @php
                    $statusLabel = match($order->status) {
                        'completed' => 'Pesanan Selesai',
                        'processing', 'confirmed' => 'Sedang Diproses Dapur',
                        'cancelled' => 'Dibatalkan',
                        default => 'Menunggu Konfirmasi Admin',
                    };
                    $statusColor = match($order->status) {
                        'completed' => '#2E7D32',
                        'processing', 'confirmed' => '#D97706',
                        'cancelled' => '#C62828',
                        default => '#E4701D',
                    };
                @endphp

                <div class="col-md-6">
                    <div class="order-bubble-card">
                        <!-- Header Kode & Status -->
                        <div class="d-flex justify-content-between align-items-start gap-2 mb-3">
                            <div>
                                <span class="fw-bold d-block fs-5" style="font-family: 'Playfair Display', serif; color: var(--ak-crimson);">
                                    {{ $order->order_code }}
                                </span>
                                <small class="text-muted">
                                    Jadwal Kirim: {{ \Carbon\Carbon::parse($order->delivery_date)->format('d M Y') }}, pukul {{ $order->delivery_time }} WIB
                                </small>
                            </div>
                            <span class="small fw-bold" style="color: {{ $statusColor }};">
                                <span class="status-indicator-dot" style="background-color: {{ $statusColor }};"></span>{{ $statusLabel }}
                            </span>
                        </div>

                        <!-- Rincian Menu yang Dipesan -->
                        <div class="mb-3">
                            <p class="small fw-semibold text-muted mb-2">Menu yang Dipesan:</p>
                            @foreach($order->orderItems as $item)
                                <div class="menu-line-pill d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="fw-semibold text-dark d-block small">{{ $item->menu->name ?? 'Menu Katering' }}</span>
                                        @if($item->item_notes)
                                            <small class="text-muted" style="font-size: 0.75rem;">Catatan: {{ $item->item_notes }}</small>
                                        @endif
                                    </div>
                                    <div class="text-end">
                                        <span class="small fw-bold" style="color: var(--ak-crimson);">{{ $item->quantity }} porsi</span>
                                        <small class="text-muted d-block" style="font-size: 0.75rem;">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</small>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Alamat Pengiriman -->
                        <p class="small text-muted mb-3">
                            <i class="bi bi-geo-alt-fill me-1" style="color: var(--ak-flame);"></i>{{ $order->delivery_address }}
                        </p>

                        <!-- Footer Total & Aksi -->
                        <div class="mt-auto pt-3 border-top d-flex justify-content-between align-items-center" style="border-color: #E0CBB7 !important;">
                            <div>
                                <small class="text-muted d-block">Total Pembayaran ({{ $order->payment_status === 'paid' ? 'Lunas' : 'Verifikasi Bukti' }})</small>
                                <strong class="fs-5" style="color: var(--ak-espresso);">Rp {{ number_format($order->total_price, 0, ',', '.') }}</strong>
                            </div>

                            @if($order->status === 'completed')
                                <a href="{{ route('testimoni') }}"
                                   class="btn btn-sm rounded-pill px-4 py-2 fw-semibold text-white"
                                   style="background: linear-gradient(135deg, #E4701D, #B84214);">
                                    Beri Ulasan <i class="bi bi-star-fill ms-1"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center py-5" style="background-color: #FFF9F2; border-radius: 40px;">
                        <h5 class="fw-bold mb-2" style="font-family: 'Playfair Display', serif; color: var(--ak-espresso);">Belum Ada Riwayat Pesanan</h5>
                        <p class="text-muted small mb-3">Anda belum pernah melakukan pemesanan katering di Alfi Kitchen.</p>
                        <a href="{{ route('menu') }}" class="btn rounded-pill px-4 py-2 fw-semibold text-white" style="background: linear-gradient(135deg, #E4701D, #B84214);">
                            Lihat Daftar Menu
                        </a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection