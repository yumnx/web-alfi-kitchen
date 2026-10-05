@extends('layouts.main')

@section('title', 'Daftar Menu Katering')

@section('styles')
<style>
    /* Slider Container: Pastikan overflow hidden agar cuma 3 card yang nampak */
    .menu-slider-container {
        padding: 35px 0 65px 0;
        overflow: hidden;
        position: relative;
    }

    .swiper-wrapper {
        align-items: center; /* Menjaga posisi vertikal rata tengah */
    }

    /* DEFAULT: Semua slide posisinya mengecil (skala 0.85) dan redup */
    .swiper-slide {
        transition: transform 0.4s ease, opacity 0.4s ease;
        opacity: 0.35;
        transform: scale(0.85);
    }

    /* HANYA SLIDE TENGAH YANG AKTIF: Membesar 105% & Terang Benderang */
    .swiper-slide-active {
        opacity: 1 !important;
        transform: scale(1.05) !important;
        z-index: 10;
    }

    /* Card di samping kiri & kanan tetap kelihatan tapi lebih redup */
    .swiper-slide-prev,
    .swiper-slide-next {
        opacity: 0.45;
        transform: scale(0.88);
    }

    .menu-card {
        background-color: #ffffff;
        border: 1.5px solid var(--border);
        border-radius: 22px;
        overflow: hidden;
        box-shadow: 0 8px 20px rgba(74, 53, 23, 0.08);
    }

    .menu-card img {
        height: 210px;
        width: 100%;
        object-fit: cover;
    }

    .section-badge {
        background-color: var(--surface);
        color: var(--primary-dark);
        border: 1px solid var(--border);
        border-radius: 50px;
        padding: 5px 16px;
        font-size: 0.85rem;
        font-weight: 600;
        display: inline-block;
    }

    /* Tombol Navigasi Panah */
    .swiper-button-next, .swiper-button-prev {
        color: var(--primary) !important;
        background: #ffffff;
        width: 44px;
        height: 44px;
        border-radius: 50%;
        box-shadow: 0 4px 14px rgba(0,0,0,0.15);
        border: 1px solid var(--border);
    }
    .swiper-button-next:after, .swiper-button-prev:after {
        font-size: 1.1rem;
        font-weight: bold;
    }
    .swiper-pagination-bullet-active {
        background-color: var(--primary) !important;
        width: 24px;
        border-radius: 8px;
    }
</style>
@endsection

@section('content')
<div class="container py-5">
    
    <!-- Header Halaman -->
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold" style="color: var(--primary-dark);">Pilihan Menu Alfi Kitchen</h1>
        <p class="mx-auto" style="color: var(--text-secondary); max-width: 600px;">
            Geser ke kanan atau kiri untuk melihat varian sajian. Tiap hidangan diracik dengan bumbu rempah pilihan, higienis, dan terbuat dari bahan segar.
        </p>
    </div>

    <!-- ==================== 1. SECTION TUMPENG (6 MENU) ==================== -->
    <section class="mb-5">
        <div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-2" style="border-color: var(--border) !important;">
            <div>
                <h3 class="fw-bold mb-0" style="color: var(--primary-dark);">Kategori Tumpeng</h3>
                <small style="color: var(--text-secondary);">Pilihan sajian syukuran, ulang tahun, selamatan, dan peresmian</small>
            </div>
            <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">6 Pilihan</span>
        </div>

        <div class="swiper swiper-tumpeng menu-slider-container position-relative">
            <div class="swiper-wrapper py-3">
                
                <!-- 1. Tumpeng Jumbo Komplit -->
                <div class="swiper-slide">
                    <div class="card menu-card h-100">
                        <img src="https://images.unsplash.com/photo-1626082927389-6cd097cdc6ec?auto=format&fit=crop&w=600&q=80" alt="Tumpeng Jumbo Komplit">
                        <div class="card-body p-4 d-flex flex-column">
                            <span class="badge align-self-start mb-2" style="background: var(--surface); color: var(--primary-dark);">Porsi 20-25 Orang</span>
                            <h5 class="fw-bold mb-1">Tumpeng Jumbo Komplit</h5>
                            <p class="small flex-grow-1" style="color: var(--text-secondary);">
                                Nasi kuning gunung besar, ayam goreng lengkuas, sambal goreng ati kentang, telur balado, perkedel, abon sapi, dan urap sayur.
                            </p>
                            <div class="d-flex justify-content-between align-items-center pt-3 border-top" style="border-color: var(--border) !important;">
                                <span class="fw-bold fs-5" style="color: var(--primary);">Rp 650.000</span>
                                <a href="https://wa.me/6281234567890?text=Halo%20Alfi%20Kitchen,%20saya%20mau%20pesan%20Tumpeng%20Jumbo%20Komplit" target="_blank" class="btn btn-sm btn-custom-primary">Pesan</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 2. Tumpeng Mini Cantik -->
                <div class="swiper-slide">
                    <div class="card menu-card h-100">
                        <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&w=600&q=80" alt="Tumpeng Mini Cantik">
                        <div class="card-body p-4 d-flex flex-column">
                            <span class="badge align-self-start mb-2" style="background: var(--surface); color: var(--primary-dark);">Personal Mika</span>
                            <h5 class="fw-bold mb-1">Tumpeng Mini Cantik</h5>
                            <p class="small flex-grow-1" style="color: var(--text-secondary);">
                                Kemasan mika bulat rapi. Nasi kuning wangi, ayam suwir pedas manis, orek tempe kacang, telur dadar iris, perkedel, dan timun.
                            </p>
                            <div class="d-flex justify-content-between align-items-center pt-3 border-top" style="border-color: var(--border) !important;">
                                <span class="fw-bold fs-5" style="color: var(--primary);">Rp 35.000</span>
                                <a href="https://wa.me/6281234567890?text=Halo%20Alfi%20Kitchen,%20saya%20mau%20pesan%20Tumpeng%20Mini%20Cantik" target="_blank" class="btn btn-sm btn-custom-primary">Pesan</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 3. Tumpeng Ayam Panggang Rujak -->
                <div class="swiper-slide">
                    <div class="card menu-card h-100">
                        <img src="https://images.unsplash.com/photo-1598515214211-89d3c73ae83b?auto=format&fit=crop&w=600&q=80" alt="Tumpeng Ayam Panggang">
                        <div class="card-body p-4 d-flex flex-column">
                            <span class="badge align-self-start mb-2" style="background: var(--surface); color: var(--primary-dark);">Porsi 10-15 Orang</span>
                            <h5 class="fw-bold mb-1">Tumpeng Ayam Panggang</h5>
                            <p class="small flex-grow-1" style="color: var(--text-secondary);">
                                Dikelilingi 1 ekor ayam utuh panggang bumbu rujak manis gurih, mie goreng jawa, urap kelapa sangrai, dan telur pindang cokelat.
                            </p>
                            <div class="d-flex justify-content-between align-items-center pt-3 border-top" style="border-color: var(--border) !important;">
                                <span class="fw-bold fs-5" style="color: var(--primary);">Rp 420.000</span>
                                <a href="https://wa.me/6281234567890?text=Halo%20Alfi%20Kitchen,%20saya%20mau%20pesan%20Tumpeng%20Ayam%20Panggang" target="_blank" class="btn btn-sm btn-custom-primary">Pesan</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 4. Tumpeng Nasi Uduk Betawi -->
                <div class="swiper-slide">
                    <div class="card menu-card h-100">
                        <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?auto=format&fit=crop&w=600&q=80" alt="Tumpeng Nasi Uduk">
                        <div class="card-body p-4 d-flex flex-column">
                            <span class="badge align-self-start mb-2" style="background: var(--surface); color: var(--primary-dark);">Porsi 15-20 Orang</span>
                            <h5 class="fw-bold mb-1">Tumpeng Nasi Uduk Gurih</h5>
                            <p class="small flex-grow-1" style="color: var(--text-secondary);">
                                Nasi uduk santan wangi daun pandan, empal daging sapi serundeng, semur tahu kentang, bihun goreng, sambal kacang, dan kerupuk emping.
                            </p>
                            <div class="d-flex justify-content-between align-items-center pt-3 border-top" style="border-color: var(--border) !important;">
                                <span class="fw-bold fs-5" style="color: var(--primary);">Rp 480.000</span>
                                <a href="https://wa.me/6281234567890?text=Halo%20Alfi%20Kitchen,%20saya%20mau%20pesan%20Tumpeng%20Nasi%20Uduk" target="_blank" class="btn btn-sm btn-custom-primary">Pesan</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 5. Tumpeng Nasi Liwet Solo -->
                <div class="swiper-slide">
                    <div class="card menu-card h-100">
                        <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?auto=format&fit=crop&w=600&q=80" alt="Tumpeng Nasi Liwet">
                        <div class="card-body p-4 d-flex flex-column">
                            <span class="badge align-self-start mb-2" style="background: var(--surface); color: var(--primary-dark);">Porsi 15-20 Orang</span>
                            <h5 class="fw-bold mb-1">Tumpeng Nasi Liwet Solo</h5>
                            <p class="small flex-grow-1" style="color: var(--text-secondary);">
                                Nasi liwet gurih rempah serai teri medan, suwiran ayam kuah areh, sayur labu siam bumbu santan pedas gurih, dan tahu bacem.
                            </p>
                            <div class="d-flex justify-content-between align-items-center pt-3 border-top" style="border-color: var(--border) !important;">
                                <span class="fw-bold fs-5" style="color: var(--primary);">Rp 450.000</span>
                                <a href="https://wa.me/6281234567890?text=Halo%20Alfi%20Kitchen,%20saya%20mau%20pesan%20Tumpeng%20Nasi%20Liwet" target="_blank" class="btn btn-sm btn-custom-primary">Pesan</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 6. Tumpeng Karakter Ulang Tahun -->
                <div class="swiper-slide">
                    <div class="card menu-card h-100">
                        <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?auto=format&fit=crop&w=600&q=80" alt="Tumpeng Karakter">
                        <div class="card-body p-4 d-flex flex-column">
                            <span class="badge align-self-start mb-2" style="background: var(--surface); color: var(--primary-dark);">Spesial Anak</span>
                            <h5 class="fw-bold mb-1">Tumpeng Karakter Ultah</h5>
                            <p class="small flex-grow-1" style="color: var(--text-secondary);">
                                Nasi kuning/putih dibentuk karakter kartun favorit anak, nugget ayam homemade, sosis gulung mie, telur puyuh kecap, dan puding buah.
                            </p>
                            <div class="d-flex justify-content-between align-items-center pt-3 border-top" style="border-color: var(--border) !important;">
                                <span class="fw-bold fs-5" style="color: var(--primary);">Rp 380.000</span>
                                <a href="https://wa.me/6281234567890?text=Halo%20Alfi%20Kitchen,%20saya%20mau%20pesan%20Tumpeng%20Karakter" target="_blank" class="btn btn-sm btn-custom-primary">Pesan</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Tombol Navigasi & Titik Slider -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <!-- ==================== 2. SECTION NASI BOX (6 MENU) ==================== -->
    <section class="mb-5">
        <div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-2" style="border-color: var(--border) !important;">
            <div>
                <h3 class="fw-bold mb-0" style="color: var(--primary-dark);">Kategori Nasi Box</h3>
                <small style="color: var(--text-secondary);">Paling tepat untuk makan siang harian kantor, rapat, workshop, dan arisan</small>
            </div>
            <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">6 Pilihan</span>
        </div>

        <div class="swiper swiper-nasibox menu-slider-container position-relative">
            <div class="swiper-wrapper py-3">
                
                <!-- 1. Nasi Ayam Bawang Gurih -->
                <div class="swiper-slide">
                    <div class="card menu-card h-100">
                        <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?auto=format&fit=crop&w=600&q=80" alt="Nasi Ayam Bawang">
                        <div class="card-body p-4 d-flex flex-column">
                            <span class="badge align-self-start mb-2" style="background: var(--surface); color: var(--primary-dark);">Signature Box</span>
                            <h5 class="fw-bold mb-1">Nasi Ayam Bawang Gurih</h5>
                            <p class="small flex-grow-1" style="color: var(--text-secondary);">
                                Ayam goreng berbalut rempah bawang renyah, nasi pulen hangat, tumis buncis jagung manis, tahu goreng crispy, dan sambal bawang pedas.
                            </p>
                            <div class="d-flex justify-content-between align-items-center pt-3 border-top" style="border-color: var(--border) !important;">
                                <span class="fw-bold fs-5" style="color: var(--primary);">Rp 27.000</span>
                                <a href="https://wa.me/6281234567890?text=Halo%20Alfi%20Kitchen,%20saya%20mau%20pesan%20Nasi%20Ayam%20Bawang" target="_blank" class="btn btn-sm btn-custom-primary">Pesan</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 2. Nasi Goreng Spesial Sate -->
                <div class="swiper-slide">
                    <div class="card menu-card h-100">
                        <img src="https://images.unsplash.com/photo-1603133872878-684f208fb84b?auto=format&fit=crop&w=600&q=80" alt="Nasi Goreng Spesial">
                        <div class="card-body p-4 d-flex flex-column">
                            <span class="badge align-self-start mb-2" style="background: var(--surface); color: var(--primary-dark);">Menu Favorit</span>
                            <h5 class="fw-bold mb-1">Nasi Goreng Spesial Sate</h5>
                            <p class="small flex-grow-1" style="color: var(--text-secondary);">
                                Nasi goreng aroma smokey gurih suwir ayam, dilengkapi 2 tusuk sate ayam empuk bumbu kacang, telur ceplok mata sapi, acar, dan kerupuk.
                            </p>
                            <div class="d-flex justify-content-between align-items-center pt-3 border-top" style="border-color: var(--border) !important;">
                                <span class="fw-bold fs-5" style="color: var(--primary);">Rp 25.000</span>
                                <a href="https://wa.me/6281234567890?text=Halo%20Alfi%20Kitchen,%20saya%20mau%20pesan%20Nasi%20Goreng%20Spesial" target="_blank" class="btn btn-sm btn-custom-primary">Pesan</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 3. Nasi Box Rendang Daging -->
                <div class="swiper-slide">
                    <div class="card menu-card h-100">
                        <img src="https://images.unsplash.com/photo-1544025162-d76694265947?auto=format&fit=crop&w=600&q=80" alt="Nasi Rendang Sapi">
                        <div class="card-body p-4 d-flex flex-column">
                            <span class="badge align-self-start mb-2" style="background: var(--surface); color: var(--primary-dark);">Menu Premium</span>
                            <h5 class="fw-bold mb-1">Nasi Box Rendang Daging</h5>
                            <p class="small flex-grow-1" style="color: var(--text-secondary);">
                                Daging sapi empuk bumbu rendang rempah pekat Minang, sayur gulai daun singkong, sambal lado mudo ijo, dan rempeyek renyah.
                            </p>
                            <div class="d-flex justify-content-between align-items-center pt-3 border-top" style="border-color: var(--border) !important;">
                                <span class="fw-bold fs-5" style="color: var(--primary);">Rp 34.000</span>
                                <a href="https://wa.me/6281234567890?text=Halo%20Alfi%20Kitchen,%20saya%20mau%20pesan%20Nasi%20Box%20Rendang" target="_blank" class="btn btn-sm btn-custom-primary">Pesan</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 4. Nasi Box Ayam Bakar Madu -->
                <div class="swiper-slide">
                    <div class="card menu-card h-100">
                        <img src="https://images.unsplash.com/photo-1598515214211-89d3c73ae83b?auto=format&fit=crop&w=600&q=80" alt="Nasi Ayam Bakar Madu">
                        <div class="card-body p-4 d-flex flex-column">
                            <span class="badge align-self-start mb-2" style="background: var(--surface); color: var(--primary-dark);">Best Seller</span>
                            <h5 class="fw-bold mb-1">Nasi Box Ayam Bakar Madu</h5>
                            <p class="small flex-grow-1" style="color: var(--text-secondary);">
                                Ayam bakar bumbu manis gurih meresap, lalapan daun kemangi & timun, tempe bacem legit, dan sambal terasi terasi segar pedas.
                            </p>
                            <div class="d-flex justify-content-between align-items-center pt-3 border-top" style="border-color: var(--border) !important;">
                                <span class="fw-bold fs-5" style="color: var(--primary);">Rp 28.000</span>
                                <a href="https://wa.me/6281234567890?text=Halo%20Alfi%20Kitchen,%20saya%20mau%20pesan%20Nasi%20Ayam%20Bakar%20Madu" target="_blank" class="btn btn-sm btn-custom-primary">Pesan</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 5. Nasi Liwet Solo Komplit -->
                <div class="swiper-slide">
                    <div class="card menu-card h-100">
                        <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&w=600&q=80" alt="Nasi Liwet Komplit">
                        <div class="card-body p-4 d-flex flex-column">
                            <span class="badge align-self-start mb-2" style="background: var(--surface); color: var(--primary-dark);">Khas Nusantara</span>
                            <h5 class="fw-bold mb-1">Nasi Liwet Solo Komplit</h5>
                            <p class="small flex-grow-1" style="color: var(--text-secondary);">
                                Nasi gurih santan teri medan daun jeruk, suwiran ayam opor lembut, sayur jipang pedas santan, dan telur pindang legit.
                            </p>
                            <div class="d-flex justify-content-between align-items-center pt-3 border-top" style="border-color: var(--border) !important;">
                                <span class="fw-bold fs-5" style="color: var(--primary);">Rp 30.000</span>
                                <a href="https://wa.me/6281234567890?text=Halo%20Alfi%20Kitchen,%20saya%20mau%20pesan%20Nasi%20Liwet%20Solo" target="_blank" class="btn btn-sm btn-custom-primary">Pesan</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 6. Nasi Uduk Betawi Semur -->
                <div class="swiper-slide">
                    <div class="card menu-card h-100">
                        <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?auto=format&fit=crop&w=600&q=80" alt="Nasi Uduk Komplit">
                        <div class="card-body p-4 d-flex flex-column">
                            <span class="badge align-self-start mb-2" style="background: var(--surface); color: var(--primary-dark);">Khas Betawi</span>
                            <h5 class="fw-bold mb-1">Nasi Uduk Betawi Semur</h5>
                            <p class="small flex-grow-1" style="color: var(--text-secondary);">
                                Nasi uduk gurih daun pandan, semur tahu kentang kecap pekat gurih, bihun goreng kampung, sambal kacang kental, dan bawang goreng.
                            </p>
                            <div class="d-flex justify-content-between align-items-center pt-3 border-top" style="border-color: var(--border) !important;">
                                <span class="fw-bold fs-5" style="color: var(--primary);">Rp 26.000</span>
                                <a href="https://wa.me/6281234567890?text=Halo%20Alfi%20Kitchen,%20saya%20mau%20pesan%20Nasi%20Uduk%20Betawi" target="_blank" class="btn btn-sm btn-custom-primary">Pesan</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Tombol Navigasi & Titik Slider -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <!-- ==================== 3. SECTION SNACK BOX (6 MENU) ==================== -->
    <section class="mb-4">
        <div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-2" style="border-color: var(--border) !important;">
            <div>
                <h3 class="fw-bold mb-0" style="color: var(--primary-dark);">Kategori Snack Box</h3>
                <small style="color: var(--text-secondary);">Pilihan kudapan manis & asin untuk jeda coffee break rapat atau seminar</small>
            </div>
            <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">6 Pilihan</span>
        </div>

        <div class="swiper swiper-snackbox menu-slider-container position-relative">
            <div class="swiper-wrapper py-3">
                
                <!-- 1. Snack Box Regular Hemat -->
                <div class="swiper-slide">
                    <div class="card menu-card h-100">
                        <img src="https://images.unsplash.com/photo-1509440159596-0249088772ff?auto=format&fit=crop&w=600&q=80" alt="Snack Hemat">
                        <div class="card-body p-4 d-flex flex-column">
                            <span class="badge align-self-start mb-2" style="background: var(--surface); color: var(--primary-dark);">Paket 2 Kue</span>
                            <h5 class="fw-bold mb-1">Snack Box Regular Hemat</h5>
                            <p class="small flex-grow-1" style="color: var(--text-secondary);">
                                Berisi 1 lemper ayam pulen isi suwir gurih, 1 bolu gulung selai nanas, tisu, dan air mineral kemasan gelas higienis.
                            </p>
                            <div class="d-flex justify-content-between align-items-center pt-3 border-top" style="border-color: var(--border) !important;">
                                <span class="fw-bold fs-5" style="color: var(--primary);">Rp 12.000</span>
                                <a href="https://wa.me/6281234567890?text=Halo%20Alfi%20Kitchen,%20saya%20mau%20pesan%20Snack%20Box%20Hemat" target="_blank" class="btn btn-sm btn-custom-primary">Pesan</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 2. Snack Box Event VIP -->
                <div class="swiper-slide">
                    <div class="card menu-card h-100">
                        <img src="https://images.unsplash.com/photo-1558961363-fa8fdf82db35?auto=format&fit=crop&w=600&q=80" alt="Snack Premium">
                        <div class="card-body p-4 d-flex flex-column">
                            <span class="badge align-self-start mb-2" style="background: var(--surface); color: var(--primary-dark);">Paket 3 Kue VIP</span>
                            <h5 class="fw-bold mb-1">Snack Box Event VIP</h5>
                            <p class="small flex-grow-1" style="color: var(--text-secondary);">
                                Pastel ayam telur renyah, pie buah segar vla vanila lembut, bolu gulung keju parut melimpah, dan air mineral botol 330ml.
                            </p>
                            <div class="d-flex justify-content-between align-items-center pt-3 border-top" style="border-color: var(--border) !important;">
                                <span class="fw-bold fs-5" style="color: var(--primary);">Rp 18.000</span>
                                <a href="https://wa.me/6281234567890?text=Halo%20Alfi%20Kitchen,%20saya%20mau%20pesan%20Snack%20Box%20VIP" target="_blank" class="btn btn-sm btn-custom-primary">Pesan</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 3. Jajanan Pasar Tradisional -->
                <div class="swiper-slide">
                    <div class="card menu-card h-100">
                        <img src="https://images.unsplash.com/photo-1579372786545-d24232daf58c?auto=format&fit=crop&w=600&q=80" alt="Snack Tradisional">
                        <div class="card-body p-4 d-flex flex-column">
                            <span class="badge align-self-start mb-2" style="background: var(--surface); color: var(--primary-dark);">Nusantara Taste</span>
                            <h5 class="fw-bold mb-1">Jajanan Pasar Tradisional</h5>
                            <p class="small flex-grow-1" style="color: var(--text-secondary);">
                                Kue ku ketan merah isi kacang hijau, tahu bakso sapi semarang kukus padat, bolu pandan kukus kelapa, dan air mineral.
                            </p>
                            <div class="d-flex justify-content-between align-items-center pt-3 border-top" style="border-color: var(--border) !important;">
                                <span class="fw-bold fs-5" style="color: var(--primary);">Rp 16.000</span>
                                <a href="https://wa.me/6281234567890?text=Halo%20Alfi%20Kitchen,%20saya%20mau%20pesan%20Jajanan%20Pasar" target="_blank" class="btn btn-sm btn-custom-primary">Pesan</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 4. Pastry & Modern Bakery Box -->
                <div class="swiper-slide">
                    <div class="card menu-card h-100">
                        <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?auto=format&fit=crop&w=600&q=80" alt="Snack Pastry">
                        <div class="card-body p-4 d-flex flex-column">
                            <span class="badge align-self-start mb-2" style="background: var(--surface); color: var(--primary-dark);">Modern Bakery</span>
                            <h5 class="fw-bold mb-1">Pastry & Coffee Break</h5>
                            <p class="small flex-grow-1" style="color: var(--text-secondary);">
                                Mini croissant isi smoked beef keju gurih renyah, choux craquelin cokelat lumer, dan air mineral botol mini.
                            </p>
                            <div class="d-flex justify-content-between align-items-center pt-3 border-top" style="border-color: var(--border) !important;">
                                <span class="fw-bold fs-5" style="color: var(--primary);">Rp 20.000</span>
                                <a href="https://wa.me/6281234567890?text=Halo%20Alfi%20Kitchen,%20saya%20mau%20pesan%20Pastry%20Box" target="_blank" class="btn btn-sm btn-custom-primary">Pesan</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 5. Snack Box Gurih / Savory Lovers -->
                <div class="swiper-slide">
                    <div class="card menu-card h-100">
                        <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&w=600&q=80" alt="Snack Savory">
                        <div class="card-body p-4 d-flex flex-column">
                            <span class="badge align-self-start mb-2" style="background: var(--surface); color: var(--primary-dark);">Spesial Gurih</span>
                            <h5 class="fw-bold mb-1">Snack Box Savory Delight</h5>
                            <p class="small flex-grow-1" style="color: var(--text-secondary);">
                                Risoles mayo smoked beef telur leleh, martabak telur mini kulit krispi, lemper bakar ayam, plus saus sambal sachet.
                            </p>
                            <div class="d-flex justify-content-between align-items-center pt-3 border-top" style="border-color: var(--border) !important;">
                                <span class="fw-bold fs-5" style="color: var(--primary);">Rp 17.500</span>
                                <a href="https://wa.me/6281234567890?text=Halo%20Alfi%20Kitchen,%20saya%20mau%20pesan%20Snack%20Savory" target="_blank" class="btn btn-sm btn-custom-primary">Pesan</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 6. Snack Box Sweet Dessert -->
                <div class="swiper-slide">
                    <div class="card menu-card h-100">
                        <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?auto=format&fit=crop&w=600&q=80" alt="Snack Dessert">
                        <div class="card-body p-4 d-flex flex-column">
                            <span class="badge align-self-start mb-2" style="background: var(--surface); color: var(--primary-dark);">Spesial Manis</span>
                            <h5 class="fw-bold mb-1">Sweet Dessert Box</h5>
                            <p class="small flex-grow-1" style="color: var(--text-secondary);">
                                Fudgy brownies almond panggang legit, eclair cream vanilla karamel, cup fruit jelly segar, dan air mineral.
                            </p>
                            <div class="d-flex justify-content-between align-items-center pt-3 border-top" style="border-color: var(--border) !important;">
                                <span class="fw-bold fs-5" style="color: var(--primary);">Rp 19.000</span>
                                <a href="https://wa.me/6281234567890?text=Halo%20Alfi%20Kitchen,%20saya%20mau%20pesan%20Sweet%20Dessert%20Box" target="_blank" class="btn btn-sm btn-custom-primary">Pesan</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Tombol Navigasi & Titik Slider -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

</div>
@endsection

@section('scripts')
<script>
    const createMenuSlider = (selector) => {
        const swiper = new Swiper(selector, {
            slidesPerView: 3,         // Tepat 3 card di desktop
            centeredSlides: true,     // Card aktif pas di tengah
            spaceBetween: 25,
            loop: true,               // <-- Looping terus tanpa batas!
            watchSlidesProgress: true,
            pagination: {
                el: selector + ' .swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: selector + ' .swiper-button-next',
                prevEl: selector + ' .swiper-button-prev',
            },
            breakpoints: {
                0: {
                    slidesPerView: 1.2,
                    spaceBetween: 15,
                    centeredSlides: true,
                },
                768: {
                    slidesPerView: 2.2,
                    spaceBetween: 20,
                    centeredSlides: true,
                },
                992: {
                    slidesPerView: 3,
                    spaceBetween: 25,
                    centeredSlides: true,
                }
            }
        });

        // Kunci: Geser langsung ke slide ke-3 (indeks 2) saat pertama kali selesai dimuat
        // Parameter: (index, speed, runCallbacks) -> speed 0 biar instan tanpa animasi geser
        swiper.slideToLoop(2, 0, false);

        return swiper;
    };

    createMenuSlider('.swiper-tumpeng');
    createMenuSlider('.swiper-nasibox');
    createMenuSlider('.swiper-snackbox');
</script>
@endsection