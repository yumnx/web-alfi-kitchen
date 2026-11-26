<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Alfi Kitchen</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;0,800;1,600&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <style>
        :root {
            --ak-crimson: #7B2809;
            --ak-terracotta: #9E3710;
            --ak-flame: #E4701D;
            --ak-saffron: #F3A71C;
            --ak-cream: #F8EDE3;
            --ak-espresso: #1E1106;
        }

        @keyframes floatPlate {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-14px) rotate(4deg); }
        }
        @keyframes leafDrift {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-12px) rotate(12deg); }
        }
        @keyframes slideInForm {
            0% { opacity: 0; transform: translateY(28px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        html, body {
            min-height: 100vh;
            margin: 0;
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--ak-cream);
            color: var(--ak-espresso);
            overflow-x: hidden;
        }

        .auth-split-stage {
            min-height: 100vh;
            display: flex;
            flex-wrap: wrap;
        }

        /* Sisi Kiri: Panggung Terakota Pekat dengan Piring Melayang */
        .auth-visual-side {
            position: relative;
            background: radial-gradient(circle at 35% 40%, #B84214 0%, #7B2809 58%, #3A0F02 100%);
            color: #FFF9F2;
            padding: 2.75rem 3rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow: hidden;
        }
        .auth-visual-watermark {
            position: absolute;
            top: 48%;
            left: -6%;
            transform: translateY(-50%) rotate(-90deg);
            font-family: 'Playfair Display', serif;
            font-size: 5.5rem;
            font-weight: 900;
            letter-spacing: 0.1em;
            color: rgba(255, 249, 242, 0.05);
            pointer-events: none;
            user-select: none;
            white-space: nowrap;
        }
        .auth-plate-showcase {
            position: relative;
            width: 290px;
            height: 290px;
            margin: 1.5rem auto;
            border-radius: 50%;
            padding: 10px;
            background: linear-gradient(135deg, rgba(243, 167, 28, 0.7), rgba(255, 249, 242, 0.18));
            box-shadow: 0 30px 60px rgba(15, 4, 0, 0.65);
            animation: floatPlate 5.5s ease-in-out infinite;
            z-index: 2;
        }
        .auth-plate-showcase img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }
        .auth-herb {
            position: absolute;
            pointer-events: none;
            animation: leafDrift 4.5s ease-in-out infinite;
            z-index: 2;
        }
        /* Pemisah Lengkung Organik ke Sisi Form */
        .auth-wave-edge {
            position: absolute;
            top: 0;
            right: -1px;
            height: 100%;
            width: 65px;
            z-index: 3;
            pointer-events: none;
        }

        /* Sisi Kanan: Form Editorial Minimalis */
        .auth-form-side {
            background-color: var(--ak-cream);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 3rem 1.75rem;
        }
        .auth-form-container {
            width: 100%;
            max-width: 420px;
            animation: slideInForm 0.8s cubic-bezier(0.22, 1, 0.36, 1) forwards;
        }

        /* Toggle Pil Login / Register */
        .auth-pill-switcher {
            display: inline-flex;
            background-color: rgba(141, 56, 15, 0.1);
            border-radius: 999px;
            padding: 5px;
            margin-bottom: 1.75rem;
        }
        .auth-pill-switcher a {
            padding: 8px 26px;
            border-radius: 999px;
            font-size: 0.88rem;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.25s ease;
        }
        .auth-pill-switcher a.active {
            background: linear-gradient(135deg, #E4701D 0%, #B84214 100%);
            color: #FFF9F2;
            box-shadow: 0 6px 16px rgba(184, 66, 20, 0.28);
        }
        .auth-pill-switcher a.inactive {
            color: var(--ak-crimson);
        }

        /* Input Garis Bawah Editorial (Tanpa Kotak Kaku) */
        .editorial-field-group {
            position: relative;
            margin-bottom: 1.5rem;
        }
        .editorial-field-label {
            font-size: 0.76rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--ak-terracotta);
            margin-bottom: 4px;
            display: block;
        }
        .editorial-underline-input {
            width: 100%;
            border: none;
            border-bottom: 2px solid rgba(123, 40, 9, 0.25);
            background: transparent;
            padding: 10px 4px;
            font-size: 0.98rem;
            color: var(--ak-espresso);
            border-radius: 0;
            transition: border-color 0.25s ease;
        }
        .editorial-underline-input:focus {
            outline: none;
            border-bottom-color: var(--ak-flame);
        }
        .editorial-underline-input::placeholder {
            color: rgba(30, 17, 6, 0.38);
        }

        .btn-auth-submit {
            background: linear-gradient(135deg, #E4701D 0%, #B84214 100%);
            color: #FFF9F2;
            font-weight: 700;
            border: none;
            border-radius: 999px;
            padding: 13px 34px;
            box-shadow: 0 12px 26px rgba(184, 66, 20, 0.28);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }
        .btn-auth-submit:hover {
            transform: translateY(-2px);
            color: #FFF9F2;
            box-shadow: 0 16px 32px rgba(184, 66, 20, 0.38);
        }

        .demo-hint-strip {
            margin-top: 2rem;
            padding-top: 1.25rem;
            border-top: 1.5px dashed rgba(123, 40, 9, 0.22);
            font-size: 0.82rem;
            color: #5C4328;
        }
    </style>
</head>
<body>

<div class="container-fluid p-0">
    <div class="row g-0 auth-split-stage">
        <!-- SISI KIRI: BRAND & SAJIAN MELAYANG -->
        <div class="col-lg-6 auth-visual-side">
            

            <!-- Daun & Cabai Melayang -->
            <svg class="auth-herb d-none d-md-block" style="top: 18%; right: 16%; width: 64px;" viewBox="0 0 64 64" fill="none">
                <path d="M10 52C26 48 48 30 54 10C34 16 16 38 10 52Z" fill="#6BBF59"/>
                <path d="M12 50L50 14" stroke="#3D7A31" stroke-width="2.5" stroke-linecap="round"/>
            </svg>
            <svg class="auth-herb d-none d-md-block" style="bottom: 22%; left: 12%; width: 62px; animation-delay: 1s;" viewBox="0 0 64 64" fill="none">
                <path d="M14 46C22 24 38 14 52 14C50 28 40 44 18 52C14 53 12 50 14 46Z" fill="#E63926"/>
            </svg>

            <!-- Top Bar: Kembali ke Beranda -->
            <div class="d-flex justify-content-between align-items-center position-relative" style="z-index: 4;">
                <a href="{{ route('home') }}" class="text-decoration-none fw-semibold small d-inline-flex align-items-center" style="color: #FFF9F2;">
                    <i class="bi bi-arrow-left me-2"></i>Kembali ke Beranda
                </a>
                <span class="fw-bold fs-5" style="font-family: 'Playfair Display', serif; color: var(--ak-saffron);">
                    <i class="bi bi-egg-fried me-1"></i>Alfi Kitchen
                </span>
            </div>

            <!-- Piring Hidangan Melayang di Tengah -->
            <div class="text-center my-auto position-relative" style="z-index: 4;">
                <div class="auth-plate-showcase">
                    <img src="https://images.unsplash.com/photo-1541544741938-0af808871cc0?q=80&w=800" alt="Sajian Alfi Kitchen">
                </div>
                <h2 class="fw-bold mt-3 mb-2" style="font-family: 'Playfair Display', serif; color: #FFF9F2;">
                    Kehangatan Masakan <span style="color: var(--ak-saffron); font-style: italic;">Rumahan</span>
                </h2>
                <p class="small mx-auto mb-0" style="max-width: 390px; color: rgba(255, 249, 242, 0.82);">
                    Masuk untuk memesan paket katering acara, memantau riwayat pesanan, atau membagikan ulasan rasa bersama kami.
                </p>
            </div>


            <!-- Kurva Pemisah Organik di Sisi Kanan (Desktop) -->
            <svg class="auth-wave-edge d-none d-lg-block" viewBox="0 0 80 800" fill="none" preserveAspectRatio="none">
                <path d="M80,0 C15,200 75,380 20,580 C-10,690 45,760 80,800 L80,0 Z" fill="#F8EDE3"/>
            </svg>
        </div>

        <!-- SISI KANAN: FORM LOGIN -->
        <div class="col-lg-6 auth-form-side">
            <div class="auth-form-container">
                <div class="auth-pill-switcher">
                    <a href="{{ route('login') }}" class="active">Login</a>
                    <a href="{{ route('register') }}" class="inactive">Registration</a>
                </div>

                <h1 class="display-6 fw-bold mb-1" style="font-family: 'Playfair Display', serif; color: var(--ak-espresso);">
                    Selamat Datang
                </h1>
                <p class="text-muted small mb-4">Silakan masuk ke akun pelanggan Alfi Kitchen Anda.</p>

                <!-- Pesan Sukses Setelah Registrasi / Logout -->
                @if (session('success'))
                    <div class="alert alert-success border-0 rounded-4 small py-2 px-3 mb-4">
                        <i class="bi bi-check-circle-fill me-1"></i> {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger border-0 rounded-4 small py-2 px-3 mb-4">
                        <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $errors->first() }}
                    </div>
                @endif

                <form action="{{ route('login.store') }}" method="POST">
                    @csrf

                    <div class="editorial-field-group">
                        <label for="email" class="editorial-field-label">Alamat Email</label>
                        <input type="email"
                               id="email"
                               name="email"
                               value="{{ old('email') }}"
                               class="editorial-underline-input"
                               placeholder="nama@email.com"
                               required
                               autofocus>
                    </div>

                    <div class="editorial-field-group">
                        <label for="password" class="editorial-field-label">Password</label>
                        <input type="password"
                               id="password"
                               name="password"
                               class="editorial-underline-input"
                               placeholder="Masukkan kata sandi Anda"
                               required>
                    </div>

                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mt-4">
                        <a href="{{ route('register') }}" class="small fw-semibold text-decoration-none" style="color: var(--ak-crimson);">
                            Belum punya akun? Daftar
                        </a>
                        <button type="submit" class="btn btn-auth-submit">
                            Masuk Sekarang <i class="bi bi-arrow-right ms-2"></i>
                        </button>
                    </div>
                </form>

                <div class="demo-hint-strip">
                    <span class="fw-bold d-block mb-1" style="color: var(--ak-crimson);">Akun Simulasi Pelanggan:</span>
                    Email: <strong>pelanggan@alfikitchen.id</strong> &nbsp;|&nbsp; Password: <strong>password123</strong>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>