@extends('layouts.main')

@section('content')

<!-- HEADER HALAMAN -->
<section class="py-5 bg-sage-light text-center">
    <div class="container py-3">
        <h1 class="fw-bold mb-2">Tentang Alfi Kitchen</h1>
        <p class="text-muted mb-0">Komitmen kami menyajikan hidangan lezat, sehat, dan berkualitas untuk Anda</p>
    </div>
</section>

<!-- CERITA KAMI -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="row align-items-center gy-4">
            <div class="col-lg-6">
                <img src="{{ asset('images/about-kitchen.jpg') }}"
                     alt="Dapur Alfi Kitchen"
                     class="img-fluid rounded-4 shadow-sm"
                     onerror="this.src='https://images.unsplash.com/photo-1556910103-1c02745aae4d?q=80&w=800'">
            </div>
            <div class="col-lg-6">
                <span class="badge bg-sage-light text-sage px-3 py-2 rounded-pill fw-semibold mb-3">Cerita Kami</span>
                <h2 class="fw-bold text-dark mb-3">Berawal dari Cita Rasa Rumahan yang Otentik</h2>
                <p class="text-muted">
                    Alfi Kitchen hadir dari kecintaan kami terhadap masakan rumahan yang kaya akan bumbu rempah Nusantara. Kami percaya bahwa makanan yang lezat berawal dari bahan baku yang segar dan proses memasak yang higienis.
                </p>
                <p class="text-muted">
                    Sejak berdiri, kami telah melayani berbagai kebutuhan catering, mulai dari konsumsi harian keluarga, konsumsi makan siang kantor, hingga acara syukuran dan prasmanan besar.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- STANDAR KUALITAS (VALUABLE POINTS) -->
<section class="py-5 bg-sage-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Mengapa Memilih Alfi Kitchen?</h2>
            <p class="text-muted">Prinsip utama kami dalam menjaga kualitas pelayanan</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 p-4 rounded-4 shadow-sm text-center">
                    <div class="mx-auto mb-3 text-sage">
                        <i class="bi bi-shield-check display-5"></i>
                    </div>
                    <h5 class="fw-bold">Bahan Segar & Halal</h5>
                    <p class="text-muted small mb-0">Setiap bahan dibeli dan diolah pada hari yang sama untuk menjamin kesegaran dan kehalalannya.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 p-4 rounded-4 shadow-sm text-center">
                    <div class="mx-auto mb-3 text-sage">
                        <i class="bi bi-person-heart display-5"></i>
                    </div>
                    <h5 class="fw-bold">Koki Berpengalaman</h5>
                    <p class="text-muted small mb-0">Tim dapur kami terlatih dalam mengolah resep dengan standar rasa dan kebersihan yang konsisten.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 p-4 rounded-4 shadow-sm text-center">
                    <div class="mx-auto mb-3 text-sage">
                        <i class="bi bi-clock-check display-5"></i>
                    </div>
                    <h5 class="fw-bold">Pengiriman Tepat Waktu</h5>
                    <p class="text-muted small mb-0">Pesanan dikemas rapi dan dikirim tepat waktu sesuai kesepakatan acara Anda.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- GALERI DOKUMENTASI -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Dokumentasi & Galeri</h2>
            <p class="text-muted">Intip suasana penyiapan makanan dan penyajian catering kami</p>
        </div>
        <div class="row g-3">
            <div class="col-md-4 col-6">
                <img src="{{ asset('images/galeri-1.jpg') }}" class="img-fluid rounded-4 shadow-sm w-100" style="height: 220px; object-fit: cover;" onerror="this.src='https://images.unsplash.com/photo-1512621776951-a57141f2eefd?q=80&w=600'">
            </div>
            <div class="col-md-4 col-6">
                <img src="{{ asset('images/galeri-2.jpg') }}" class="img-fluid rounded-4 shadow-sm w-100" style="height: 220px; object-fit: cover;" onerror="this.src='https://images.unsplash.com/photo-1555244162-803834f70033?q=80&w=600'">
            </div>
            <div class="col-md-4 col-6">
                <img src="{{ asset('images/galeri-3.jpg') }}" class="img-fluid rounded-4 shadow-sm w-100" style="height: 220px; object-fit: cover;" onerror="this.src='https://images.unsplash.com/photo-1509440159596-0249088772ff?q=80&w=600'">
            </div>
        </div>
    </div>
</section>

@endsection