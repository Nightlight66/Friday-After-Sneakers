<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friday After Sneakers</title>
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

        /* ── Section Labels ────────────────────────── */
        .section-label {
            font-family: var(--fas-font-cond);
            font-size: .78rem;
            font-weight: 700;
            letter-spacing: .2em;
            text-transform: uppercase;
            color: var(--fas-orange);
            margin-bottom: .5rem;
        }
        .section-title {
            font-family: var(--fas-font-display);
            font-size: clamp(2.2rem, 5vw, 3.5rem);
            color: var(--fas-white);
            line-height: .95;
            letter-spacing: -.01em;
        }

        /* ── Product Card ──────────────────────────── */
        .product-card {
            background: var(--fas-surface);
            border: 1px solid var(--fas-border);
            transition: border-color .25s, transform .25s;
            overflow: hidden;
        }
        .product-card:hover {
            border-color: var(--fas-orange);
            transform: translateY(-4px);
        }
        .product-card img {
            width: 100%;
            aspect-ratio: 1/1;
            object-fit: cover;
            display: block;
            transition: transform .4s;
        }
        .product-card:hover img { transform: scale(1.04); }
        .product-card .card-body { padding: 1rem; }
        .product-brand {
            font-size: .72rem;
            letter-spacing: .15em;
            text-transform: uppercase;
            color: var(--fas-orange);
            font-weight: 700;
        }
        .product-name {
            font-family: var(--fas-font-display);
            font-size: 1.15rem;
            color: var(--fas-white);
            line-height: 1.1;
            margin: .3rem 0;
        }
        .product-price {
            font-family: var(--fas-font-cond);
            font-size: 1rem;
            font-weight: 700;
            color: var(--fas-white);
        }
        .stok-badge { font-size: .7rem; border-radius: 0; }

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
        .fas-navbar .nav-link:hover,
        .fas-navbar .nav-link.active { color: var(--fas-white) !important; }

        /* ── Animations ────────────────────────────── */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(30px); }
            to   { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

    {{-- ── NAVBAR ─────────────────────────────────── --}}
    <nav class="navbar navbar-expand-lg fas-navbar sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Friday After Sneakers</a>
            <button class="navbar-toggler border-secondary" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center gap-1">
                    <li class="nav-item"><a class="nav-link active" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="">Katalog</a></li>
                    @auth
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit"
                                    class="nav-link btn btn-fas-orange btn-sm ms-2 px-3 border-0"
                                    style="font-size:.78rem;">
                                    {{ Auth::user()->nama_lengkap }}
                                    <i class="bi bi-box-arrow-right ms-1"></i>
                                </button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="btn btn-fas-outline btn-sm ms-2 px-3" href="{{ route('login') }}"
                               style="font-size:.78rem;">
                                <i class="bi bi-box-arrow-in-right me-1"></i>Login
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    {{-- Flash Messages --}}
    @if(session('error'))
        <div class="alert alert-danger rounded-0 mb-0">{{ session('error') }}</div>
    @endif
    @if(session('success'))
        <div class="alert alert-success rounded-0 mb-0">{{ session('success') }}</div>
    @endif

    {{-- ── HERO ─────────────────────────────────────── --}}
    <section class="position-relative overflow-hidden"
             style="min-height:92vh;display:flex;align-items:center;background:var(--fas-black);">

        {{-- BG Noise Texture --}}
        <div style="position:absolute;inset:0;opacity:.04;
                    background-image:url('data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 width=%22300%22 height=%22300%22><filter id=%22n%22><feTurbulence type=%22fractalNoise%22 baseFrequency=%220.65%22 numOctaves=%223%22 stitchTiles=%22stitch%22/></filter><rect width=%22300%22 height=%22300%22 filter=%22url(%23n)%22 opacity=%221%22/></svg>');
                    background-size:300px;"></div>

        {{-- Orange Glow --}}
        <div style="position:absolute;bottom:-200px;right:-150px;width:600px;height:600px;
                    background:radial-gradient(circle,rgba(255,92,0,.18) 0%,transparent 70%);
                    pointer-events:none;"></div>

        {{-- Diagonal Stripe --}}
        <div style="position:absolute;top:0;right:0;width:45%;height:100%;
                    background:repeating-linear-gradient(-45deg,transparent,transparent 40px,
                    rgba(255,92,0,.025) 40px,rgba(255,92,0,.025) 41px);
                    pointer-events:none;"></div>

        {{-- Big BG Text --}}
        <div style="position:absolute;bottom:-2rem;left:0;right:0;
                    font-family:var(--fas-font-display);
                    font-size:clamp(5rem,18vw,18rem);
                    color:rgba(255,255,255,.025);
                    letter-spacing:-.02em;white-space:nowrap;overflow:hidden;
                    line-height:1;user-select:none;">
            SNEAKERS
        </div>

        <div class="container position-relative" style="z-index:2;">
            <div class="row align-items-center g-5">
                <div class="col-lg-7" style="animation:fadeUp .8s ease both;">
                    {{-- Eyebrow --}}
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div style="width:40px;height:2px;background:var(--fas-orange);"></div>
                        <span style="font-family:var(--fas-font-cond);font-size:.8rem;font-weight:700;
                                     letter-spacing:.2em;text-transform:uppercase;color:var(--fas-orange);">
                            Authentic · Trusted · Since 2019
                        </span>
                    </div>

                    <h1 style="font-family:var(--fas-font-display);
                               font-size:clamp(3.5rem,9vw,8rem);
                               line-height:.95;letter-spacing:-.01em;
                               color:var(--fas-white);margin-bottom:1.5rem;">
                        FRIDAY<br>
                        <span style="color:var(--fas-orange);">AFTER</span><br>
                        SNEAKERS
                    </h1>

                    <p style="font-size:1.05rem;color:var(--fas-muted);max-width:480px;
                               line-height:1.7;margin-bottom:2.5rem;">
                        Temukan koleksi sneakers authentic pilihan — dari lifestyle hingga running.
                        Dipercaya ribuan pelanggan selama 5 tahun.
                    </p>

                    <div class="d-flex flex-wrap gap-3">
                        <a href="" class="btn btn-fas-orange px-4 py-3"
                           style="font-size:1rem;">
                            <i class="bi bi-grid me-2"></i>Lihat Katalog
                        </a>
                        <a href="https://wa.me/6287762951839" target="_blank"
                           class="btn btn-fas-outline px-4 py-3" style="font-size:1rem;">
                            <i class="bi bi-whatsapp me-2"></i>Hubungi Kami
                        </a>
                    </div>

                    {{-- Stats --}}
                    <div class="d-flex gap-5 mt-5 pt-4"
                         style="border-top:1px solid var(--fas-border);">
                        <div>
                            <div style="font-family:var(--fas-font-display);font-size:2.2rem;
                                        color:var(--fas-white);line-height:1;">5+</div>
                            <div style="font-size:.78rem;color:var(--fas-muted);
                                        font-family:var(--fas-font-cond);letter-spacing:.1em;
                                        text-transform:uppercase;">Tahun Berpengalaman</div>
                        </div>
                        <div>
                            <div style="font-family:var(--fas-font-display);font-size:2.2rem;
                                        color:var(--fas-white);line-height:1;">1K+</div>
                            <div style="font-size:.78rem;color:var(--fas-muted);
                                        font-family:var(--fas-font-cond);letter-spacing:.1em;
                                        text-transform:uppercase;">Produk Terjual</div>
                        </div>
                        <div>
                            <div style="font-family:var(--fas-font-display);font-size:2.2rem;
                                        color:var(--fas-orange);line-height:1;">100%</div>
                            <div style="font-size:.78rem;color:var(--fas-muted);
                                        font-family:var(--fas-font-cond);letter-spacing:.1em;
                                        text-transform:uppercase;">Authentic</div>
                        </div>
                    </div>
                </div>

                {{-- Hero Image Placeholder --}}
                <div class="col-lg-5 d-none d-lg-flex justify-content-center">
                    <div class="position-relative" style="width:420px;height:420px;">
                        <div style="position:absolute;inset:0;background:var(--fas-surface);
                                    border:1px solid var(--fas-border);
                                    display:flex;align-items:center;justify-content:center;">
                            <div style="text-align:center;">
                                <i class="bi bi-image" style="font-size:4rem;color:var(--fas-border);"></i>
                                <p style="color:var(--fas-muted);font-size:.8rem;margin-top:.5rem;
                                          font-family:var(--fas-font-cond);letter-spacing:.1em;">
                                    HERO PRODUCT IMAGE
                                </p>
                            </div>
                        </div>
                        {{-- Decorative border --}}
                        <div style="position:absolute;top:-12px;right:-12px;width:100%;height:100%;
                                    border:1px solid var(--fas-orange);z-index:-1;pointer-events:none;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ── KATEGORI STRIP ───────────────────────────── --}}
    @if(isset($kategori) && $kategori->count())
    <div style="background:var(--fas-surface);border-top:1px solid var(--fas-border);
                border-bottom:1px solid var(--fas-border);padding:.6rem 0;overflow:hidden;">
        <div class="container-fluid">
            <div class="d-flex gap-2 flex-wrap px-2">
                @foreach ($kategori as $kat)
                <a href="{{ route('user.katalog', ['kategori' => $kat->kategori_id]) }}"
                   class="btn btn-fas-outline"
                   style="font-size:.75rem;padding:.4rem 1rem;">
                    {{ $kat->nama_kategori }}
                </a>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    {{-- ── FEATURED PRODUCTS ────────────────────────── --}}
    <section style="padding:5rem 0;">
        <div class="container">
            <div class="row align-items-end mb-4">
                <div class="col">
                    <div class="section-label">Produk Terbaru</div>
                    <h2 class="section-title">KOLEKSI<br>PILIHAN</h2>
                </div>
                <div class="col-auto">
                    <a href="" class="btn btn-fas-outline">
                        Lihat Semua <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>

            @if($sepatu && $sepatu->count())
            <div class="row g-3">
                @foreach ($sepatu as $data)
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="{{ route('user.detail', $data->sepatu_id) }}" style="text-decoration:none;">
                        <div class="product-card h-100">
                            {{-- Gambar --}}
                            <div style="overflow:hidden;">
                                @if($data->gambar_sepatu)
                                    <img src="{{ asset('storage/' . $data->gambar_sepatu) }}"
                                         alt="{{ $data->nama_sepatu }}">
                                @else
                                    <div style="width:100%;aspect-ratio:1/1;background:var(--fas-dark);
                                                display:flex;align-items:center;justify-content:center;">
                                        <i class="bi bi-image" style="font-size:2.5rem;color:var(--fas-border);"></i>
                                    </div>
                                @endif
                            </div>

                            {{-- Info --}}
                            <div class="card-body">
                                @if($data->kategori)
                                    <div class="product-brand">{{ $data->kategori->nama_kategori }}</div>
                                @endif
                                <div class="product-name">{{ $data->nama_sepatu }}</div>
                                <div class="d-flex justify-content-between align-items-center mt-2">
                                    <div class="product-price">
                                        Rp {{ number_format($data->harga_sepatu, 0, ',', '.') }}
                                    </div>
                                    {{-- @php $stok = $data->stokSepatu->sum('jumlah_stok') @endphp
                                    @if($stok <= 0)
                                        <span class="stok-badge badge bg-danger">Habis</span>
                                    @elseif($stok <= 5)
                                        <span class="stok-badge badge bg-warning text-dark">Sisa {{ $stok }}</span>
                                    @else
                                        <span class="stok-badge badge bg-success">Tersedia</span>
                                    @endif --}}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-5" style="color:var(--fas-muted);">
                <i class="bi bi-box-seam fs-1 d-block mb-3"></i>
                <p>Belum ada produk tersedia. Segera hadir!</p>
            </div>
            @endif
        </div>
    </section>

    {{-- ── ABOUT ────────────────────────────────────── --}}
    <section id="about" style="padding:5rem 0;background:var(--fas-dark);
                               border-top:1px solid var(--fas-border);
                               border-bottom:1px solid var(--fas-border);">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5">
                    <div class="position-relative" style="height:360px;">
                        <div style="position:absolute;top:0;left:0;right:20px;bottom:20px;
                                    background:var(--fas-surface);border:1px solid var(--fas-border);
                                    display:flex;flex-direction:column;justify-content:center;padding:2.5rem;">
                            <div style="font-family:var(--fas-font-display);font-size:5rem;
                                        color:var(--fas-orange);line-height:1;">5</div>
                            <div style="font-family:var(--fas-font-cond);font-weight:700;
                                        letter-spacing:.1em;text-transform:uppercase;
                                        color:var(--fas-white);font-size:1.1rem;">
                                Tahun Melayani<br>Pecinta Sneakers
                            </div>
                            <div style="width:40px;height:3px;background:var(--fas-orange);margin-top:1.5rem;"></div>
                            <p style="color:var(--fas-muted);font-size:.9rem;margin-top:1rem;line-height:1.6;">
                                Dari Instagram, Tokopedia, hingga Shopee —<br>
                                kami hadir di mana kamu belanja.
                            </p>
                        </div>
                        <div style="position:absolute;bottom:0;right:0;
                                    width:calc(100% - 20px);height:calc(100% - 20px);
                                    border:1px solid var(--fas-orange);z-index:-1;"></div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="section-label">Tentang Kami</div>
                    <h2 class="section-title mb-4">SIAPA KAMI?</h2>
                    <p style="color:var(--fas-muted);line-height:1.8;margin-bottom:1.5rem;">
                        <strong style="color:var(--fas-white);">Friday After Sneakers</strong> adalah toko
                        reseller dan dropship sepatu authentic yang telah berdiri sejak 2019. Kami hadir untuk
                        menjawab kebutuhan para sneakerhead yang menginginkan produk berkualitas dengan
                        pelayanan terpercaya.
                    </p>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <div style="padding:1.5rem;background:var(--fas-surface);
                                        border:1px solid var(--fas-border);
                                        border-left:3px solid var(--fas-orange);">
                                <div style="font-family:var(--fas-font-cond);font-weight:700;font-size:.8rem;
                                            letter-spacing:.15em;text-transform:uppercase;
                                            color:var(--fas-orange);margin-bottom:.8rem;">Visi</div>
                                <p style="color:var(--fas-white);font-size:.9rem;line-height:1.6;margin:0;">
                                    Menjadi toko sepatu online terpercaya yang dikenal karena kualitas produk
                                    dan layanan prima.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div style="padding:1.5rem;background:var(--fas-surface);
                                        border:1px solid var(--fas-border);
                                        border-left:3px solid var(--fas-border);">
                                <div style="font-family:var(--fas-font-cond);font-weight:700;font-size:.8rem;
                                            letter-spacing:.15em;text-transform:uppercase;
                                            color:var(--fas-muted);margin-bottom:.8rem;">Misi</div>
                                <ul style="color:var(--fas-muted);font-size:.88rem;line-height:1.7;
                                           margin:0;padding-left:1.2rem;">
                                    <li>Menyediakan produk 100% authentic</li>
                                    <li>Pelayanan responsif dan ramah</li>
                                    <li>Harga kompetitif &amp; transparan</li>
                                    <li>Pengiriman cepat dan aman</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ── KONTAK / CTA ─────────────────────────────── --}}
    <section id="kontak" style="padding:5rem 0;">
        <div class="container text-center">
            <div class="section-label">Butuh Bantuan?</div>
            <h2 class="section-title mb-3">HUBUNGI<br>KAMI SEKARANG</h2>
            <p style="color:var(--fas-muted);max-width:500px;margin:0 auto 2.5rem;">
                Punya pertanyaan tentang produk, stok, atau pengiriman?
                Kami siap membantu kamu.
            </p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="https://wa.me/6287762951839" target="_blank"
                   class="btn btn-fas-orange px-4 py-3" style="font-size:1rem;">
                    <i class="bi bi-whatsapp me-2"></i>Chat via WhatsApp
                </a>
                <a href="https://instagram.com/fridayaftersneakers" target="_blank"
                   class="btn btn-fas-outline px-4 py-3" style="font-size:1rem;">
                    <i class="bi bi-instagram me-2"></i>Instagram
                </a>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>