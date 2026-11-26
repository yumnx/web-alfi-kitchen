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

    @keyframes fadeRise {
        0% { opacity: 0; transform: translateY(35px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    .anim-testi-hero { opacity: 0; animation: fadeRise 0.9s cubic-bezier(0.22, 1, 0.36, 1) 0.1s forwards; }
    .anim-testi-bar { opacity: 0; animation: fadeRise 0.95s cubic-bezier(0.22, 1, 0.36, 1) 0.25s forwards; }

    /* ============================================================
       1. HEADER EDITORIAL TERAKOTA PEKAT
       ============================================================ */
    .testi-hero-bold {
        position: relative;
        background: radial-gradient(circle at 50% 42%, #B84214 0%, #7B2809 62%, #421203 100%);
        color: #FFF9F2;
        padding: 8.5rem 0 6.5rem;
        overflow: hidden;
    }
    .testi-watermark {
        position: absolute;
        top: 48%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-family: 'Playfair Display', serif;
        font-size: clamp(3.5rem, 11vw, 9rem);
        font-weight: 900;
        color: rgba(255, 249, 242, 0.05);
        white-space: nowrap;
        pointer-events: none;
        user-select: none;
    }
    .stat-pill-bar {
        background-color: #FFF9F2;
        border-radius: 999px;
        padding: 1.6rem 2.5rem;
        box-shadow: 0 22px 50px rgba(34, 15, 4, 0.16);
        margin-top: -3.2rem;
        position: relative;
        z-index: 5;
    }

    /* ============================================================
       2. RUANG PELANGGAN & GELEMBUNG CERITA ORGANIK
       ============================================================ */
    .my-activity-band {
        background: linear-gradient(145deg, #EFE0D1 0%, #F8EDE3 100%);
        border-radius: 44px;
        padding: 2.75rem;
    }
    .order-review-bubble {
        background-color: #FFF9F2;
        border-radius: 32px 32px 32px 8px;
        padding: 1.75rem;
        height: 100%;
        display: flex;
        flex-direction: column;
        box-shadow: 0 12px 28px rgba(74, 21, 3, 0.06);
        transition: transform 0.3s ease;
    }
    .order-review-bubble:hover {
        transform: translateY(-5px);
    }
    .public-speech-bubble {
        background-color: #FFF9F2;
        border-radius: 38px 38px 38px 6px;
        padding: 2.1rem;
        height: 100%;
        display: flex;
        flex-direction: column;
        box-shadow: 0 14px 32px rgba(74, 21, 3, 0.06);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .public-speech-bubble:hover {
        transform: translateY(-6px);
        box-shadow: 0 22px 44px rgba(123, 40, 9, 0.12);
    }
    .avatar-circle {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background: linear-gradient(135deg, #E4701D, #8D380F);
        color: #FFF9F2;
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        font-size: 1.2rem;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    .soft-input {
        background-color: #ffffff;
        border: 1.5px solid #E0CBB7;
        border-radius: 16px;
        padding: 12px 16px;
        color: #221608;
    }
    .soft-input:focus {
        border-color: #E4701D;
        box-shadow: 0 0 0 0.2rem rgba(228, 112, 29, 0.15);
    }
    .activity-pills .nav-link {
        border-radius: 999px;
        padding: 10px 24px;
        font-weight: 600;
        color: #4A3517;
        background-color: #FFF9F2;
    }
    .activity-pills .nav-link.active {
        background: linear-gradient(135deg, #E4701D, #B84214) !important;
        color: #FFF9F2 !important;
    }
    /* Rating Bintang Interaktif */
    .star-rating-group {
        display: inline-flex;
        flex-direction: row-reverse;
        gap: 6px;
    }
    .star-rating-group input {
        display: none;
    }
    .star-rating-group label {
        font-size: 1.9rem;
        color: #D6C3B0;
        cursor: pointer;
        transition: color 0.2s ease, transform 0.15s ease;
        margin-bottom: 0;
    }
    .star-rating-group label:hover,
    .star-rating-group label:hover ~ label,
    .star-rating-group input:checked ~ label {
        color: #F3A71C;
    }
    .star-rating-group label:hover {
        transform: scale(1.12);
    }
    @media (max-width: 767.98px) {
        .stat-pill-bar { border-radius: 30px; margin-top: -1.5rem; }
    }
</style>

<!-- HEADER EDITORIAL TERAKOTA PEKAT -->
<section class="testi-hero-bold text-center">
    <div class="container position-relative anim-testi-hero" style="z-index: 2;">
        <p class="text-uppercase fw-bold small mb-2" style="color: var(--ak-saffron); letter-spacing: 0.16em;">
            Ulasan Terverifikasi Alfi Kitchen
        </p>
        <h1 class="display-4 fw-bold mb-2" style="font-family: 'Playfair Display', serif; color: #FFF9F2;">
            Kesan dari <span style="color: var(--ak-saffron); font-style: italic;">Meja Acara</span> Mereka
        </h1>
        <p class="mx-auto mb-0 small" style="max-width: 560px; color: rgba(255, 249, 242, 0.84);">
            Setiap cerita ditulis langsung oleh pelanggan berdasarkan riwayat pesanan katering yang telah selesai kami layani.
        </p>
    </div>
</section>

<!-- PITA STATISTIK MELAYANG -->
<div class="container anim-testi-bar">
    <div class="stat-pill-bar">
        <div class="row text-center gy-3 align-items-center">
            <div class="col-md-4">
                <h2 class="fw-bold mb-0" style="font-family: 'Playfair Display', serif; color: var(--ak-crimson);">{{ $testimonials->count() }} Ulasan</h2>
                <p class="text-muted small mb-0">Dari Pesanan Selesai</p>
            </div>
            <div class="col-md-4">
                <h2 class="fw-bold mb-0" style="font-family: 'Playfair Display', serif; color: var(--ak-flame);">{{ number_format($averageRating, 1) }} / 5.0</h2>
                <p class="text-muted small mb-0">
                    @for($i = 1; $i <= 5; $i++)
                        <i class="bi bi-star-fill text-warning"></i>
                    @endfor
                    Rata-Rata Kepuasan
                </p>
            </div>
            <div class="col-md-4">
                <h2 class="fw-bold mb-0" style="font-family: 'Playfair Display', serif; color: var(--ak-crimson);">{{ $fiveStarCount }} Pelanggan</h2>
                <p class="text-muted small mb-0">Memberikan Penilaian Bintang 5</p>
            </div>
        </div>
    </div>
</div>

<!-- PANEL AKTIVITAS USER LOGIN: RIWAYAT PESANAN BELUM DIULAS & ULASAN SAYA -->
<section class="pt-5 pb-3" style="background-color: var(--ak-cream);">
    <div class="container">
        @auth
            <div class="my-activity-band">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
                    <div>
                        <p class="text-uppercase fw-bold small mb-1" style="color: var(--ak-terracotta); letter-spacing: 0.1em;">Ruang Pelanggan</p>
                        <h3 class="fw-bold mb-0" style="font-family: 'Playfair Display', serif; color: var(--ak-espresso);">Riwayat Pesanan &amp; Ulasan Anda</h3>
                    </div>

                    <ul class="nav nav-pills activity-pills gap-2" id="userTestiTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="unreviewed-tab" data-bs-toggle="tab" data-bs-target="#unreviewed-pane" type="button" role="tab">
                                Belum Diulas ({{ $unreviewedOrders->count() }})
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="myreviews-tab" data-bs-toggle="tab" data-bs-target="#myreviews-pane" type="button" role="tab">
                                Ulasan Saya ({{ $myTestimonials->count() }})
                            </button>
                        </li>
                    </ul>
                </div>

                <div class="tab-content" id="userTestiTabContent">
                    <!-- TAB 1: RIWAYAT PESANAN SELESAI YANG BELUM DIULAS -->
                    <div class="tab-pane fade show active" id="unreviewed-pane" role="tabpanel">
                        <div class="row g-4">
                            @forelse($unreviewedOrders as $order)
                                @php
                                    $menuList = $order->orderItems->pluck('menu.name')->filter()->unique()->implode(', ');
                                @endphp
                                <div class="col-md-6 col-lg-4">
                                    <div class="order-review-bubble">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span class="fw-bold small" style="color: var(--ak-crimson);">{{ $order->order_code }}</span>
                                            <span class="small text-muted">{{ \Carbon\Carbon::parse($order->delivery_date)->format('d M Y') }}</span>
                                        </div>

                                        <h6 class="fw-bold mb-2" style="font-family: 'Playfair Display', serif; color: var(--ak-espresso);">
                                            {{ $menuList ?: 'Paket Katering Alfi Kitchen' }}
                                        </h6>

                                        <ul class="list-unstyled small text-muted mb-3">
                                            @foreach($order->orderItems as $oi)
                                                <li>• {{ $oi->menu->name ?? 'Menu' }} ({{ $oi->quantity }} porsi)</li>
                                            @endforeach
                                        </ul>

                                        <div class="mt-auto pt-3 border-top d-flex justify-content-between align-items-center" style="border-color: #E0CBB7 !important;">
                                            <span class="small fw-semibold text-dark">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                                            <button type="button"
                                                    class="btn btn-sm rounded-pill px-4 py-2 fw-semibold text-white"
                                                    style="background: linear-gradient(135deg, #E4701D, #B84214);"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#createReviewModal{{ $order->id }}">
                                                Tulis Ulasan
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- MODAL CREATE ULASAN BERDASARKAN PESANAN INI -->
                                <div class="modal fade" id="createReviewModal{{ $order->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content border-0 rounded-4 p-2" style="background-color: #FDF7F1;">
                                            <div class="modal-header border-0">
                                                <div>
                                                    <small class="text-uppercase fw-bold d-block" style="color: var(--ak-crimson);">Pesanan {{ $order->order_code }}</small>
                                                    <h5 class="modal-title fw-bold" style="font-family: 'Playfair Display', serif;">Beri Penilaian Hidangan</h5>
                                                </div>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('testimonials.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="order_id" value="{{ $order->id }}">

                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label class="form-label small fw-semibold text-muted">Menu yang Dipesan (Otomatis)</label>
                                                        <input type="text" class="form-control soft-input bg-light" value="{{ $menuList }}" readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label small fw-semibold text-muted">Nama Tampilan Anda</label>
                                                        <input type="text" name="customer_name" value="{{ Auth::user()->name }}" class="form-control soft-input" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label small fw-semibold text-muted">Instansi / Keterangan Acara</label>
                                                        <input type="text" name="event_name" value="{{ $order->notes }}" class="form-control soft-input" placeholder="Misal: Rapat Kantor / Acara Keluarga" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label small fw-semibold text-muted d-block">Pilih Bintang Kepuasan</label>
                                                        <div class="star-rating-group">
                                                            @for($r = 5; $r >= 1; $r--)
                                                                <input type="radio" id="new-star-{{ $order->id }}-{{ $r }}" name="rating" value="{{ $r }}" {{ $r == 5 ? 'checked' : '' }} required>
                                                                <label for="new-star-{{ $order->id }}-{{ $r }}" title="{{ $r }} Bintang"><i class="bi bi-star-fill"></i></label>
                                                            @endfor
                                                        </div>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label class="form-label small fw-semibold text-muted">Ceritakan Pengalaman Anda</label>
                                                        <textarea name="comment" rows="3" class="form-control soft-input" placeholder="Bagaimana cita rasa, porsi, dan pelayanan Alfi Kitchen?" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer border-0">
                                                    <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn rounded-pill px-4 fw-semibold text-white" style="background-color: #E4701D;">Kirim Ulasan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12 text-center py-4 rounded-4" style="background-color: #FFF9F2;">
                                    <p class="text-muted mb-3">Semua pesanan selesai Anda sudah diulas, atau Anda belum memiliki pesanan berstatus selesai.</p>
                                    <a href="{{ route('menu') }}" class="btn rounded-pill px-4 py-2 fw-semibold text-white" style="background-color: #E4701D;">
                                        Jelajahi Menu Katering
                                    </a>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <!-- TAB 2: RIWAYAT TESTIMONI YANG SUDAH SAYA TULIS -->
                    <div class="tab-pane fade" id="myreviews-pane" role="tabpanel">
                        <div class="row g-4">
                            @forelse($myTestimonials as $myItem)
                                <div class="col-md-6 col-lg-4">
                                    <div class="order-review-bubble">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <div class="text-warning">
                                                @for($s = 1; $s <= 5; $s++)
                                                    <i class="bi {{ $s <= $myItem->rating ? 'bi-star-fill' : 'bi-star' }}"></i>
                                                @endfor
                                            </div>
                                            <small class="text-muted">{{ $myItem->order->order_code ?? 'Terverifikasi' }}</small>
                                        </div>

                                        <div class="small fw-bold mb-2" style="color: var(--ak-crimson);">{{ $myItem->menu_ordered }}</div>
                                        <p class="text-muted small fst-italic mb-3">"{{ $myItem->comment }}"</p>

                                        <div class="mt-auto pt-3 border-top d-flex justify-content-between align-items-center" style="border-color: #E0CBB7 !important;">
                                            <small class="text-muted">{{ $myItem->event_name }}</small>
                                            <div class="d-flex gap-1">
                                                <button type="button"
                                                        class="btn btn-sm btn-outline-secondary rounded-pill px-3"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editTestiModal{{ $myItem->id }}">
                                                    Edit
                                                </button>
                                                <form action="{{ route('testimonials.destroy', $myItem->id) }}" method="POST" onsubmit="return confirm('Hapus ulasan Anda ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill px-3">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12 text-center py-4 rounded-4" style="background-color: #FFF9F2;">
                                    <p class="text-muted mb-0">Anda belum menuliskan ulasan. Pilih tab <strong>Belum Diulas</strong> untuk memberikan penilaian pada pesanan Anda.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="my-activity-band text-center">
                <h4 class="fw-bold mb-2" style="font-family: 'Playfair Display', serif; color: var(--ak-espresso);">Pernah Memesan di Alfi Kitchen?</h4>
                <p class="text-muted small mb-3">Masuk ke akun Anda untuk melihat riwayat pesanan yang selesai dan memberikan ulasan.</p>
                <a href="{{ route('login') }}" class="btn rounded-pill px-4 py-2 fw-semibold text-white" style="background-color: #E4701D;">
                    Masuk ke Akun
                </a>
            </div>
        @endauth
    </div>
</section>

<!-- READ PUBLIK: DINDING GELEMBUNG TESTIMONI PELANGGAN -->
<section class="py-5" style="background-color: var(--ak-cream);">
    <div class="container pb-4">
        <div class="mb-4">
            <p class="text-uppercase fw-bold small mb-1" style="color: var(--ak-terracotta); letter-spacing: 0.12em;">Testimoni Terverifikasi</p>
            <h3 class="display-6 fw-bold" style="font-family: 'Playfair Display', serif; color: var(--ak-espresso);">Semua Ulasan Pelanggan</h3>
        </div>

        <div class="row g-4">
            @forelse($testimonials as $item)
                <div class="col-md-6 col-lg-4">
                    <div class="public-speech-bubble">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="text-warning fs-6">
                                @for($s = 1; $s <= 5; $s++)
                                    <i class="bi {{ $s <= $item->rating ? 'bi-star-fill' : 'bi-star' }}"></i>
                                @endfor
                            </div>
                            <span class="small fw-semibold" style="color: var(--ak-crimson);">{{ $item->menu_ordered }}</span>
                        </div>

                        <p class="text-muted small mb-4 fst-italic" style="line-height: 1.75;">
                            "{{ $item->comment }}"
                        </p>

                        <div class="d-flex align-items-center mt-auto pt-3 border-top" style="border-color: #E0CBB7 !important;">
                            <div class="avatar-circle me-3">
                                {{ strtoupper(substr($item->customer_name, 0, 1)) }}
                            </div>
                            <div class="me-auto">
                                <h6 class="fw-bold mb-0 text-dark">{{ $item->customer_name }}</h6>
                                <small class="text-muted">{{ $item->event_name }}</small>
                            </div>

                            @if(Auth::check() && Auth::id() === $item->user_id)
                                <div class="d-flex gap-1">
                                    <button type="button"
                                            class="btn btn-sm btn-outline-secondary rounded-pill px-3"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editTestiModal{{ $item->id }}">
                                        Edit
                                    </button>
                                    <form action="{{ route('testimonials.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus ulasan Anda ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill px-3">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- MODAL UPDATE (HANYA UNTUK PEMILIK TESTIMONI) -->
                @if(Auth::check() && Auth::id() === $item->user_id)
                    <div class="modal fade" id="editTestiModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border-0 rounded-4 p-2" style="background-color: #FDF7F1;">
                                <div class="modal-header border-0">
                                    <h5 class="modal-title fw-bold" style="font-family: 'Playfair Display', serif;">Edit Ulasan Anda</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{ route('testimonials.update', $item->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label small fw-semibold text-muted">Menu yang Dipesan</label>
                                            <input type="text" class="form-control soft-input bg-light" value="{{ $item->menu_ordered }}" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label small fw-semibold text-muted">Nama Anda</label>
                                            <input type="text" name="customer_name" value="{{ $item->customer_name }}" class="form-control soft-input" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label small fw-semibold text-muted">Instansi / Jenis Acara</label>
                                            <input type="text" name="event_name" value="{{ $item->event_name }}" class="form-control soft-input" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label small fw-semibold text-muted d-block">Penilaian Bintang</label>
                                            <div class="star-rating-group">
                                                @for($r = 5; $r >= 1; $r--)
                                                    <input type="radio" id="edit-star-{{ $item->id }}-{{ $r }}" name="rating" value="{{ $r }}" {{ $item->rating == $r ? 'checked' : '' }} required>
                                                    <label for="edit-star-{{ $item->id }}-{{ $r }}" title="{{ $r }} Bintang"><i class="bi bi-star-fill"></i></label>
                                                @endfor
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label small fw-semibold text-muted">Isi Ulasan</label>
                                            <textarea name="comment" rows="3" class="form-control soft-input" required>{{ $item->comment }}</textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer border-0">
                                        <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn rounded-pill px-4 fw-semibold text-white" style="background-color: #E4701D;">Simpan Perubahan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            @empty
                <div class="col-12 text-center py-4">
                    <p class="text-muted">Belum ada ulasan tersimpan.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection