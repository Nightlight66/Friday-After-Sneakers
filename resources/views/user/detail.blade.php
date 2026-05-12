<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $sepatu->nama_sepatu }} - Friday After Sneakers</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@400;700;900&family=Bebas+Neue&display=swap" rel="stylesheet">

    <style>
        /* ── CSS Variables ─────────────────────────── */
        :root {
            --fas-black:   #0a0a0a;
            --fas-dark:    #111111;
            --fas-surface: #1a1a1a;
            --fas-border:  #2a2a2a;
            --fas-white:   #f5f5f5;
            --fas-muted:   #888888;
            --fas-orange:  #ff5c00;

            --fas-font-display: 'Bebas Neue', sans-serif;
            --fas-font-cond:    'Barlow Condensed', sans-serif;
        }

        body {
            background: var(--fas-black);
            color: var(--fas-white);
            font-family: var(--fas-font-cond), sans-serif;
        }

        /* ── Buttons ───────────────────────────────── */
        .btn-fas-orange {
            background: var(--fas-orange);
            color: #fff;
            border: 1px solid var(--fas-orange);
            font-family: var(--fas-font-cond);
            font-weight: 700;
            letter-spacing: .08em;
            text-transform: uppercase;
            border-radius: 0;
            transition: background .2s, color .2s;
        }
        .btn-fas-orange:hover {
            background: transparent;
            color: var(--fas-orange);
        }
        .btn-fas-outline {
            background: transparent;
            color: var(--fas-white);
            border: 1px solid var(--fas-border);
            font-family: var(--fas-font-cond);
            font-weight: 700;
            letter-spacing: .08em;
            text-transform: uppercase;
            border-radius: 0;
            transition: border-color .2s, color .2s;
        }
        .btn-fas-outline:hover {
            border-color: var(--fas-orange);
            color: var(--fas-orange);
        }

        /* ── Navbar ────────────────────────────────── */
        .fas-navbar {
            background: rgba(10,10,10,.95);
            border-bottom: 1px solid var(--fas-border);
            backdrop-filter: blur(8px);
        }
        .fas-navbar .navbar-brand {
            font-family: var(--fas-font-display);
            font-size: 1.4rem;
            letter-spacing: .05em;
            color: var(--fas-white) !important;
        }
        .fas-navbar .nav-link {
            font-family: var(--fas-font-cond);
            font-weight: 700;
            letter-spacing: .1em;
            text-transform: uppercase;
            font-size: .85rem;
            color: var(--fas-muted) !important;
            transition: color .2s;
        }
        .fas-navbar .nav-link:hover { color: var(--fas-white) !important; }

        /* ── Breadcrumb ────────────────────────────── */
        .breadcrumb-item a {
            color: var(--fas-muted);
            text-decoration: none;
            font-family: var(--fas-font-cond);
            font-size: .82rem;
            letter-spacing: .1em;
            text-transform: uppercase;
            transition: color .2s;
        }
        .breadcrumb-item a:hover { color: var(--fas-orange); }
        .breadcrumb-item.active {
            color: var(--fas-white);
            font-family: var(--fas-font-cond);
            font-size: .82rem;
            letter-spacing: .1em;
            text-transform: uppercase;
        }
        .breadcrumb-item + .breadcrumb-item::before {
            color: var(--fas-border);
            content: "›";
        }

        /* ── Image Panel ───────────────────────────── */
        .img-panel {
            background: var(--fas-surface);
            border-right: 1px solid var(--fas-border);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2.5rem;
            position: relative;
            overflow: hidden;
            min-height: 500px;
        }
        .img-panel::before {
            content: '';
            position: absolute;
            inset: 0;
            background: repeating-linear-gradient(
                -45deg,
                transparent, transparent 40px,
                rgba(255,92,0,.025) 40px, rgba(255,92,0,.025) 41px
            );
            pointer-events: none;
        }
        .img-panel img {
            width: 100%;
            max-height: 460px;
            object-fit: cover;
            position: relative;
            z-index: 1;
        }

        /* ── Info Panel ────────────────────────────── */
        .info-panel {
            background: var(--fas-dark);
            border: 1px solid var(--fas-border);
            padding: 2.5rem 2rem;
        }

        /* ── Size Selector ─────────────────────────── */
        .btn-check:checked + .size-btn {
            background: transparent !important;
            border-color: var(--fas-border) !important;
            color: var(--fas-white) !important;
        }
        .size-btn {
            background: transparent;
            border: 1px solid var(--fas-border);
            color: var(--fas-white);
            font-family: var(--fas-font-cond);
            font-weight: 700;
            font-size: .9rem;
            letter-spacing: .08em;
            border-radius: 0;
            min-width: 56px;
            transition: border-color .2s, color .2s;
        }
        .size-btn:hover {
            border-color: var(--fas-orange);
            color: var(--fas-orange);
        }

        /* ── Stok Badge ────────────────────────────── */
        .stok-tag {
            display: inline-block;
            font-family: var(--fas-font-cond);
            font-size: .75rem;
            font-weight: 700;
            letter-spacing: .12em;
            text-transform: uppercase;
            padding: .3rem .8rem;
            border-radius: 0;
        }

        /* ── Divider ───────────────────────────────── */
        .fas-divider {
            border: none;
            border-top: 1px solid var(--fas-border);
            margin: 1.5rem 0;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .fade-up { animation: fadeUp .6s ease both; }
    </style>
</head>
<body>

    {{-- ── NAVBAR ─────────────────────────────────── --}}
    @include('layout.navbar')

    {{-- Flash Messages --}}
    @if(session('error'))
        <div class="alert alert-danger rounded-0 mb-0">{{ session('error') }}</div>
    @endif

    <div class="container py-5">

        {{-- ── BREADCRUMB ──────────────────────────── --}}
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('user.home') }}">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('user.katalog') }}">Katalog</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ $sepatu->nama_sepatu }}
                </li>
            </ol>
        </nav>

        {{-- ── DETAIL CARD ──────────────────────────── --}}
        <div class="row g-0 fade-up" style="border:1px solid var(--fas-border);">

            {{-- Sisi Kiri: Gambar --}}
            <div class="col-md-6 img-panel">
                @if($sepatu->gambar_sepatu)
                    <img src="{{ asset('storage/' . $sepatu->gambar_sepatu) }}"
                         alt="{{ $sepatu->nama_sepatu }}">
                @else
                    <div style="width:100%;aspect-ratio:1/1;background:var(--fas-surface);
                                display:flex;align-items:center;justify-content:center;">
                        <i class="bi bi-image" style="font-size:4rem;color:var(--fas-border);"></i>
                    </div>
                @endif
            </div>

            {{-- Sisi Kanan: Info --}}
            <div class="col-md-6 info-panel">

                {{-- Kategori Label --}}
                @if($sepatu->kategori)
                    <div style="font-family:var(--fas-font-cond);font-size:.78rem;font-weight:700;
                                letter-spacing:.2em;text-transform:uppercase;color:var(--fas-orange);
                                margin-bottom:.5rem;">
                        {{ $sepatu->kategori->nama_kategori }}
                    </div>
                @endif

                {{-- Nama & Harga --}}
                <h1 style="font-family:var(--fas-font-display);font-size:clamp(2rem,4vw,3rem);
                            color:var(--fas-white);line-height:.95;letter-spacing:-.01em;margin-bottom:.8rem;">
                    {{ $sepatu->nama_sepatu }}
                </h1>
                <div style="font-family:var(--fas-font-display);font-size:1.8rem;
                             color:var(--fas-orange);margin-bottom:1.5rem;">
                    Rp {{ number_format($sepatu->harga_sepatu, 0, ',', '.') }}
                </div>

                <hr class="fas-divider">

                {{-- Deskripsi --}}
                <div style="margin-bottom:1.5rem;">
                    <div style="font-family:var(--fas-font-cond);font-size:.78rem;font-weight:700;
                                letter-spacing:.15em;text-transform:uppercase;color:var(--fas-muted);
                                margin-bottom:.6rem;">Deskripsi Produk</div>
                    <p style="color:var(--fas-muted);line-height:1.8;font-size:.95rem;margin:0;">
                        {{ $sepatu->deskripsi_sepatu }}
                    </p>
                </div>

                <hr class="fas-divider">

                {{-- Pilih Ukuran --}}
                <form action="#" method="POST">
                    @csrf
                    <div style="font-family:var(--fas-font-cond);font-size:.78rem;font-weight:700;
                                letter-spacing:.15em;text-transform:uppercase;color:var(--fas-muted);
                                margin-bottom:.8rem;">Pilih Ukuran</div>
                    <div class="d-flex flex-wrap gap-2 mb-3">
                        @foreach($sepatu->daftar_ukuran as $ukuran)
                            <input type="radio" class="btn-check" name="ukuran_sepatu"
                                id="uk_{{ $ukuran }}" value="{{ $ukuran }}">
                            <label class="size-btn btn btn-outline-secondary px-3 py-2" for="uk_{{ $ukuran }}">
                                {{ $ukuran }}
                            </label>
                        @endforeach
                    </div>
                    <div class="d-flex align-items-center gap-2 mb-4">
                        @if($sepatu->jumlah_stok <= 0)
                            <span class="stok-tag bg-danger">Stok Habis</span>
                        @elseif($sepatu->jumlah_stok <= 5)
                            <span class="stok-tag bg-warning text-dark">Sisa {{ $sepatu->jumlah_stok }} pcs</span>
                        @else
                            <span class="stok-tag bg-success">Tersedia</span>
                        @endif
                        <span style="color:var(--fas-muted);font-size:.85rem;">
                            Total Stok: {{ $sepatu->jumlah_stok }} pcs
                        </span>
                    </div>

                    <hr class="fas-divider">

                    {{-- CTA Buttons --}}
                    @if($sepatu->jumlah_stok <= 0)
                    <div class="d-grid gap-2">
                        <a href={{ route('user.katalog') }} class="btn btn-fas-orange btn-lg" style="font-size:1rem;">
                            <i class="bi me-2"></i>Barang Habis
                        </a>
                    @else
                    <div class="d-grid gap-2">
                        <a href="https://wa.me/6282143690101?text=Halo,%20saya%20ingin%20membeli%20{{ urlencode($sepatu->nama_sepatu) }}"
                           target="_blank"
                           class="btn btn-fas-orange btn-lg"
                           style="font-size:1rem;">
                            <i class="bi bi-whatsapp me-2"></i>Beli via WhatsApp
                        </a>
                    @endif
                        <a href="{{ route('user.katalog') }}" class="btn btn-fas-outline"
                           style="font-size:.9rem;">
                            <i class="bi bi-arrow-left me-1"></i>Kembali ke Katalog
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <footer>
        @include('layout.footer')
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>