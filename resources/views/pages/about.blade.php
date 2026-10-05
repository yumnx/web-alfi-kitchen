@extends('layouts.main')

@section('title', 'Tentang Kami')

@section('styles')
<style>
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

    /* Floating Badge di Gambar Hero */
    .hero-floating-badge {
        position: absolute;
        bottom: 20px;
        left: 20px;
        background: #ffffff;
        border-radius: 18px;
        padding: 12px 18px;
        border: 1.5px solid var(--border);
        box-shadow: 0 10px 25px rgba(74, 53, 23, 0.12);
    }

    /* Visi Misi Card */
    .vision-card {
        background-color: #ffffff;
        border: 1.5px solid var(--border);
        border-radius: 24px;
        box-shadow: 0 8px 22px rgba(74, 53, 23, 0.05);
    }

    /* Nilai Utama Card */
    .value-card {
        background-color: #ffffff;
        border: 1.5px solid var(--border);
        border-radius: 20px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .value-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 14px 28px rgba(74, 53, 23, 0.08);
    }
    .value-icon-box {
        width: 54px;
        height: 54px;
        border-radius: 14px;
        background-color: var(--surface);
        color: var(--primary);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.6rem;
    }

    /* Step Card (Dapur Higienis) */
    .step-img {
        height: 200px;
        width: 100%;
        object-fit: cover;
        border-radius: 16px;
    }
</style>
@endsection

@section('content')
<div class="container pt-2 pb-5">

    <!-- ==================== 1. HERO SECTION (TENTANG KAMI) ==================== -->
    <section class="pt-2 pb-4">
        <div class="row align-items-center g-5">
            <!-- Kiri: Story & Pengantar -->
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold mb-3" style="color: var(--primary-dark);">
                    Berawal dari Dapur Rumah, <br><span>Tumbuh untuk Anda</span>
                </h1>
                <p class="lead mb-3" style="color: var(--text-secondary); font-size: 1.05rem;">
                    <strong>Alfi Kitchen</strong> lahir di tahun 2018 dari resep keluarga turun-temurun dan kerinduan menghadirkan masakan rumahan nusantara yang lezat, bersih, serta kaya rempah di tengah hiruk-pikuk kesibukan harian.
                </p>
                <p class="small text-secondary mb-4 leading-relaxed">
                    Kami meyakini makanan yang baik dimulai dari niat yang tulus dan bahan-bahan segar pilihan. Dari dapur keluarga kecil, kini kami telah melayani ribuan porsi katering harian perkantoran, nasi box syukuran, hingga tumpeng megah untuk perayaan-perayaan istimewa.
                </p>

                <div class="d-flex flex-wrap gap-3">
                    <a href="https://wa.me/6281234567890?text=Halo%20Alfi%20Kitchen,%20saya%20ingin%20tanya%20tentang%20layanan%20katering" target="_blank" class="btn btn-custom-primary">
                        <i class="bi bi-whatsapp me-1"></i> Hubungi Kami
                    </a>
                    <a href="{{ url('/menu') }}" class="btn btn-outline-dark rounded-pill px-4 fw-semibold">
                        Lihat Menu Kami
                    </a>
                </div>
            </div>

            <!-- Kanan: Gambar Dapur / Suasana Memasak -->
            <div class="col-lg-6 text-center position-relative">
                <div class="position-relative d-inline-block">
                    <img src="https://images.unsplash.com/photo-1556910103-1c02745aae4d?auto=format&fit=crop&w=700&q=80" 
                         alt="Dapur Alfi Kitchen" 
                         class="img-fluid rounded-5 shadow-lg" 
                         style="max-height: 440px; width: 100%; object-fit: cover; border: 8px solid var(--surface);">

                    <!-- Floating Badge -->
                    <div class="hero-floating-badge text-start d-none d-sm-flex align-items-center gap-3">
                        <div class="fs-2 text-warning">
                            <i class="bi bi-award-fill"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-0" style="color: var(--primary-dark);">6+ Tahun Berkarya</h6>
                            <small class="text-muted">Konsisten Jaga Rasa & Kualitas</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== 2. VISI & MISI ==================== -->
    <section class="my-5">
        <div class="vision-card p-4 p-md-5">
            <div class="row g-4 align-items-center">
                <div class="col-md-5 border-md-end" style="border-color: var(--border) !important;">
                    <span class="badge bg-warning text-dark px-3 py-2 rounded-pill mb-2">Visi Kami</span>
                    <h3 class="fw-bold mb-3" style="color: var(--primary-dark);">Menjadi Pilihan Katering Rumahan Utama</h3>
                    <p class="text-secondary small mb-0 leading-relaxed">
                        Menjadi mitra katering terdepan yang menghadirkan kelezatan masakan rumahan otentik, terpercaya dalam kebersihan dan kehalalan, serta selalu tepat waktu di setiap meja makan keluarga maupun instansi.
                    </p>
                </div>
                <div class="col-md-7 ps-md-4">
                    <span class="badge bg-warning text-dark px-3 py-2 rounded-pill mb-2">Misi Kami</span>
                    <h4 class="fw-bold mb-3" style="color: var(--primary-dark);">Komitmen Pelayanan Terbaik</h4>
                    <ul class="list-unstyled d-flex flex-column gap-2 mb-0 small text-secondary">
                        <li class="d-flex align-items-start gap-2">
                            <i class="bi bi-check-circle-fill text-success mt-1"></i>
                            <span>Menggunakan bahan baku segar yang dibeli setiap subuh tanpa bahan pengawet berbahaya.</span>
                        </li>
                        <li class="d-flex align-items-start gap-2">
                            <i class="bi bi-check-circle-fill text-success mt-1"></i>
                            <span>Menjaga standar sanitasi dapur bersih dan sertifikasi halal di seluruh alur produksi.</span>
                        </li>
                        <li class="d-flex align-items-start gap-2">
                            <i class="bi bi-check-circle-fill text-success mt-1"></i>
                            <span>Memberikan fleksibilitas pemesanan dengan harga terjangkau bagi personal, UMKM, maupun korporasi.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== 3. 4 PILAR NILAI UTAMA (CORE VALUES) ==================== -->
    <section class="py-4">
        <div class="text-center mb-5">
            <h2 class="fw-bold display-6" style="color: var(--primary-dark);">Nilai yang Kami Junjung Tinggi</h2>
            <p class="text-secondary mx-auto" style="max-width: 550px;">
                Dedikasi kami untuk memastikan setiap hidangan sampai dengan rasa dan kualitas terbaik
            </p>
        </div>

        <div class="row g-4">
            <!-- Nilai 1 -->
            <div class="col-md-6 col-lg-3">
                <div class="card value-card h-100 p-4">
                    <div class="value-icon-box mb-3">
                        <i class="bi bi-fire"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Resep Otentik</h5>
                    <p class="small text-secondary mb-0">
                        Diracik menggunakan paduan bumbu rempah alami warisan nusantara, menciptakan cita rasa masakan yang medok dan gurih pas.
                    </p>
                </div>
            </div>

            <!-- Nilai 2 -->
            <div class="col-md-6 col-lg-3">
                <div class="card value-card h-100 p-4">
                    <div class="value-icon-box mb-3">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h5 class="fw-bold mb-2">100% Halal & Bersih</h5>
                    <p class="small text-secondary mb-0">
                        Proses memasak berstandar higienis tinggi dari dapur yang bersih, serta bahan-bahan bersertifikasi halal resmi.
                    </p>
                </div>
            </div>

            <!-- Nilai 3 -->
            <div class="col-md-6 col-lg-3">
                <div class="card value-card h-100 p-4">
                    <div class="value-icon-box mb-3">
                        <i class="bi bi-alarm"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Pengiriman On-Time</h5>
                    <p class="small text-secondary mb-0">
                        Manajemen jadwal kirim yang matang sehingga sajian tiba tepat sebelum jam makan siang atau jam acara dimulai.
                    </p>
                </div>
            </div>

            <!-- Nilai 4 -->
            <div class="col-md-6 col-lg-3">
                <div class="card value-card h-100 p-4">
                    <div class="value-icon-box mb-3">
                        <i class="bi bi-sliders"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Pilihan Fleksibel</h5>
                    <p class="small text-secondary mb-0">
                        Bebas kustomisasi menu, variasi lauk, dan jumlah porsi sesuai dengan anggaran serta konsep kegiatan Anda.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== 4. BEHIND THE SCENES (STANDAR DAPUR) ==================== -->
    <section class="py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold display-6" style="color: var(--primary-dark);">Proses dari Dapur ke Meja Anda</h2>
            <p class="text-secondary mx-auto" style="max-width: 550px;">
                Melihat lebih dekat bagaimana setiap kotak hidangan Alfi Kitchen disiapkan
            </p>
        </div>

        <div class="row g-4">
            <!-- Step 1 -->
            <div class="col-md-4">
                <div class="card value-card h-100 p-3">
                    <img src="https://images.unsplash.com/photo-1542838132-92c53300491e?auto=format&fit=crop&w=500&q=80" class="step-img mb-3" alt="Bahan Segar">
                    <h5 class="fw-bold mb-1">Bahan Segar Setiap Subuh</h5>
                    <p class="small text-secondary mb-0">
                        Sayuran, daging, dan rempah dipilih langsung setiap hari dari pasar lokal segar untuk menjaga kualitas rasa alami.
                    </p>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="col-md-4">
                <div class="card value-card h-100 p-3">
                    <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?auto=format&fit=crop&w=500&q=80" class="step-img mb-3" alt="Proses Memasak">
                    <h5 class="fw-bold mb-1">Olah Higienis & Handal</h5>
                    <p class="small text-secondary mb-0">
                        Dimasak dengan perlengkapan sanitasi terstandar, api terkontrol, dan resep bumbu yang tidak pernah pelit porsi.
                    </p>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="col-md-4">
                <div class="card value-card h-100 p-3">
                    <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?auto=format&fit=crop&w=500&q=80" class="step-img mb-3" alt="Pengemasan Rapi">
                    <h5 class="fw-bold mb-1">Kemasan Rapi Food-Grade</h5>
                    <p class="small text-secondary mb-0">
                        Dikemas dalam wadah bersih, bersegel rapat dan food-grade agar makanan terlindungi steril selama perjalanan.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== 5. INFORMASI OPERASIONAL ==================== -->
    <section class="my-4">
        <div class="card value-card p-4 p-md-5">
            <div class="row g-4 align-items-center">
                <div class="col-md-6">
                    <h4 class="fw-bold mb-3" style="color: var(--primary-dark);">
                        <i class="bi bi-geo-alt-fill text-danger me-2"></i> Dapur Utama & Jangkauan
                    </h4>
                    <p class="small text-secondary mb-3 leading-relaxed">
                        Kami beroperasi dari dapur bersih di Jakarta Selatan dan melayani pengantaran ke seluruh area <strong>Jabodetabek</strong> untuk pesanan harian maupun partai besar.
                    </p>
                    <ul class="list-unstyled small text-secondary d-flex flex-column gap-2 mb-0">
                        <li><strong>Alamat:</strong> Jl. Melati Raya No. 24, Pancoran, Jakarta Selatan 12780</li>
                        <li><strong>Jam Layanan:</strong> Setiap Hari, 06.00 – 20.00 WIB</li>
                        <li><strong>Layanan Khusus:</strong> Katering Harian, Nasi Kotak, Tumpeng, & Snack Box</li>
                    </ul>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="p-4 rounded-4" style="background-color: var(--surface);">
                        <i class="bi bi-truck text-warning fs-1 mb-2 d-block"></i>
                        <h6 class="fw-bold mb-1" style="color: var(--primary-dark);">Pengiriman Aman Bergaransi</h6>
                        <small class="text-secondary">Armada khusus untuk memastikan makanan tetap rapi dan tidak tumpah.</small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== 6. BANNER CTA ==================== -->
    <div class="mt-5 pt-3">
        <div class="p-4 p-md-5 text-center text-white rounded-4 shadow-sm" style="background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);">
            <h2 class="fw-bold mb-2 font-serif">Mari Berdiskusi untuk Acara Anda</h2>
            <p class="mx-auto mb-4" style="max-width: 600px; opacity: 0.95;">
                Punya pertanyaan seputar katering kantor atau syukuran keluarga? Hubungi tim Alfi Kitchen sekarang.
            </p>
            <a href="https://wa.me/6281234567890?text=Halo%20Alfi%20Kitchen,%20saya%20ingin%20tanya%20paket%20katering%20tentang%20kami" target="_blank" class="btn btn-light btn-lg rounded-pill px-4 fw-bold" style="color: var(--primary-dark);">
                <i class="bi bi-whatsapp text-success me-1"></i> Hubungi Kami via WhatsApp
            </a>
        </div>
    </div>

</div>
@endsection