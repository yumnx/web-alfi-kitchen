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

    @keyframes slideUpOrganic {
        0% { opacity: 0; transform: translateY(35px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    @keyframes herbSway {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-12px) rotate(10deg); }
    }

    .anim-order-hero { opacity: 0; animation: slideUpOrganic 0.85s cubic-bezier(0.22, 1, 0.36, 1) 0.1s forwards; }
    .anim-order-left { opacity: 0; animation: slideUpOrganic 0.9s cubic-bezier(0.22, 1, 0.36, 1) 0.2s forwards; }
    .anim-order-right { opacity: 0; animation: slideUpOrganic 0.9s cubic-bezier(0.22, 1, 0.36, 1) 0.32s forwards; }

    /* ============================================================
       1. HERO TERAKOTA PEKAT (MENYATU DENGAN NAVBAR PUTIH)
       ============================================================ */
    .order-hero-bold {
        position: relative;
        background: radial-gradient(circle at 70% 42%, #B84214 0%, #7B2809 62%, #421203 100%);
        color: #FFF9F2;
        padding: 8.5rem 0 5.5rem;
        overflow: hidden;
    }
    .order-watermark {
        position: absolute;
        top: 50%;
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
    .floating-herb {
        position: absolute;
        pointer-events: none;
        animation: herbSway 4.8s ease-in-out infinite;
    }

    /* ============================================================
       2. FORM PEMESANAN & PANEL PEMBAYARAN ORGANIK
       ============================================================ */
    .order-body-band {
        background-color: var(--ak-cream);
        padding: 3.5rem 0 6rem;
    }
    .organic-form-blob {
        background-color: #FFF9F2;
        border-radius: 38px 38px 38px 10px;
        padding: 2.35rem;
        box-shadow: 0 16px 40px rgba(74, 21, 3, 0.06);
    }
    .menu-item-bubble {
        background-color: #F8EDE3;
        border-radius: 26px 26px 26px 6px;
        padding: 1.35rem;
        margin-bottom: 1rem;
        transition: transform 0.25s ease;
    }
    .menu-item-bubble:hover {
        transform: translateX(4px);
    }
    .editorial-input {
        background-color: #ffffff;
        border: 1.5px solid rgba(123, 40, 9, 0.22);
        border-radius: 16px;
        padding: 11px 16px;
        color: var(--ak-espresso);
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
    }
    .editorial-input:focus {
        border-color: var(--ak-flame);
        box-shadow: 0 0 0 0.2rem rgba(228, 112, 29, 0.16);
    }

    /* Panel Kanan: Ringkasan & Bukti Transfer Terakota Gelap */
    .payment-summary-blob {
        position: sticky;
        top: 96px;
        background: radial-gradient(circle at 85% 15%, #9E3710 0%, #6B2107 55%, #3D1002 100%);
        color: #FFF9F2;
        border-radius: 42px 12px 42px 42px;
        padding: 2.4rem;
        box-shadow: 0 24px 55px rgba(61, 16, 2, 0.28);
    }
    .glass-sub-pill {
        background: rgba(255, 249, 242, 0.1);
        backdrop-filter: blur(8px);
        border-radius: 22px;
        padding: 1.15rem 1.35rem;
    }
    .btn-submit-order {
        background: linear-gradient(135deg, #F3A71C 0%, #E4701D 100%);
        color: #1E1106;
        font-weight: 800;
        border: none;
        border-radius: 999px;
        padding: 15px 28px;
        box-shadow: 0 14px 30px rgba(0, 0, 0, 0.3);
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }
    .btn-submit-order:hover {
        transform: translateY(-3px);
        color: #1E1106;
        box-shadow: 0 18px 36px rgba(243, 167, 28, 0.38);
    }
</style>

<!-- HERO HEADER TERAKOTA PEKAT -->
<section class="order-hero-bold">
    <div class="order-watermark">PESAN SAJIAN</div>

    <svg class="floating-herb d-none d-md-block" style="top: 24%; right: 12%; width: 68px;" viewBox="0 0 64 64" fill="none">
        <path d="M10 52C26 48 48 30 54 10C34 16 16 38 10 52Z" fill="#6BBF59"/>
        <path d="M12 50L50 14" stroke="#3D7A31" stroke-width="2.5" stroke-linecap="round"/>
    </svg>

    <div class="container position-relative anim-order-hero" style="z-index: 2;">
        <p class="text-uppercase fw-bold small mb-2" style="color: var(--ak-saffron); letter-spacing: 0.16em;">
            Formulir Pemesanan Katering
        </p>
        <h1 class="display-4 fw-bold mb-2" style="font-family: 'Playfair Display', serif; color: #FFF9F2;">
            Pesan Sajian untuk <span style="color: var(--ak-saffron); font-style: italic;">Acaramu</span>
        </h1>
        <p class="small mb-0" style="max-width: 580px; color: rgba(255, 249, 242, 0.84);">
            Pilih paket hidangan favorit, tentukan waktu pengiriman, dan unggah bukti transfer agar pesanan langsung dijadwalkan oleh dapur Ibu Alfi.
        </p>
    </div>
</section>

<!-- PEMISAH GELOMBANG ORGANIK -->
<div style="background-color: #421203; line-height: 0; margin-top: -2px;">
    <svg viewBox="0 0 1440 80" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="width: 100%; height: 60px;">
        <path d="M0,25 C380,90 1060,-15 1440,45 L1440,80 L0,80 Z" fill="#F8EDE3"/>
    </svg>
</div>

<!-- FORM PEMESANAN -->
<section class="order-body-band">
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger border-0 rounded-4 mb-4 shadow-sm">
                <ul class="mb-0 small">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">

            <div class="row g-4 align-items-start">
                <!-- KOLOM KIRI: PILIHAN MENU & JADWAL -->
                <div class="col-lg-7 anim-order-left">
                    <!-- Bagian 1: Pilihan Menu -->
                    <div class="organic-form-blob mb-4">
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
                            <div>
                                <span class="small text-uppercase fw-bold" style="color: var(--ak-terracotta); letter-spacing: 0.1em;">Langkah 01</span>
                                <h4 class="fw-bold mb-0" style="font-family: 'Playfair Display', serif; color: var(--ak-espresso);">
                                    Pilihan Menu Katering
                                </h4>
                            </div>
                            <button type="button" id="add-item-btn" class="btn btn-sm rounded-pill px-4 py-2 fw-bold text-white" style="background: linear-gradient(135deg, #E4701D, #B84214);">
                                <i class="bi bi-plus-lg me-1"></i>Tambah Menu
                            </button>
                        </div>

                        <div id="order-items-container">
                            <div class="menu-item-bubble order-item-row">
                                <div class="row g-3 align-items-end">
                                    <div class="col-md-7">
                                        <label class="form-label small fw-semibold text-muted">Pilih Hidangan</label>
                                        <select name="items[0][menu_id]" class="form-select editorial-input menu-select" required>
                                            <option value="" data-price="0">-- Pilih Paket Menu --</option>
                                            @foreach($menus as $m)
                                                <option value="{{ $m->id }}"
                                                        data-price="{{ $m->price }}"
                                                        {{ (old('items.0.menu_id', $selectedMenuId) == $m->id) ? 'selected' : '' }}>
                                                    {{ $m->name }} — Rp {{ number_format($m->price, 0, ',', '.') }}/porsi
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label small fw-semibold text-muted">Jumlah Porsi</label>
                                        <input type="number" name="items[0][quantity]" value="{{ old('items.0.quantity', 10) }}" min="1" class="form-control editorial-input qty-input" required>
                                    </div>
                                    <div class="col-md-1 text-end">
                                        <button type="button" class="btn btn-outline-danger rounded-circle remove-item-btn" style="width: 40px; height: 40px;" title="Hapus item" disabled>
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="items[0][item_notes]" value="{{ old('items.0.item_notes') }}" class="form-control editorial-input form-control-sm" placeholder="Catatan khusus menu ini (opsional, misal: sambal dipisah)">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bagian 2: Jadwal & Alamat -->
                    <div class="organic-form-blob">
                        <div class="mb-4">
                            <span class="small text-uppercase fw-bold" style="color: var(--ak-terracotta); letter-spacing: 0.1em;">Langkah 02</span>
                            <h4 class="fw-bold mb-0" style="font-family: 'Playfair Display', serif; color: var(--ak-espresso);">
                                Jadwal &amp; Lokasi Pengiriman
                            </h4>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold text-muted">Tanggal Pengiriman</label>
                                <input type="date" name="delivery_date" value="{{ old('delivery_date', date('Y-m-d', strtotime('+2 days'))) }}" min="{{ date('Y-m-d') }}" class="form-control editorial-input" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold text-muted">Jam Tiba di Lokasi</label>
                                <input type="time" name="delivery_time" value="{{ old('delivery_time', '11:30') }}" class="form-control editorial-input" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-semibold text-muted">Alamat Lengkap Pengiriman</label>
                                <textarea name="delivery_address" rows="3" class="form-control editorial-input" placeholder="Tuliskan nama jalan, nomor rumah/gedung, patokan, dan kecamatan..." required>{{ old('delivery_address') }}</textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-semibold text-muted">Catatan Tambahan Acara (Opsional)</label>
                                <textarea name="notes" rows="2" class="form-control editorial-input" placeholder="Misal: Acara rapat kantor lantai 3, hubungi resepsionis...">{{ old('notes') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- KOLOM KANAN: RINGKASAN & UPLOAD BUKTI TRANSFER -->
                <div class="col-lg-5 anim-order-right">
                    <div class="payment-summary-blob">
                        <span class="small text-uppercase fw-bold d-block mb-1" style="color: var(--ak-saffron); letter-spacing: 0.12em;">
                            Langkah 03
                        </span>
                        <h4 class="fw-bold mb-4" style="font-family: 'Playfair Display', serif;">
                            Ringkasan &amp; Bukti Transfer
                        </h4>

                        <div class="glass-sub-pill mb-3">
                            <span class="small d-block opacity-75 mb-1">Total Estimasi Pembayaran</span>
                            <div class="display-6 fw-bold" style="color: var(--ak-saffron);" id="grand-total-display">Rp 0</div>
                        </div>

                        <div class="glass-sub-pill mb-4">
                            <div class="small fw-bold mb-2" style="color: var(--ak-saffron);">Rekening Tujuan Transfer:</div>
                            <div class="small mb-1"><strong>BCA:</strong> 1234-567-890 a.n. Alfi Kitchen</div>
                            <div class="small mb-0"><strong>Mandiri:</strong> 987-000-123456 a.n. Alfi Kitchen</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Metode Pembayaran</label>
                            <select name="payment_method" class="form-select editorial-input" required>
                                <option value="Transfer BCA" {{ old('payment_method') == 'Transfer BCA' ? 'selected' : '' }}>Transfer Bank BCA</option>
                                <option value="Transfer Mandiri" {{ old('payment_method') == 'Transfer Mandiri' ? 'selected' : '' }}>Transfer Bank Mandiri</option>
                                <option value="QRIS Alfi Kitchen" {{ old('payment_method') == 'QRIS Alfi Kitchen' ? 'selected' : '' }}>QRIS Alfi Kitchen</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-semibold">Unggah Bukti Transfer (JPG/PNG, Maks. 2MB) *</label>
                            <input type="file" name="payment_proof" accept="image/png,image/jpeg,image/jpg" class="form-control editorial-input" required>
                            <small class="d-block mt-2 opacity-75" style="font-size: 0.78rem;">
                                Pesanan otomatis masuk jadwal verifikasi setelah bukti transfer dilampirkan.
                            </small>
                        </div>

                        <button type="submit" class="btn btn-submit-order w-100">
                            Kirim Pesanan Sekarang <i class="bi bi-check2-circle ms-2"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const container = document.getElementById('order-items-container');
    const addBtn = document.getElementById('add-item-btn');
    const totalDisplay = document.getElementById('grand-total-display');
    let itemIndex = 1;

    function formatRupiah(num) {
        return 'Rp ' + num.toLocaleString('id-ID');
    }

    function calculateTotal() {
        let total = 0;
        document.querySelectorAll('.order-item-row').forEach(row => {
            const select = row.querySelector('.menu-select');
            const qtyInput = row.querySelector('.qty-input');
            const selectedOption = select.options[select.selectedIndex];
            const price = parseFloat(selectedOption?.dataset?.price || 0);
            const qty = parseInt(qtyInput.value || 0);
            total += price * qty;
        });
        totalDisplay.textContent = formatRupiah(total);
    }

    container.addEventListener('change', calculateTotal);
    container.addEventListener('input', calculateTotal);

    addBtn.addEventListener('click', function () {
        const firstRow = container.querySelector('.order-item-row');
        const newRow = firstRow.cloneNode(true);

        newRow.querySelector('.menu-select').name = `items[${itemIndex}][menu_id]`;
        newRow.querySelector('.menu-select').selectedIndex = 0;

        newRow.querySelector('.qty-input').name = `items[${itemIndex}][quantity]`;
        newRow.querySelector('.qty-input').value = 10;

        const notesInput = newRow.querySelector('input[type="text"]');
        notesInput.name = `items[${itemIndex}][item_notes]`;
        notesInput.value = '';

        const removeBtn = newRow.querySelector('.remove-item-btn');
        removeBtn.disabled = false;
        removeBtn.addEventListener('click', function () {
            newRow.remove();
            calculateTotal();
        });

        container.appendChild(newRow);
        itemIndex++;
        calculateTotal();
    });

    calculateTotal();
});
</script>
@endsection