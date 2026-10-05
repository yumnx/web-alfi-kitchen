@extends('layouts.main')

@section('title', 'Testimoni Pelanggan')

@section('styles')
<style>
    /* Hero Testimoni */
    .hero-rating-number {
        font-size: 4.5rem;
        font-weight: 800;
        color: var(--primary);
        line-height: 1;
    }

    .hero-rating-box {
        background-color: #ffffff;
        border: 1.5px solid var(--border);
        border-radius: 24px;
        padding: 24px 28px;
        box-shadow: 0 10px 30px rgba(74, 53, 23, 0.06);
        display: inline-flex;
        align-items: center;
        gap: 20px;
    }

    .stat-pill {
        background-color: var(--surface);
        border: 1px solid var(--border);
        border-radius: 50px;
        padding: 7px 16px;
        font-size: 0.85rem;
        font-weight: 600;
        color: var(--primary-dark);
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    /* Floating Card di gambar kanan (ala referensi) */
    .hero-floating-badge {
        position: absolute;
        bottom: 15px;
        left: 20px;
        background: #ffffff;
        border-radius: 18px;
        padding: 12px 18px;
        border: 1.5px solid var(--border);
        box-shadow: 0 10px 25px rgba(74, 53, 23, 0.12);
    }

    /* Tab Filter */
    .nav-pills .nav-link {
        color: var(--text-secondary);
        background-color: #ffffff;
        border: 1.5px solid var(--border);
        border-radius: 50px;
        padding: 8px 22px;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.2s ease;
        margin: 0 4px 8px 4px;
    }

    .nav-pills .nav-link.active {
        background-color: var(--primary) !important;
        border-color: var(--primary) !important;
        color: #ffffff !important;
        box-shadow: 0 4px 12px rgba(228, 112, 29, 0.25);
    }

    /* Review Card */
    .review-card {
        background-color: #ffffff;
        border: 1.5px solid var(--border);
        border-radius: 20px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .review-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 14px 28px rgba(74, 53, 23, 0.08);
    }

    .ordered-badge {
        background-color: var(--surface);
        color: var(--text-secondary);
        font-size: 0.75rem;
        font-weight: 600;
        border-radius: 6px;
        padding: 4px 8px;
        display: inline-block;
    }

    .avatar-circle {
        width: 46px;
        height: 46px;
        background-color: var(--surface);
        color: var(--primary-dark);
        font-weight: 700;
        font-size: 1.1rem;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1.5px solid var(--accent);
    }

    .gallery-img {
        height: 180px;
        width: 100%;
        object-fit: cover;
        border-radius: 16px;
        transition: transform 0.3s ease;
    }

    .gallery-img:hover {
        transform: scale(1.03);
    }
</style>
@endsection

@section('content')
<div class="container pt-2 pb-5">

    <!-- ==================== 1. HERO SECTION TESTIMONI (2 KOLOM) ==================== -->
    <section class="pt-2 pb-4">
        <div class="row align-items-center g-5">
            <!-- Kiri: Rating Besar, Penjelasan, & Badges -->
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold mb-3" style="color: var(--primary-dark);">
                    Dipercaya untuk <br><span>Setiap Momen Berharga</span>
                </h1>
                <p class="lead mb-4" style="color: var(--text-secondary); font-size: 1.05rem;">
                    Bagi kami, katering bukan sekadar mengantar makanan, tapi menjaga kehangatan acara Anda. Simak kesan jujur dari mereka yang sudah mencicipi racikan dapur kami.
                </p>

                <!-- Box Rating Besar -->
                <div class="hero-rating-box mb-4">
                    <div class="hero-rating-number">4.9</div>
                    <div>
                        <div class="text-warning fs-5 mb-1">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <h6 class="fw-bold mb-0" style="color: var(--text-primary);">Kepuasan Sangat Tinggi</h6>
                        <small class="text-muted">Dari 500+ pesanan event & harian</small>
                    </div>
                </div>

                <!-- 3 Badges Keunggulan -->
                <div class="d-flex flex-wrap gap-2 mb-4">
                    <span class="stat-pill"><i class="bi bi-check-circle-fill text-success"></i> 99% Kirim Tepat Waktu</span>
                    <span class="stat-pill"><i class="bi bi-hand-thumbs-up-fill text-primary"></i> 98% Puas dengan Rasa</span>
                    <span class="stat-pill"><i class="bi bi-shield-fill-check text-warning"></i> 100% Halal & Higienis</span>
                </div>

                <div>
                    <button type="button" class="btn btn-outline-dark rounded-pill px-4 py-2 fw-semibold" data-bs-toggle="modal" data-bs-target="#reviewModal">
                        <i class="bi bi-pencil-square me-1"></i> Tulis Ulasan Anda
                    </button>
                </div>
            </div>

            <!-- Kanan: Gambar Orang Menikmati Makanan + Floating Badge -->
            <div class="col-lg-6 text-center position-relative">
                <div class="position-relative d-inline-block">
                    <!-- Foto suasana makan bersama yang hangat dan ceria -->
                    <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=700&q=80" 
                         alt="Menikmati Katering Bersama" 
                         class="img-fluid rounded-5 shadow-lg" 
                         style="max-height: 420px; width: 100%; object-fit: cover; border: 8px solid var(--surface);">

                    <!-- Floating Badge -->
                    <div class="hero-floating-badge text-start d-none d-sm-flex align-items-center gap-3">
                        <div class="fs-2 text-warning">
                            <i class="bi bi-emoji-smile-fill"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-0" style="color: var(--primary-dark);">500+ Pelanggan Bahagia</h6>
                            <small class="text-muted">Kantor, Keluarga, & Mahasiswa</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <hr class="my-5" style="border-color: var(--border);">

    <!-- ==================== 2. FILTER KATEGORI TAB ==================== -->
    <div class="d-flex justify-content-center mb-4">
        <ul class="nav nav-pills" id="testimonialTab" role="tablist">
            <li class="nav-item">
                <button class="nav-link active" id="all-tab" data-bs-toggle="pill" data-bs-target="#all" type="button">Semua Ulasan</button>
            </li>
            <li class="nav-item">
                <button class="nav-link" id="nasibox-tab" data-bs-toggle="pill" data-bs-target="#nasibox" type="button">Nasi Box</button>
            </li>
            <li class="nav-item">
                <button class="nav-link" id="tumpeng-tab" data-bs-toggle="pill" data-bs-target="#tumpeng" type="button">Tumpeng</button>
            </li>
            <li class="nav-item">
                <button class="nav-link" id="snackbox-tab" data-bs-toggle="pill" data-bs-target="#snackbox" type="button">Snack Box</button>
            </li>
        </ul>
    </div>

    <!-- ==================== 3. GRID CARD ULASAN ==================== -->
    <div class="tab-content" id="testimonialTabContent">

        <!-- TAB 1: SEMUA ULASAN -->
        <div class="tab-pane fade show active" id="all" role="tabpanel">
            <div class="row g-4">
                <!-- Card 1 -->
                <div class="col-md-4">
                    <div class="card review-card h-100 p-4 d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="text-warning small">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            </div>
                            <span class="text-muted" style="font-size: 0.75rem;">1 Minggu lalu</span>
                        </div>
                        <div class="mb-3">
                            <span class="ordered-badge">Pesan: 120 Nasi Box Ayam Bawang</span>
                        </div>
                        <p class="small text-secondary flex-grow-1">
                            "Ayam bawangnya juara banget! Bumbunya meresap sampai ke serat daging, sambalnya pedas segar. Tiba di kantor jam 11.30 pas banget sebelum meeting mulai."
                        </p>
                        <div class="d-flex align-items-center gap-3 pt-3 border-top" style="border-color: var(--border) !important;">
                            <div class="avatar-circle">RD</div>
                            <div>
                                <h6 class="fw-bold mb-0" style="color: var(--primary-dark);">Ratna Dewi</h6>
                                <small class="text-muted">HRD PT Sumber Berkah</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-md-4">
                    <div class="card review-card h-100 p-4 d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="text-warning small">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            </div>
                            <span class="text-muted" style="font-size: 0.75rem;">2 Minggu lalu</span>
                        </div>
                        <div class="mb-3">
                            <span class="ordered-badge">Pesan: Tumpeng Jumbo Komplit</span>
                        </div>
                        <p class="small text-secondary flex-grow-1">
                            "Hiasan tumpengnya rapi sekali dan estetik buat foto syukuran peresmian kantor baru. Nasinya pulen gurih dan porsi lauknya banyak, nggak pelit!"
                        </p>
                        <div class="d-flex align-items-center gap-3 pt-3 border-top" style="border-color: var(--border) !important;">
                            <div class="avatar-circle">BP</div>
                            <div>
                                <h6 class="fw-bold mb-0" style="color: var(--primary-dark);">Bambang Prakoso</h6>
                                <small class="text-muted">Acara Peresmian Kantor</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-md-4">
                    <div class="card review-card h-100 p-4 d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="text-warning small">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            </div>
                            <span class="text-muted" style="font-size: 0.75rem;">3 Minggu lalu</span>
                        </div>
                        <div class="mb-3">
                            <span class="ordered-badge">Pesan: 85 Snack Box VIP</span>
                        </div>
                        <p class="small text-secondary flex-grow-1">
                            "Pastelnya renyah walau sudah agak sore, pie buahnya segar dan vla-nya manis pas. Tamu-tamu seminar banyak yang nanya pesen snack box di mana."
                        </p>
                        <div class="d-flex align-items-center gap-3 pt-3 border-top" style="border-color: var(--border) !important;">
                            <div class="avatar-circle">NA</div>
                            <div>
                                <h6 class="fw-bold mb-0" style="color: var(--primary-dark);">Nadia Az-Zahra</h6>
                                <small class="text-muted">Panitia Seminar Nasional</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="col-md-4">
                    <div class="card review-card h-100 p-4 d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="text-warning small">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            </div>
                            <span class="text-muted" style="font-size: 0.75rem;">1 Bulan lalu</span>
                        </div>
                        <div class="mb-3">
                            <span class="ordered-badge">Pesan: 40 Tumpeng Mini Cantik</span>
                        </div>
                        <p class="small text-secondary flex-grow-1">
                            "Buat goodie bag syukuran aqiqah anak. Packaging mikanya kokoh, pitanya rapi. Tamu keluarga pada suka banget sama ayam suwir pedas manisnya."
                        </p>
                        <div class="d-flex align-items-center gap-3 pt-3 border-top" style="border-color: var(--border) !important;">
                            <div class="avatar-circle">SA</div>
                            <div>
                                <h6 class="fw-bold mb-0" style="color: var(--primary-dark);">Sarah Amelia</h6>
                                <small class="text-muted">Syukuran Keluarga</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 5 -->
                <div class="col-md-4">
                    <div class="card review-card h-100 p-4 d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="text-warning small">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>
                            </div>
                            <span class="text-muted" style="font-size: 0.75rem;">1 Bulan lalu</span>
                        </div>
                        <div class="mb-3">
                            <span class="ordered-badge">Pesan: 60 Nasi Box Rendang Daging</span>
                        </div>
                        <p class="small text-secondary flex-grow-1">
                            "Rendangnya beneran empuk nggak bikin cape ngunyah, bumbu Minangnya pekat. Respon admin WhatsApp juga ramah dan kooperatif pas revisi jam kirim."
                        </p>
                        <div class="d-flex align-items-center gap-3 pt-3 border-top" style="border-color: var(--border) !important;">
                            <div class="avatar-circle">FH</div>
                            <div>
                                <h6 class="fw-bold mb-0" style="color: var(--primary-dark);">Fajar Hidayat</h6>
                                <small class="text-muted">Rapat Pengurus Yayasan</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 6 -->
                <div class="col-md-4">
                    <div class="card review-card h-100 p-4 d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="text-warning small">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            </div>
                            <span class="text-muted" style="font-size: 0.75rem;">2 Bulan lalu</span>
                        </div>
                        <div class="mb-3">
                            <span class="ordered-badge">Pesan: 150 Snack Tradisional Box</span>
                        </div>
                        <p class="small text-secondary flex-grow-1">
                            "Kue sus dan lempernya masih fresh banget saat diantar pagi. Kemasannya bersih dan higienis. Pasti bakal repeat order untuk event berikutnya!"
                        </p>
                        <div class="d-flex align-items-center gap-3 pt-3 border-top" style="border-color: var(--border) !important;">
                            <div class="avatar-circle">DS</div>
                            <div>
                                <h6 class="fw-bold mb-0" style="color: var(--primary-dark);">Dina Septiani</h6>
                                <small class="text-muted">Event Organizer Jakarta</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- TAB 2: NASI BOX -->
        <div class="tab-pane fade" id="nasibox" role="tabpanel">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card review-card h-100 p-4 d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="text-warning small"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
                            <span class="text-muted" style="font-size: 0.75rem;">1 Minggu lalu</span>
                        </div>
                        <span class="ordered-badge mb-3">Pesan: 120 Nasi Box Ayam Bawang</span>
                        <p class="small text-secondary flex-grow-1">"Ayam bawangnya juara banget! Bumbunya meresap sampai ke serat daging, sambalnya pedas segar. Tiba tepat sebelum meeting dimulai."</p>
                        <div class="d-flex align-items-center gap-3 pt-3 border-top" style="border-color: var(--border) !important;">
                            <div class="avatar-circle">RD</div>
                            <div>
                                <h6 class="fw-bold mb-0" style="color: var(--primary-dark);">Ratna Dewi</h6>
                                <small class="text-muted">HRD PT Sumber Berkah</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card review-card h-100 p-4 d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="text-warning small"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i></div>
                            <span class="text-muted" style="font-size: 0.75rem;">1 Bulan lalu</span>
                        </div>
                        <span class="ordered-badge mb-3">Pesan: 60 Nasi Box Rendang Daging</span>
                        <p class="small text-secondary flex-grow-1">"Rendangnya beneran empuk dan rempahnya pekat. Pengiriman on-time walau Jakarta lagi hujan deras waktu itu. Mantap!"</p>
                        <div class="d-flex align-items-center gap-3 pt-3 border-top" style="border-color: var(--border) !important;">
                            <div class="avatar-circle">FH</div>
                            <div>
                                <h6 class="fw-bold mb-0" style="color: var(--primary-dark);">Fajar Hidayat</h6>
                                <small class="text-muted">Rapat Pengurus Yayasan</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- TAB 3: TUMPENG -->
        <div class="tab-pane fade" id="tumpeng" role="tabpanel">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card review-card h-100 p-4 d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="text-warning small"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
                            <span class="text-muted" style="font-size: 0.75rem;">2 Minggu lalu</span>
                        </div>
                        <span class="ordered-badge mb-3">Pesan: Tumpeng Jumbo Komplit</span>
                        <p class="small text-secondary flex-grow-1">"Hiasan tumpengnya rapi sekali dan estetik buat foto peresmian cabang baru. Nasi kuningnya harum dan gurihnya pas di lidah."</p>
                        <div class="d-flex align-items-center gap-3 pt-3 border-top" style="border-color: var(--border) !important;">
                            <div class="avatar-circle">BP</div>
                            <div>
                                <h6 class="fw-bold mb-0" style="color: var(--primary-dark);">Bambang Prakoso</h6>
                                <small class="text-muted">Peresmian Kantor Cabang</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card review-card h-100 p-4 d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="text-warning small"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
                            <span class="text-muted" style="font-size: 0.75rem;">1 Bulan lalu</span>
                        </div>
                        <span class="ordered-badge mb-3">Pesan: 40 Tumpeng Mini Cantik</span>
                        <p class="small text-secondary flex-grow-1">"Packaging mikanya cantik dan higienis. Cocok banget buat dibagikan ke tetangga dan kerabat pas acara syukuran anak."</p>
                        <div class="d-flex align-items-center gap-3 pt-3 border-top" style="border-color: var(--border) !important;">
                            <div class="avatar-circle">SA</div>
                            <div>
                                <h6 class="fw-bold mb-0" style="color: var(--primary-dark);">Sarah Amelia</h6>
                                <small class="text-muted">Syukuran Keluarga</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- TAB 4: SNACK BOX -->
        <div class="tab-pane fade" id="snackbox" role="tabpanel">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card review-card h-100 p-4 d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="text-warning small"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
                            <span class="text-muted" style="font-size: 0.75rem;">3 Minggu lalu</span>
                        </div>
                        <span class="ordered-badge mb-3">Pesan: 85 Snack Box VIP</span>
                        <p class="small text-secondary flex-grow-1">"Pastelnya renyah, pie buahnya manis segar dan air mineralnya botol rapi. Cocok banget buat tamu-tamu VIP kami."</p>
                        <div class="d-flex align-items-center gap-3 pt-3 border-top" style="border-color: var(--border) !important;">
                            <div class="avatar-circle">NA</div>
                            <div>
                                <h6 class="fw-bold mb-0" style="color: var(--primary-dark);">Nadia Az-Zahra</h6>
                                <small class="text-muted">Panitia Seminar Kampus</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card review-card h-100 p-4 d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="text-warning small"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
                            <span class="text-muted" style="font-size: 0.75rem;">2 Bulan lalu</span>
                        </div>
                        <span class="ordered-badge mb-3">Pesan: 150 Snack Tradisional Box</span>
                        <p class="small text-secondary flex-grow-1">"Kue tradisionalnya bersih, gak gampang basi, dan rasa santannya berasa premium bukan yang abal-abal."</p>
                        <div class="d-flex align-items-center gap-3 pt-3 border-top" style="border-color: var(--border) !important;">
                            <div class="avatar-circle">DS</div>
                            <div>
                                <h6 class="fw-bold mb-0" style="color: var(--primary-dark);">Dina Septiani</h6>
                                <small class="text-muted">Event Organizer</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- ==================== 4. GALERI FOTO REAL (SOCIAL PROOF) ==================== -->
    <div class="mt-5 pt-4">
        <div class="text-center mb-4">
            <h3 class="fw-bold" style="color: var(--primary-dark);">Momen Hangat Bersama Alfi Kitchen</h3>
            <small class="text-secondary">Dokumentasi pesanan yang sukses dinikmati di berbagai acara</small>
        </div>
        <div class="row g-3">
            <div class="col-6 col-md-3">
                <img src="https://images.unsplash.com/photo-1555244162-803834f70033?auto=format&fit=crop&w=500&q=80" class="gallery-img shadow-sm" alt="Katering Prasmanan">
            </div>
            <div class="col-6 col-md-3">
                <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?auto=format&fit=crop&w=500&q=80" class="gallery-img shadow-sm" alt="Nasi Box Kantor">
            </div>
            <div class="col-6 col-md-3">
                <img src="https://images.unsplash.com/photo-1626082927389-6cd097cdc6ec?auto=format&fit=crop&w=500&q=80" class="gallery-img shadow-sm" alt="Tumpeng Acara">
            </div>
            <div class="col-6 col-md-3">
                <img src="https://images.unsplash.com/photo-1509440159596-0249088772ff?auto=format&fit=crop&w=500&q=80" class="gallery-img shadow-sm" alt="Snack Box Rapat">
            </div>
        </div>
    </div>

    <!-- ==================== 5. BANNER CTA ==================== -->
    <div class="mt-5 pt-3">
        <div class="p-4 p-md-5 text-center text-white rounded-4 shadow-sm" style="background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);">
            <h2 class="fw-bold mb-2 font-serif">Ingin Acara Anda Berjalan Sukses Seperti Mereka?</h2>
            <p class="mx-auto mb-4" style="max-width: 600px; opacity: 0.95;">
                Dapatkan rekomendasi paket katering yang pas dengan budget dan jumlah tamu undangan Anda.
            </p>
            <a href="https://wa.me/6281234567890?text=Halo%20Alfi%20Kitchen,%20saya%20tertarik%20konsultasi%20menu%20acara" target="_blank" class="btn btn-light btn-lg rounded-pill px-4 fw-bold" style="color: var(--primary-dark);">
                <i class="bi bi-whatsapp text-success me-1"></i> Konsultasi Pesanan via WhatsApp
            </a>
        </div>
    </div>

</div>

<!-- ==================== 6. MODAL FORM TULIS ULASAN ==================== -->
<div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 shadow">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold" id="reviewModalLabel" style="color: var(--primary-dark);">
                    <i class="bi bi-pencil-fill text-warning me-1"></i> Tulis Ulasan Anda
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-3">
                <form id="reviewForm" onsubmit="event.preventDefault(); alert('Terima kasih! Ulasan Anda telah kami terima untuk diverifikasi tim Alfi Kitchen.'); bootstrap.Modal.getInstance(document.getElementById('reviewModal')).hide();">
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Nama Lengkap</label>
                        <input type="text" class="form-control" placeholder="Contoh: Sarah Amelia" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Instansi / Jenis Acara</label>
                        <input type="text" class="form-control" placeholder="Contoh: PT ABC / Acara Syukuran Rumah" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Menu yang Dipesan</label>
                        <select class="form-select" required>
                            <option value="">Pilih Kategori...</option>
                            <option value="Nasi Box">Nasi Box Komplit</option>
                            <option value="Tumpeng">Tumpeng (Mini / Jumbo)</option>
                            <option value="Snack Box">Snack Box Premium</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Rating Kepuasan</label>
                        <select class="form-select text-warning fw-bold" required>
                            <option value="5">⭐⭐⭐⭐⭐ (5 - Sangat Puas)</option>
                            <option value="4">⭐⭐⭐⭐ (4 - Puas)</option>
                            <option value="3">⭐⭐⭐ (3 - Cukup)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Ulasan / Pesan & Kesan</label>
                        <textarea class="form-control" rows="3" placeholder="Ceritakan rasa masakan, ketepatan waktu pengiriman, atau pelayanan kami..." required></textarea>
                    </div>
                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-custom-primary">Kirim Ulasan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection