@extends('layouts.main')

@section('content')
<div class="container my-3">

    <!-- 1. HERO SECTION -->
    <div class="p-4 p-md-5 rounded-5 mb-4 shadow-sm" style="background-color: #EFE8DC; border: 1px solid #E2D9C8;">
        <div class="row align-items-center gy-4">
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold mb-3" style="color: #231F20;">
                    Sajian Lezat Rumahan untuk Setiap Momen Spesial
                </h1>
                <p class="text-muted mb-4 fs-6">
                    Nikmati paket catering harian, nasi box, hingga prasmanan dengan bahan pilihan segar, higienis, dan resep kaya cita rasa.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="/menu" class="btn btn-brand-orange">Lihat Menu Catering</a>
                    <a href="https://wa.me/628xxxxxxxxxx" target="_blank" class="btn btn-outline-dark rounded-pill px-4 fw-semibold">
                        <i class="bi bi-whatsapp me-2 text-success"></i>Hubungi Kami
                    </a>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <img src="{{ asset('images/hero-food.jpg') }}"
                     class="img-fluid rounded-4 shadow"
                     style="max-height: 380px; width: 100%; object-fit: cover;"
                     onerror="this.src='https://images.unsplash.com/photo-1555396273-367ea4eb4db5?q=80&w=800'">
            </div>
        </div>
    </div>

    <!-- 2. BARIS KEUNGGULAN (PERBAIKAN: TEKS GELAP TAJAM & BISA DIBACA CLEAR) -->
    <div class="p-4 rounded-4 mb-4 text-center shadow-sm" style="background-color: #264653; border: 1px solid #1D353F;">
        <div class="row gy-3">
            <div class="col-md-3 col-6">
                <i class="bi bi-patch-check-fill fs-2" style="color: #E9C46A;"></i>
                <h6 class="fw-bold mt-2 mb-0 text-white">100% Halal</h6>
                <small style="color: #E2ECE9;">Terjamin kehalalannya</small>
            </div>
            <div class="col-md-3 col-6">
                <i class="bi bi-fire fs-2" style="color: #F4A261;"></i>
                <h6 class="fw-bold mt-2 mb-0 text-white">Selalu Segar</h6>
                <small style="color: #E2ECE9;">Dimasak saat dipesan</small>
            </div>
            <div class="col-md-3 col-6">
                <i class="bi bi-heart-fill fs-2" style="color: #E76F51;"></i>
                <h6 class="fw-bold mt-2 mb-0 text-white">Bumbu Otentik</h6>
                <small style="color: #E2ECE9;">Cita rasa rumahan</small>
            </div>
            <div class="col-md-3 col-6">
                <i class="bi bi-truck fs-2" style="color: #2A9D8F;"></i>
                <h6 class="fw-bold mt-2 mb-0 text-white">Tepat Waktu</h6>
                <small style="color: #E2ECE9;">Pengiriman aman</small>
            </div>
        </div>
    </div>

    <!-- 3. LAYANAN UTAMA (PERBAIKAN: KOTAK CATERING TERRACOTTA DENGAN TEKS PUTIH KONTRAS) -->
    <div class="p-4 p-md-5 rounded-5 mb-4 shadow-sm" style="background-color: #D9531E; color: #ffffff;">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-1 text-white">Layanan Utama Catering</h3>
                <p class="mb-0 text-white-50">Pilih jenis layanan yang sesuai dengan kebutuhan acara Anda</p>
            </div>
            <a href="/menu" class="btn btn-sm btn-light rounded-pill px-3 fw-semibold text-dark">Lihat Semua</a>
        </div>
        <div class="row g-3">
            <div class="col-md-4">
                <div class="p-4 bg-white rounded-4 shadow-sm text-dark h-100">
                    <span class="badge px-3 py-1 rounded-pill mb-2" style="background-color: #2A9D8F; color: #ffffff;">Praktis</span>
                    <h5 class="fw-bold mb-2" style="color: #264653;">Nasi Box</h5>
                    <p class="small text-muted mb-0">Solusi praktis dan higienis untuk acara kantor, rapat, dan syukuran.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 bg-white rounded-4 shadow-sm text-dark h-100">
                    <span class="badge px-3 py-1 rounded-pill mb-2" style="background-color: #E9C46A; color: #264653;">Favorit</span>
                    <h5 class="fw-bold mb-2" style="color: #264653;">Catering Harian</h5>
                    <p class="small text-muted mb-0">Menu sehat dan variatif yang berganti setiap hari untuk rumah/kantor.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 bg-white rounded-4 shadow-sm text-dark h-100">
                    <span class="badge px-3 py-1 rounded-pill mb-2" style="background-color: #2A9D8F; color: #ffffff;">Spesial Event</span>
                    <h5 class="fw-bold mb-2" style="color: #264653;">Prasmanan</h5>
                    <p class="small text-muted mb-0">Lengkap dengan peralatan penyajian dan pramugari profesional.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- 4. REKOMENDASI MENU FAVORIT -->
    <div class="p-4 p-md-5 rounded-5 mb-4 shadow-sm" style="background-color: #EFE8DC; border: 1px solid #E2D9C8;">
        <div class="text-center mb-4">
            <h3 class="fw-bold mb-1" style="color: #264653;">Rekomendasi Menu Favorit</h3>
            <p class="text-muted">Pilihan paket terpopuler yang paling banyak disukai pelanggan</p>
        </div>

        <div class="row g-4">
            <!-- Menu 1 -->
            <div class="col-md-4">
                <div class="card card-colorful h-100 overflow-hidden shadow-sm">
                    <img src="{{ asset('images/ayam-bakar.jpg') }}" class="card-img-top" style="height: 200px; object-fit: cover;" onerror="this.src='https://images.unsplash.com/photo-1598515214211-89d3c73ae83b?q=80&w=600'">
                    <div class="card-body p-4">
                        <span class="badge px-3 py-1 rounded-pill mb-2" style="background-color: #E9C46A; color: #264653;">Best Seller</span>
                        <h5 class="card-title fw-bold" style="color: #264653;">Nasi Box Ayam Bakar Madu</h5>
                        <p class="card-text text-muted small">Nasi wangi, ayam bakar bumbu madu, tahu, tempe, lalapan segar, & sambal.</p>
                        <div class="d-flex justify-content-between align-items-center mt-3 pt-2 border-top">
                            <span class="fs-5 fw-bold" style="color: #D9531E;">Rp 25.000 <small class="fs-6 text-muted fw-normal">/porsi</small></span>
                            <a href="https://wa.me/628xxxxxxxxxx?text=Halo%20Alfi%20Kitchen,%20saya%20ingin%20pesan%20Nasi%20Box%20Ayam%20Bakar%20Madu" target="_blank" class="btn btn-brand-orange rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                                <i class="bi bi-plus-lg"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Menu 2 -->
            <div class="col-md-4">
                <div class="card card-colorful h-100 overflow-hidden shadow-sm">
                    <img src="{{ asset('images/rendang.jpg') }}" class="card-img-top" style="height: 200px; object-fit: cover;" onerror="this.src='https://images.unsplash.com/photo-1541544741938-0af808871cc0?q=80&w=600'">
                    <div class="card-body p-4">
                        <span class="badge px-3 py-1 rounded-pill mb-2" style="background-color: #2A9D8F; color: #ffffff;">100% Sapi Pilihan</span>
                        <h5 class="card-title fw-bold" style="color: #264653;">Nasi Box Rendang Daging</h5>
                        <p class="card-text text-muted small">Nasi gurih, rendang daging empuk, daun singkong rebus, & sambal hijau.</p>
                        <div class="d-flex justify-content-between align-items-center mt-3 pt-2 border-top">
                            <span class="fs-5 fw-bold" style="color: #D9531E;">Rp 30.000 <small class="fs-6 text-muted fw-normal">/porsi</small></span>
                            <a href="https://wa.me/628xxxxxxxxxx?text=Halo%20Alfi%20Kitchen,%20saya%20ingin%20pesan%20Nasi%20Box%20Rendang" target="_blank" class="btn btn-brand-orange rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                                <i class="bi bi-plus-lg"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Menu 3 -->
            <div class="col-md-4">
                <div class="card card-colorful h-100 overflow-hidden shadow-sm">
                    <img src="{{ asset('images/snack-box.jpg') }}" class="card-img-top" style="height: 200px; object-fit: cover;" onerror="this.src='https://images.unsplash.com/photo-1509440159596-0249088772ff?q=80&w=600'">
                    <div class="card-body p-4">
                        <span class="badge px-3 py-1 rounded-pill mb-2" style="background-color: #E9C46A; color: #264653;">Acara Rapat</span>
                        <h5 class="card-title fw-bold" style="color: #264653;">Snack Box Premium</h5>
                        <p class="card-text text-muted small">3 Macam kue tradisional/modern pilihan + air mineral botol mini.</p>
                        <div class="d-flex justify-content-between align-items-center mt-3 pt-2 border-top">
                            <span class="fs-5 fw-bold" style="color: #D9531E;">Rp 15.000 <small class="fs-6 text-muted fw-normal">/box</small></span>
                            <a href="https://wa.me/628xxxxxxxxxx?text=Halo%20Alfi%20Kitchen,%20saya%20ingin%20pesan%20Snack%20Box%20Premium" target="_blank" class="btn btn-brand-orange rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                                <i class="bi bi-plus-lg"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection