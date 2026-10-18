@extends('layouts.main')

@section('content')

<!-- HEADER HALAMAN -->
<section class="py-5 bg-sage-light text-center">
    <div class="container py-3">
        <h1 class="fw-bold mb-2">Daftar Menu Catering</h1>
        <p class="text-muted mb-0">Pilihan hidangan lezat, higienis, dan pas untuk segala suasana</p>
    </div>
</section>

<!-- DAFTAR MENU & FILTER TAB -->
<section class="py-5 bg-white">
    <div class="container">

        <!-- NAV TAB FILTER KATEGORI -->
        <ul class="nav nav-pills justify-content-center mb-5 gap-2" id="menuTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active rounded-pill px-4 fw-medium" id="all-tab" data-bs-toggle="tab" data-bs-target="#all-menu" type="button" role="tab">Semua Menu</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-pill px-4 fw-medium" id="nasibox-tab" data-bs-toggle="tab" data-bs-target="#nasibox-menu" type="button" role="tab">Nasi Box</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-pill px-4 fw-medium" id="harian-tab" data-bs-toggle="tab" data-bs-target="#harian-menu" type="button" role="tab">Catering Harian</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-pill px-4 fw-medium" id="prasmanan-tab" data-bs-toggle="tab" data-bs-target="#prasmanan-menu" type="button" role="tab">Prasmanan</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-pill px-4 fw-medium" id="snack-tab" data-bs-toggle="tab" data-bs-target="#snack-menu" type="button" role="tab">Snack Box</button>
            </li>
        </ul>

        <!-- KONTEN TAB MENU -->
        <div class="tab-content" id="menuTabContent">

            <!-- TAB 1: SEMUA MENU -->
            <div class="tab-pane fade show active" id="all-menu" role="tabpanel">
                <div class="row g-4">
                    <!-- Item 1 -->
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                            <img src="{{ asset('images/ayam-bakar.jpg') }}" class="card-img-top" alt="Nasi Box Ayam Bakar" style="height: 200px; object-fit: cover;" onerror="this.src='https://images.unsplash.com/photo-1598515214211-89d3c73ae83b?q=80&w=600'">
                            <div class="card-body p-4">
                                <span class="badge bg-sage-light text-sage mb-2">Nasi Box</span>
                                <h5 class="card-title fw-bold">Ayam Bakar Madu</h5>
                                <p class="card-text text-muted small">Nasi wangi, ayam bakar bumbu madu, tahu, tempe, lalapan segar, & sambal bajak.</p>
                                <div class="d-flex justify-content-between align-items-center mt-3 pt-2 border-top">
                                    <span class="fs-5 fw-bold text-sage">Rp 25.000 <small class="fs-6 text-muted fw-normal">/porsi</small></span>
                                    <a href="https://wa.me/628xxxxxxxxxx?text=Halo%20Alfi%20Kitchen,%20saya%20ingin%20pesan%20Nasi%20Box%20Ayam%20Bakar%20Madu" target="_blank" class="btn btn-orange rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                                        <i class="bi bi-plus-lg"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                            <img src="{{ asset('images/rendang.jpg') }}" class="card-img-top" alt="Nasi Box Rendang" style="height: 200px; object-fit: cover;" onerror="this.src='https://images.unsplash.com/photo-1541544741938-0af808871cc0?q=80&w=600'">
                            <div class="card-body p-4">
                                <span class="badge bg-sage-light text-sage mb-2">Nasi Box</span>
                                <h5 class="card-title fw-bold">Rendang Daging Sapi</h5>
                                <p class="card-text text-muted small">Nasi gurih, rendang daging empuk, daun singkong rebus, & sambal hijau.</p>
                                <div class="d-flex justify-content-between align-items-center mt-3 pt-2 border-top">
                                    <span class="fs-5 fw-bold text-sage">Rp 30.000 <small class="fs-6 text-muted fw-normal">/porsi</small></span>
                                    <a href="https://wa.me/628xxxxxxxxxx?text=Halo%20Alfi%20Kitchen,%20saya%20ingin%20pesan%20Nasi%20Box%20Rendang" target="_blank" class="btn btn-orange rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                                        <i class="bi bi-plus-lg"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                            <img src="{{ asset('images/harian.jpg') }}" class="card-img-top" alt="Catering Harian" style="height: 200px; object-fit: cover;" onerror="this.src='https://images.unsplash.com/photo-1512621776951-a57141f2eefd?q=80&w=600'">
                            <div class="card-body p-4">
                                <span class="badge bg-sage-light text-sage mb-2">Harian</span>
                                <h5 class="card-title fw-bold">Paket Sehat Mingguan</h5>
                                <p class="card-text text-muted small">Menu berganti tiap hari (Lauk Utama, Lauk Pendamping, Sayur, & Buah/Snack).</p>
                                <div class="d-flex justify-content-between align-items-center mt-3 pt-2 border-top">
                                    <span class="fs-5 fw-bold text-sage">Rp 28.000 <small class="fs-6 text-muted fw-normal">/porsi</small></span>
                                    <a href="https://wa.me/628xxxxxxxxxx?text=Halo%20Alfi%20Kitchen,%20saya%20ingin%20pesan%20Paket%20Sehat%20Mingguan" target="_blank" class="btn btn-orange rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                                        <i class="bi bi-plus-lg"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item 4 -->
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                            <img src="{{ asset('images/prasmanan.jpg') }}" class="card-img-top" alt="Paket Prasmanan" style="height: 200px; object-fit: cover;" onerror="this.src='https://images.unsplash.com/photo-1555244162-803834f70033?q=80&w=600'">
                            <div class="card-body p-4">
                                <span class="badge bg-sage-light text-sage mb-2">Prasmanan</span>
                                <h5 class="card-title fw-bold">Paket Prasmanan Standard</h5>
                                <p class="card-text text-muted small">5 Jenis Lauk, Sop, Nasi Putih, Kerupuk, Es Buah, & Air Mineral.</p>
                                <div class="d-flex justify-content-between align-items-center mt-3 pt-2 border-top">
                                    <span class="fs-5 fw-bold text-sage">Rp 50.000 <small class="fs-6 text-muted fw-normal">/porsi</small></span>
                                    <a href="https://wa.me/628xxxxxxxxxx?text=Halo%20Alfi%20Kitchen,%20saya%20ingin%20tanya%20Paket%20Prasmanan%20Standard" target="_blank" class="btn btn-orange rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                                        <i class="bi bi-plus-lg"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item 5 -->
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                            <img src="{{ asset('images/snack-box.jpg') }}" class="card-img-top" alt="Snack Box" style="height: 200px; object-fit: cover;" onerror="this.src='https://images.unsplash.com/photo-1509440159596-0249088772ff?q=80&w=600'">
                            <div class="card-body p-4">
                                <span class="badge bg-sage-light text-sage mb-2">Snack Box</span>
                                <h5 class="card-title fw-bold">Snack Box Rapat</h5>
                                <p class="card-text text-muted small">2 Kue Asin (Risoles/Lemper), 1 Kue Manis (Pie/Brownies), & Air Mineral.</p>
                                <div class="d-flex justify-content-between align-items-center mt-3 pt-2 border-top">
                                    <span class="fs-5 fw-bold text-sage">Rp 15.000 <small class="fs-6 text-muted fw-normal">/box</small></span>
                                    <a href="https://wa.me/628xxxxxxxxxx?text=Halo%20Alfi%20Kitchen,%20saya%20ingin%20pesan%20Snack%20Box%20Rapat" target="_blank" class="btn btn-orange rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                                        <i class="bi bi-plus-lg"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAB 2: NASI BOX -->
            <div class="tab-pane fade" id="nasibox-menu" role="tabpanel">
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                            <img src="{{ asset('images/ayam-bakar.jpg') }}" class="card-img-top" alt="Nasi Box Ayam Bakar" style="height: 200px; object-fit: cover;" onerror="this.src='https://images.unsplash.com/photo-1598515214211-89d3c73ae83b?q=80&w=600'">
                            <div class="card-body p-4">
                                <span class="badge bg-sage-light text-sage mb-2">Nasi Box</span>
                                <h5 class="card-title fw-bold">Ayam Bakar Madu</h5>
                                <p class="card-text text-muted small">Nasi wangi, ayam bakar bumbu madu, tahu, tempe, lalapan segar, & sambal bajak.</p>
                                <div class="d-flex justify-content-between align-items-center mt-3 pt-2 border-top">
                                    <span class="fs-5 fw-bold text-sage">Rp 25.000 <small class="fs-6 text-muted fw-normal">/porsi</small></span>
                                    <a href="https://wa.me/628xxxxxxxxxx?text=Halo%20Alfi%20Kitchen,%20saya%20ingin%20pesan%20Nasi%20Box%20Ayam%20Bakar%20Madu" target="_blank" class="btn btn-orange rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                                        <i class="bi bi-plus-lg"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAB 3: HARIAN -->
            <div class="tab-pane fade" id="harian-menu" role="tabpanel">
                <p class="text-muted text-center py-4">Tampilkan daftar variasi paket catering harian di sini.</p>
            </div>

            <!-- TAB 4: PRASMANAN -->
            <div class="tab-pane fade" id="prasmanan-menu" role="tabpanel">
                <p class="text-muted text-center py-4">Tampilkan daftar variasi paket prasmanan di sini.</p>
            </div>

            <!-- TAB 5: SNACK BOX -->
            <div class="tab-pane fade" id="snack-menu" role="tabpanel">
                <p class="text-muted text-center py-4">Tampilkan daftar variasi snack box di sini.</p>
            </div>

        </div>
    </div>
</section>

<!-- CSS TAMBAHAN KHUSUS NAV TAB ACTIVE -->
<style>
    .nav-pills .nav-link {
        color: #2C3E35;
        background-color: #EBF0EC;
    }
    .nav-pills .nav-link.active {
        background-color: #8A9A86 !important;
        color: #ffffff !important;
    }
</style>

@endsection