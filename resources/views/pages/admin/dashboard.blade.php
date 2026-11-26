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

    .admin-hero-bold {
        position: relative;
        background: radial-gradient(circle at 72% 40%, #B84214 0%, #7B2809 62%, #3D1002 100%);
        color: #FFF9F2;
        padding: 8.5rem 0 6.5rem;
        overflow: hidden;
    }
    .admin-watermark {
        position: absolute;
        top: 48%;
        right: 4%;
        transform: translateY(-50%);
        font-family: 'Playfair Display', serif;
        font-size: clamp(3.5rem, 10vw, 8.5rem);
        font-weight: 900;
        color: rgba(255, 249, 242, 0.05);
        white-space: nowrap;
        pointer-events: none;
        user-select: none;
    }
    .admin-kpi-pill {
        background-color: #FFF9F2;
        border-radius: 38px;
        padding: 1.75rem 2.25rem;
        box-shadow: 0 22px 50px rgba(34, 15, 4, 0.16);
        margin-top: -3.2rem;
        position: relative;
        z-index: 5;
    }
    .admin-tabs .nav-link {
        border-radius: 999px;
        padding: 11px 28px;
        font-weight: 700;
        color: var(--ak-espresso);
        background-color: rgba(123, 40, 9, 0.1);
    }
    .admin-tabs .nav-link.active {
        background: linear-gradient(135deg, #E4701D 0%, #7B2809 100%) !important;
        color: #FFF9F2 !important;
        box-shadow: 0 10px 24px rgba(123, 40, 9, 0.28);
    }
    .admin-order-bubble {
        background-color: #FFF9F2;
        border-radius: 36px 36px 36px 8px;
        padding: 1.85rem;
        box-shadow: 0 14px 34px rgba(74, 21, 3, 0.06);
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    .admin-menu-disc {
        width: 68px;
        height: 68px;
        border-radius: 50%;
        object-fit: cover;
        flex-shrink: 0;
        box-shadow: 0 6px 16px rgba(74, 21, 3, 0.18);
    }
    .soft-admin-input {
        background-color: #ffffff;
        border: 1.5px solid rgba(123, 40, 9, 0.22);
        border-radius: 14px;
        padding: 9px 14px;
        color: var(--ak-espresso);
    }
</style>

<!-- HERO HEADER ADMIN -->
<section class="admin-hero-bold">
    <div class="admin-watermark">DAPUR ADMIN</div>
    <div class="container position-relative" style="z-index: 2;">
        <p class="text-uppercase fw-bold small mb-2" style="color: var(--ak-saffron); letter-spacing: 0.16em;">
            Pusat Kendali Operasional
        </p>
        <h1 class="display-4 fw-bold mb-2" style="font-family: 'Playfair Display', serif; color: #FFF9F2;">
            Dashboard <span style="color: var(--ak-saffron); font-style: italic;">Dapur</span> Alfi Kitchen
        </h1>
        <p class="small mb-0" style="max-width: 580px; color: rgba(255, 249, 242, 0.84);">
            Verifikasi bukti transfer pelanggan, perbarui progres pesanan hingga selesai, dan kelola katalog hidangan katering.
        </p>
    </div>
</section>

<!-- KPI RINGKAS MELAYANG -->
<div class="container">
    <div class="admin-kpi-pill">
        <div class="row text-center gy-3 align-items-center">
            <div class="col-6 col-lg-3">
                <small class="text-muted d-block">Pendapatan Lunas</small>
                <h3 class="fw-bold mb-0" style="font-family: 'Playfair Display', serif; color: var(--ak-crimson);">
                    Rp {{ number_format($totalRevenue, 0, ',', '.') }}
                </h3>
            </div>
            <div class="col-6 col-lg-3">
                <small class="text-muted d-block">Menunggu Konfirmasi</small>
                <h3 class="fw-bold mb-0" style="font-family: 'Playfair Display', serif; color: var(--ak-flame);">
                    {{ $pendingOrdersCount }} Pesanan
                </h3>
            </div>
            <div class="col-6 col-lg-3">
                <small class="text-muted d-block">Sedang Diproses / Selesai</small>
                <h3 class="fw-bold mb-0" style="font-family: 'Playfair Display', serif; color: #2E7D32;">
                    {{ $processingOrdersCount }} / {{ $completedOrdersCount }}
                </h3>
            </div>
            <div class="col-6 col-lg-3">
                <small class="text-muted d-block">Katalog Menu Aktif</small>
                <h3 class="fw-bold mb-0" style="font-family: 'Playfair Display', serif; color: var(--ak-espresso);">
                    {{ $menus->count() }} Sajian
                </h3>
            </div>
        </div>
    </div>
</div>

<!-- KONTEN UTAMA DASHBOARD -->
<section class="py-5" style="background-color: var(--ak-cream);">
    <div class="container pb-4">
        <ul class="nav nav-pills admin-tabs gap-2 mb-4" id="adminMainTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="orders-tab" data-bs-toggle="tab" data-bs-target="#orders-pane" type="button" role="tab">
                    Kelola Pesanan ({{ $orders->count() }})
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="menus-tab" data-bs-toggle="tab" data-bs-target="#menus-pane" type="button" role="tab">
                    Kelola Katalog Menu ({{ $menus->count() }})
                </button>
            </li>
        </ul>

        <div class="tab-content" id="adminMainTabContent">
            <!-- =========================================================
                 TAB 1: KELOLA PESANAN & VERIFIKASI BUKTI TRANSFER
                 ========================================================= -->
            <div class="tab-pane fade show active" id="orders-pane" role="tabpanel">
                <div class="row g-4">
                    @forelse($orders as $order)
                        @php
                            $latestPay = $order->payments->first();
                        @endphp
                        <div class="col-lg-6">
                            <div class="admin-order-bubble">
                                <div class="d-flex justify-content-between align-items-start gap-2 mb-3">
                                    <div>
                                        <span class="fw-bold fs-5 d-block" style="font-family: 'Playfair Display', serif; color: var(--ak-crimson);">
                                            {{ $order->order_code }}
                                        </span>
                                        <small class="fw-semibold text-dark d-block">{{ $order->user->name ?? 'Pelanggan' }} ({{ $order->user->email ?? '-' }})</small>
                                        <small class="text-muted">Kirim: {{ \Carbon\Carbon::parse($order->delivery_date)->format('d M Y') }} • {{ $order->delivery_time }} WIB</small>
                                    </div>
                                    <div class="text-end">
                                        <strong class="fs-5 d-block" style="color: var(--ak-espresso);">Rp {{ number_format($order->total_price, 0, ',', '.') }}</strong>
                                        @if($latestPay && $latestPay->payment_proof)
                                            <button type="button"
                                                    class="btn btn-sm rounded-pill px-3 mt-1 fw-semibold"
                                                    style="background-color: #F8EDE3; color: var(--ak-crimson);"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#proofModal{{ $order->id }}">
                                                <i class="bi bi-image me-1"></i>Bukti Transfer
                                            </button>
                                        @endif
                                    </div>
                                </div>

                                <!-- Rincian Menu -->
                                <div class="p-3 rounded-4 mb-3" style="background-color: #F8EDE3;">
                                    @foreach($order->orderItems as $oi)
                                        <div class="d-flex justify-content-between small mb-1">
                                            <span>• <strong>{{ $oi->menu->name ?? 'Menu' }}</strong> ({{ $oi->quantity }} porsi)</span>
                                            <span>Rp {{ number_format($oi->subtotal, 0, ',', '.') }}</span>
                                        </div>
                                    @endforeach
                                    <div class="small text-muted mt-2 pt-2 border-top" style="border-color: rgba(123,40,9,0.15) !important;">
                                        <i class="bi bi-geo-alt-fill me-1" style="color: var(--ak-flame);"></i>{{ $order->delivery_address }}
                                    </div>
                                </div>

                                <!-- Form Update Status Pesanan & Pembayaran -->
                                <form action="{{ route('admin.orders.status', $order->id) }}" method="POST" class="mt-auto">
                                    @csrf
                                    @method('PUT')
                                    <div class="row g-2 align-items-end">
                                        <div class="col-sm-5">
                                            <label class="small fw-semibold text-muted mb-1">Status Pesanan</label>
                                            <select name="status" class="form-select form-select-sm soft-admin-input">
                                                <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Menunggu Konfirmasi</option>
                                                <option value="processing" {{ in_array($order->status, ['processing', 'confirmed']) ? 'selected' : '' }}>Sedang Diproses</option>
                                                <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Selesai (Bisa Diulas)</option>
                                                <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Dibatalkan</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="small fw-semibold text-muted mb-1">Pembayaran</label>
                                            <select name="payment_status" class="form-select form-select-sm soft-admin-input">
                                                <option value="pending" {{ $order->payment_status === 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="paid" {{ $order->payment_status === 'paid' ? 'selected' : '' }}>Lunas (Paid)</option>
                                                <option value="rejected" {{ $order->payment_status === 'rejected' ? 'selected' : '' }}>Ditolak</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <button type="submit" class="btn btn-sm w-100 rounded-pill py-2 fw-bold text-white" style="background: linear-gradient(135deg, #E4701D, #7B2809);">
                                                Simpan
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- MODAL PREVIEW BUKTI TRANSFER -->
                        @if($latestPay && $latestPay->payment_proof)
                            <div class="modal fade" id="proofModal{{ $order->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content border-0 rounded-4" style="background-color: #FFF9F2;">
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title fw-bold" style="font-family: 'Playfair Display', serif;">
                                                Bukti Transfer — {{ $order->order_code }}
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <p class="small text-muted mb-2">Metode: <strong>{{ $latestPay->payment_method }}</strong> • Nominal: <strong>Rp {{ number_format($latestPay->amount, 0, ',', '.') }}</strong></p>
                                            <img src="{{ asset('storage/' . $latestPay->payment_proof) }}"
                                                 alt="Bukti Transfer"
                                                 class="img-fluid rounded-4 shadow-sm"
                                                 onerror="this.src='https://images.unsplash.com/photo-1554224155-6726b3ff858f?q=80&w=600'">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @empty
                        <div class="col-12 text-center py-5">
                            <p class="text-muted">Belum ada pesanan masuk.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- =========================================================
                 TAB 2: CRUD KATALOG MENU KATERING
                 ========================================================= -->
            <div class="tab-pane fade" id="menus-pane" role="tabpanel">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold mb-0" style="font-family: 'Playfair Display', serif; color: var(--ak-espresso);">
                        Daftar Menu Katering
                    </h4>
                    <button type="button"
                            class="btn rounded-pill px-4 py-2 fw-bold text-white shadow-sm"
                            style="background: linear-gradient(135deg, #E4701D, #7B2809);"
                            data-bs-toggle="modal"
                            data-bs-target="#createMenuModal">
                        <i class="bi bi-plus-lg me-1"></i>Tambah Menu Baru
                    </button>
                </div>

                <div class="row g-4">
                    @foreach($menus as $menu)
                        <div class="col-md-6">
                            <div class="admin-order-bubble flex-row align-items-center gap-3">
                                <img src="{{ $menu->image }}"
                                     alt="{{ $menu->name }}"
                                     class="admin-menu-disc"
                                     onerror="this.src='https://images.unsplash.com/photo-1598515214211-89d3c73ae83b?q=80&w=600'">
                                <div class="me-auto">
                                    <span class="small fw-bold text-uppercase" style="color: var(--ak-terracotta); font-size: 0.72rem;">
                                        {{ $menu->category->name ?? 'Kategori' }} • {{ $menu->is_available ? 'Tersedia' : 'Habis' }}
                                    </span>
                                    <h6 class="fw-bold mb-1" style="font-family: 'Playfair Display', serif;">{{ $menu->name }}</h6>
                                    <div class="fw-bold small" style="color: var(--ak-crimson);">
                                        Rp {{ number_format($menu->price, 0, ',', '.') }} <span class="text-muted fw-normal">(Min. {{ $menu->min_order }} porsi)</span>
                                    </div>
                                </div>
                                <div class="d-flex flex-column gap-1">
                                    <button type="button"
                                            class="btn btn-sm btn-outline-secondary rounded-pill px-3"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editMenuModal{{ $menu->id }}">
                                        Edit
                                    </button>
                                    <form action="{{ route('admin.menus.destroy', $menu->id) }}" method="POST" onsubmit="return confirm('Hapus menu {{ $menu->name }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill px-3 w-100">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- MODAL EDIT MENU -->
                        <div class="modal fade" id="editMenuModal{{ $menu->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border-0 rounded-4 p-2" style="background-color: #FFF9F2;">
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title fw-bold" style="font-family: 'Playfair Display', serif;">Edit Menu</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <form action="{{ route('admin.menus.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label small fw-semibold">Kategori</label>
                                                <select name="category_id" class="form-select soft-admin-input" required>
                                                    @foreach($categories as $cat)
                                                        <option value="{{ $cat->id }}" {{ $menu->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label small fw-semibold">Nama Hidangan</label>
                                                <input type="text" name="name" value="{{ $menu->name }}" class="form-control soft-admin-input" required>
                                            </div>
                                            <div class="row g-2 mb-3">
                                                <div class="col-6">
                                                    <label class="form-label small fw-semibold">Harga / Porsi (Rp)</label>
                                                    <input type="number" name="price" value="{{ $menu->price }}" class="form-control soft-admin-input" required>
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label small fw-semibold">Minimal Porsi</label>
                                                    <input type="number" name="min_order" value="{{ $menu->min_order }}" class="form-control soft-admin-input" required>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label small fw-semibold">Deskripsi Lauk</label>
                                                <textarea name="description" rows="2" class="form-control soft-admin-input" required>{{ $menu->description }}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label small fw-semibold">Ganti Foto (Upload File atau Isi URL)</label>
                                                <input type="file" name="image_file" accept="image/*" class="form-control soft-admin-input mb-2">
                                                <input type="url" name="image_url" placeholder="Atau tempel URL gambar..." class="form-control soft-admin-input">
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="is_available" id="avail{{ $menu->id }}" {{ $menu->is_available ? 'checked' : '' }}>
                                                <label class="form-check-label small fw-semibold" for="avail{{ $menu->id }}">Menu Tersedia untuk Dipesan</label>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn rounded-pill px-4 fw-bold text-white" style="background-color: #E4701D;">Simpan Perubahan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- MODAL TAMBAH MENU BARU -->
<div class="modal fade" id="createMenuModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 p-2" style="background-color: #FFF9F2;">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold" style="font-family: 'Playfair Display', serif;">Tambah Menu Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.menus.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Kategori</label>
                        <select name="category_id" class="form-select soft-admin-input" required>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Nama Hidangan</label>
                        <input type="text" name="name" class="form-control soft-admin-input" placeholder="Misal: Nasi Box Ayam Bakar Madu" required>
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label class="form-label small fw-semibold">Harga / Porsi (Rp)</label>
                            <input type="number" name="price" value="28000" class="form-control soft-admin-input" required>
                        </div>
                        <div class="col-6">
                            <label class="form-label small fw-semibold">Minimal Porsi</label>
                            <input type="number" name="min_order" value="10" class="form-control soft-admin-input" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Deskripsi Lauk</label>
                        <textarea name="description" rows="2" class="form-control soft-admin-input" placeholder="Rincian lauk, sayur, sambal, dan kerupuk..." required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Foto Hidangan (Upload File atau URL)</label>
                        <input type="file" name="image_file" accept="image/*" class="form-control soft-admin-input mb-2">
                        <input type="url" name="image_url" placeholder="Atau tempel URL gambar..." class="form-control soft-admin-input">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="is_available" id="availNew" checked>
                        <label class="form-check-label small fw-semibold" for="availNew">Langsung Tampilkan di Katalog</label>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn rounded-pill px-4 fw-bold text-white" style="background-color: #E4701D;">Simpan Menu</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection