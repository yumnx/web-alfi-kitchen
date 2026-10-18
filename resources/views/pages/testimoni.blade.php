@extends('layouts.main')

@section('content')

<!-- HEADER HALAMAN -->
<section class="py-5 bg-sage-light text-center">
    <div class="container py-3">
        <h1 class="fw-bold mb-2">Ulasan Pelanggan</h1>
        <p class="text-muted mb-0">Pengalaman nyata pelanggan yang telah menikmati hidangan Alfi Kitchen</p>
    </div>
</section>

<!-- STATISTIK RINGKAS -->
<section class="py-4 bg-white border-bottom">
    <div class="container">
        <div class="row text-center gy-3">
            <div class="col-md-4">
                <h2 class="fw-bold text-sage mb-0">500+</h2>
                <p class="text-muted small mb-0">Porsi Terlayani Setiap Minggu</p>
            </div>
            <div class="col-md-4">
                <h2 class="fw-bold text-sage mb-0">4.9 / 5.0</h2>
                <p class="text-muted small mb-0">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    (Rating Kepuasan)
                </p>
            </div>
            <div class="col-md-4">
                <h2 class="fw-bold text-sage mb-0">98%</h2>
                <p class="text-muted small mb-0">Pelanggan Melakukan Pesanan Ulang</p>
            </div>
        </div>
    </div>
</section>

<!-- DAFTAR TESTIMONI (GRID CARD) -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="row g-4">
            <!-- Testimoni 1 -->
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm p-4 rounded-4 bg-sage-light">
                    <div class="mb-3 text-warning fs-6">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <p class="text-muted small mb-4">"Nasi box ayam bakar madunya juara banget! Bumbunya meresap sampai ke dalam, ayamnya empuk, porsinya juga mengenyangkan untuk acara kantor kami."</p>
                    <div class="d-flex align-items-center mt-auto">
                        <div class="bg-white rounded-circle d-flex align-items-center justify-content-center text-sage fw-bold me-3 shadow-sm" style="width: 45px; height: 45px;">
                            S
                        </div>
                        <div>
                            <h6 class="fw-bold mb-0 text-dark">Siti Rahmawati</h6>
                            <small class="text-muted">HRD PT Mulia Sejahtera</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimoni 2 -->
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm p-4 rounded-4 bg-sage-light">
                    <div class="mb-3 text-warning fs-6">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <p class="text-muted small mb-4">"Sangat terbantu dengan catering harian Alfi Kitchen. Menunya bervariasi setiap hari jadi nggak bikin bosan, rasanya pas persis kayak masakan ibu di rumah."</p>
                    <div class="d-flex align-items-center mt-auto">
                        <div class="bg-white rounded-circle d-flex align-items-center justify-content-center text-sage fw-bold me-3 shadow-sm" style="width: 45px; height: 45px;">
                            B
                        </div>
                        <div>
                            <h6 class="fw-bold mb-0 text-dark">Budi Santoso</h6>
                            <small class="text-muted">Pelanggan Harian</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimoni 3 -->
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm p-4 rounded-4 bg-sage-light">
                    <div class="mb-3 text-warning fs-6">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <p class="text-muted small mb-4">"Pesan paket prasmanan untuk acara syukuran rumah baru. Pelayanannya sangat ramah, peralatan lengkap, dan tamunya banyak yang memuji rasa rendangnya."</p>
                    <div class="d-flex align-items-center mt-auto">
                        <div class="bg-white rounded-circle d-flex align-items-center justify-content-center text-sage fw-bold me-3 shadow-sm" style="width: 45px; height: 45px;">
                            D
                        </div>
                        <div>
                            <h6 class="fw-bold mb-0 text-dark">Dina Amanda</h6>
                            <small class="text-muted">Acara Keluarga</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- AJAKAN BERIKAN ULASAN -->
<section class="py-5 bg-white border-top text-center">
    <div class="container py-2">
        <h4 class="fw-bold mb-2">Pernah Menikmati Hidangan Alfi Kitchen?</h4>
        <p class="text-muted mb-4">Bagikan pengalaman Anda dan bantu kami untuk terus menyajikan pelayanan terbaik.</p>
        <a href="https://wa.me/628xxxxxxxxxx?text=Halo%20Alfi%20Kitchen,%20saya%20ingin%20memberikan%20ulasan/testimoni"
           target="_blank" class="btn btn-orange rounded-pill px-4 fw-semibold shadow-sm">
            <i class="bi bi-chat-heart me-2"></i>Kirim Testimoni via WhatsApp
        </a>
    </div>
</section>

@endsection