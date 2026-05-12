<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Sepatu - Friday After Sneakers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Barlow:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Barlow+Condensed:wght@400;600;700&display=swap" rel="stylesheet">


    <style>
        :root {
            --fas-black:   #0a0a0a;
            --fas-dark:    #111111;
            --fas-surface: #1a1a1a;
            --fas-border:  #2a2a2a;
            --fas-white:   #f5f5f5;
            --fas-muted:   #888888;
            --fas-orange:  #ff5c00;
            --fas-font-display: 'Bebas Neue', sans-serif;
            --fas-font-body:    'Barlow', sans-serif;
            --fas-font-cond:    'Barlow Condensed', sans-serif;
            --fas-orange2:      #FF8A3D;
        }

        body {
            background: var(--fas-black);
            color: var(--fas-white);
            font-family: var(--fas-font-body);
            letter-spacing: 0.01em;
        }

        /* ── Navbar ────────────────────────────────── */
        .fas-navbar {
            background: rgba(10,10,10,.95);
            border-bottom: 1px solid var(--fas-border);
            backdrop-filter: blur(8px);
        }
        .fas-navbar .navbar-brand {
            font-family: var(--fas-font-display);
            font-size: 1.6rem;
            letter-spacing: .05em;
            color: var(--fas-white) !important;
        }
        .fas-navbar .nav-link {
            font-family: var(--fas-font-cond);
            font-weight: 600;
            letter-spacing: .12em;
            text-transform: uppercase;
            font-size: .9rem;
            color: var(--fas-muted) !important;
            padding: 1.5rem 1rem !important;
            transition: color .2s;
            position: relative;
        }
        .fas-navbar .nav-link:hover,
        .fas-navbar .nav-link.active { color: var(--fas-white) !important; }
        .fas-navbar .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: 0; left: 1rem; right: 1rem;
            height: 2px;
            background: var(--fas-orange);
        }

        /* ── Buttons ───────────────────────────────── */
        .btn-fas-orange {
            background: var(--fas-orange);
            color: #fff;
            border: none;
            font-family: var(--fas-font-cond);
            font-weight: 700;
            font-size: 0.85rem;
            letter-spacing: .1em;
            text-transform: uppercase;
            border-radius: 0;
            padding: 0.6rem 1.4rem;
            transition: background .2s, transform .1s;
        }
        .btn-fas-orange:hover { background: var(--fas-orange2); color: #fff; transform: translateY(-1px); }

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
        .btn-fas-outline:hover { border-color: var(--fas-orange); color: var(--fas-orange); }

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

        /* ── Filter Sidebar ────────────────────────── */
        .filter-sidebar {
            background: var(--fas-surface);
            border: 1px solid var(--fas-border);
            padding: 1.5rem;
            position: sticky;
            top: 80px;
        }

        .filter-title {
            font-family: var(--fas-font-cond);
            font-weight: 700;
            font-size: .75rem;
            letter-spacing: .2em;
            text-transform: uppercase;
            color: var(--fas-muted);
            margin-bottom: 1rem;
            padding-bottom: .6rem;
            border-bottom: 1px solid var(--fas-border);
        }
        .filter-item {
            display: flex;
            align-items: center;
            gap: .6rem;
            padding: .4rem 0;
            cursor: pointer;
            font-size: .9rem;
            color: var(--fas-muted);
            transition: color .2s;
            text-decoration: none;
        }
        .filter-item:hover,
        .filter-item.active-filter { color: var(--fas-white); }
        .filter-item.active-filter .filter-dot { background: var(--fas-orange); }
        .filter-dot {
            width: 6px; height: 6px;
            border-radius: 50%;
            background: var(--fas-border);
            flex-shrink: 0;
            transition: background .2s;
        }

        /* ── Sort Buttons ──────────────────────────── */
        .sort-btn {
            background: var(--fas-surface);
            border: 1px solid var(--fas-border);
            color: var(--fas-muted);
            font-family: var(--fas-font-cond);
            font-size: .8rem;
            font-weight: 600;
            letter-spacing: .08em;
            text-transform: uppercase;
            padding: .45rem 1rem;
            text-decoration: none;
            transition: border-color .2s, color .2s;
            white-space: nowrap;
        }
        .sort-btn:hover,
        .sort-btn.active-sort { border-color: var(--fas-orange); color: var(--fas-orange); }

        /* ── Search Bar ────────────────────────────── */
        .search-wrap { position: relative; }
        .search-wrap input {
            background: var(--fas-surface);
            border: 1px solid var(--fas-border);
            color: var(--fas-white);
            padding: .8rem 1rem .8rem 2.8rem;
            width: 100%;
            font-family: var(--fas-font-body);
            font-size: .95rem;
            border-radius: 0;
            outline: none;
            transition: border-color .2s;
        }
        .search-wrap input:focus { border-color: var(--fas-orange); }
        .search-wrap input::placeholder { color: var(--fas-muted); }
        .search-wrap .search-icon {
            position: absolute;
            left: .9rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--fas-muted);
        }

        /* ── Number Input ──────────────────────────── */
        .fas-input {
            background: var(--fas-surface);
            border: 1px solid var(--fas-border);
            color: var(--fas-white);
            padding: .75rem 1rem;
            font-family: var(--fas-font-body);
            font-size: .9rem;
            border-radius: 0;
            outline: none;
            transition: border-color .2s;
        }
        .fas-input:focus { border-color: var(--fas-orange); }
        .fas-input::placeholder { color: var(--fas-muted); }

        /* ── Mobile Select ─────────────────────────── */
        .fas-select {
            background: var(--fas-surface);
            border: 1px solid var(--fas-border);
            color: var(--fas-white);
            padding: .55rem .9rem;
            font-family: var(--fas-font-cond);
            font-size: .9rem;
            border-radius: 0;
            outline: none;
        }
        .fas-select option { background: var(--fas-surface); }

        /* ── Product Card ──────────────────────────── */
        .product-card {
            background: var(--fas-surface);
            border: 1px solid var(--fas-border);
            transition: border-color .25s, transform .25s;
            overflow: hidden;
        }
        .product-card:hover { border-color: var(--fas-orange); transform: translateY(-4px); }
        .product-card img {
            width: 100%; aspect-ratio: 1/1; object-fit: cover;
            display: block; transition: transform .4s;
        }
        .product-card:hover img { transform: scale(1.04); }
        .product-card .card-body { padding: 1rem; }
        .product-brand {
            font-size: .72rem; letter-spacing: .15em;
            text-transform: uppercase; color: var(--fas-orange); font-weight: 700;
        }
        .product-name {
            font-family: var(--fas-font-cond);
            font-weight: 700;
            font-size: 1rem;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            color: var(--fas-white);
            margin-bottom: 0.2rem;
            line-height: 1.2;
        }
        .product-price {
            font-family: var(--fas-font-display);
            font-size: 1.3rem;
            color: var(--fas-white);
            letter-spacing: 0.03em;
        }
        .stok-badge {
            font-size: .7rem;
            font-family: var(--fas-font-cond);
            font-weight: 600;
            border-radius: 0;
        }

        /* ── Breadcrumb ────────────────────────────── */
        .breadcrumb-item a {
            color: var(--fas-muted); text-decoration: none;
            font-family: var(--fas-font-cond); font-size: .82rem;
            letter-spacing: .1em; text-transform: uppercase; transition: color .2s;
        }
        .breadcrumb-item a:hover { color: var(--fas-orange); }
        .breadcrumb-item.active {
            color: var(--fas-white); font-family: var(--fas-font-cond);
            font-size: .82rem; letter-spacing: .1em; text-transform: uppercase;
        }
        .breadcrumb-item + .breadcrumb-item::before { color: var(--fas-border); content: "›"; }
    </style>
</head>
<body>

    {{-- ── NAVBAR ─────────────────────────────────── --}}
    @include('layout.navbar')

    @if(session('error'))
        <div class="alert alert-danger rounded-0 mb-0">{{ session('error') }}</div>
    @endif

    {{-- ── PAGE HEADER ──────────────────────────────── --}}
    <div style="
        background-color: #111111;
        background-image: linear-gradient(to right, #111111 30%, rgba(17,17,17,0.1) 100%),
                          url('https://images.unsplash.com/photo-1552346154-21d32810baa3');
        background-size: cover;
        background-position: center right;
        background-repeat: no-repeat;
        border-bottom: 2px solid var(--fas-orange);
        padding: 80px 0;">
        <div class="container">
            <div class="section-label">Produk Kami</div>
            <h1 class="section-title">KATALOG<br>SEPATU</h1>
        </div>
    </div>

    {{-- ── MAIN CONTENT ─────────────────────────────── --}}
    <div class="container" style="padding:2.5rem 0 5rem;">
        <div class="row g-4">

            {{-- ── SIDEBAR FILTER (Desktop) ────────── --}}
            <div class="col-lg-3 d-none d-lg-block">
                <form method="GET" action="{{ route('user.katalog') }}">
                    <input type="hidden" name="sort" value="{{ request('sort', 'terbaru') }}">

                    {{-- Pencarian --}}
                    <div class="filter-sidebar mb-3">
                        <div class="filter-title">Pencarian</div>
                        <div class="search-wrap">
                            <i class="bi bi-search search-icon"></i>
                            <input type="text" name="q"
                                   placeholder="Cari sepatu..."
                                   value="{{ request('q') }}">
                        </div>
                    </div>

                    {{-- Kategori --}}
                    <div class="filter-sidebar mb-3">
                        <div class="filter-title">Kategori</div>    
                        <a href="{{ route('user.katalog', array_merge(request()->all(), ['kategori' => 0])) }}"
                           class="filter-item {{ request('kategori', 0) == 0 ? 'active-filter' : '' }}">
                            <span class="filter-dot"></span> Semua Kategori
                        </a>
                        @foreach ($kategori as $kat)
                        <a href="{{ route('user.katalog', array_merge(request()->all(), ['kategori' => $kat->kategori_id])) }}"
                           class="filter-item {{ request('kategori') == $kat->kategori_id ? 'active-filter' : '' }}">
                            <span class="filter-dot"></span>
                            {{ $kat->nama_kategori }}
                        </a>
                        @endforeach
                    </div>

                    {{-- Rentang Harga --}}
                    <div class="filter-sidebar mb-3">
                        <div class="filter-title">Rentang Harga</div>
                        <div class="mb-2">
                            <label style="font-size:.78rem;color:var(--fas-muted);
                                          font-family:var(--fas-font-cond);letter-spacing:.08em;
                                          text-transform:uppercase;">Min</label>
                            <input class="fas-input w-100 mt-1" type="number"
                                   name="harga_min" placeholder="Rp 0"
                                   value="{{ request('harga_min') }}">
                        </div>
                        <div class="mb-3">
                            <label style="font-size:.78rem;color:var(--fas-muted);
                                          font-family:var(--fas-font-cond);letter-spacing:.08em;
                                          text-transform:uppercase;">Max</label>
                            <input class="fas-input w-100 mt-1" type="number"
                                   name="harga_max"
                                   placeholder="Rp {{ number_format($hargaMax ?? 0, 0, ',', '.') }}"
                                   value="{{ request('harga_max') }}">
                        </div>
                        <button type="submit" class="btn btn-fas-orange w-100">
                            Terapkan Filter
                        </button>
                        @if(request()->hasAny(['harga_min','harga_max','q','kategori']))
                        <a href="{{ route('user.katalog') }}" class="btn btn-fas-outline w-100 mt-2">
                            <i class="bi bi-x me-1"></i>Reset Filter
                        </a>
                        @endif
                    </div>
                </form>
            </div>

            {{-- ── PRODUK AREA ──────────────────────── --}}
            <div class="col-lg-9">

                {{-- Toolbar --}}
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
                    <div style="font-size:.88rem;color:var(--fas-muted);">
                        <span style="color:var(--fas-white);font-weight:600;">
                            {{ $sepatu->count() }}
                        </span> produk ditemukan
                        @if(request('q'))
                            untuk "<span style="color:var(--fas-orange);">{{ request('q') }}</span>"
                        @endif
                    </div>

                    {{-- Sort Buttons --}}
                    <div class="d-flex gap-2 flex-wrap">
                        @php
                            $sorts = [
                                'terbaru'    => 'Terbaru',
                                'harga_asc'  => '<i class="bi bi-arrow-up me-1"></i>Harga',
                                'harga_desc' => '<i class="bi bi-arrow-down me-1"></i>Harga',
                                'nama_asc'   => 'A–Z',
                                'nama_desc'  => 'Z–A',
                            ];
                            $currentSort = request('sort', 'terbaru');
                        @endphp
                        @foreach ($sorts as $val => $label)
                        <a href="{{ route('user.katalog', array_merge(request()->all(), ['sort' => $val])) }}"
                           class="sort-btn {{ $currentSort === $val ? 'active-sort' : '' }}">
                            {!! $label !!}
                        </a>
                        @endforeach
                    </div>
                </div>

                {{-- Mobile Filter --}}
                <div class="d-lg-none mb-3">
                    <button class="btn btn-fas-outline w-100" type="button"
                            data-bs-toggle="collapse" data-bs-target="#mobileFilter">
                        <i class="bi bi-funnel me-2"></i>Filter Produk
                    </button>
                    <div class="collapse mt-2" id="mobileFilter">
                        <form method="GET" action="{{ route('user.katalog') }}">
                            <input type="hidden" name="sort"
                                   value="{{ request('sort', 'terbaru') }}">
                            <div class="filter-sidebar">
                                <div class="filter-title">Pencarian</div>
                                <input class="fas-input w-100 mb-3" type="text" name="q"
                                       placeholder="Cari sepatu..."
                                       value="{{ request('q') }}">

                                <div class="filter-title">Kategori</div>
                                <select class="fas-select w-100 mb-3" name="kategori">
                                    <option value="0">Semua Kategori</option>
                                    @foreach ($kategori as $kat)
                                    <option value="{{ $kat->kategori_id }}"
                                        {{ request('kategori') == $kat->kategori_id ? 'selected' : '' }}>
                                        {{ $kat->nama_kategori }}
                                    </option>
                                    @endforeach
                                </select>

                                <div class="filter-title">Rentang Harga</div>
                                <div class="mb-2">
                                    <label style="font-size:.78rem;color:var(--fas-muted);
                                                font-family:var(--fas-font-cond);letter-spacing:.08em;
                                                text-transform:uppercase;">Min</label>
                                    <input class="fas-input w-100 mt-1" type="number"
                                        name="harga_min" placeholder="Rp 0"
                                        value="{{ request('harga_min') }}">
                                </div>
                                <div class="mb-3">
                                    <label style="font-size:.78rem;color:var(--fas-muted);
                                                font-family:var(--fas-font-cond);letter-spacing:.08em;
                                                text-transform:uppercase;">Max</label>
                                    <input class="fas-input w-100 mt-1" type="number"
                                        name="harga_max"
                                        placeholder="Rp {{ number_format($hargaMax ?? 0, 0, ',', '.') }}"
                                        value="{{ request('harga_max') }}">
                                </div>
                                <button type="submit" class="btn btn-fas-orange w-100">Terapkan</button>
                                @if(request()->hasAny(['harga_min','harga_max','q','kategori']))
                                <a href="{{ route('user.katalog') }}" class="btn btn-fas-outline w-100 mt-2">
                                    Reset
                                </a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>

                {{-- ── PRODUCT GRID ─────────────────── --}}
                @if($sepatu->count() > 0)
                <div class="row g-3">
                    @foreach ($sepatu as $data)
                    <div class="col-6 col-md-4">
                        <a href="{{ route('user.detail', $data->sepatu_id) }}"
                           style="text-decoration:none;">
                            <div class="product-card h-100">
                                <div style="overflow:hidden;">
                                    @if($data->gambar_sepatu)
                                        <img src="{{ asset('storage/' . $data->gambar_sepatu) }}"
                                             alt="{{ $data->nama_sepatu }}">
                                    @else
                                        <div style="width:100%;aspect-ratio:1/1;background:var(--fas-dark);
                                                    display:flex;align-items:center;justify-content:center;">
                                            <i class="bi bi-image"
                                               style="font-size:2.5rem;color:var(--fas-border);"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="card-body">
                                    @if($data->kategori)
                                        <div class="product-brand">
                                            {{ $data->kategori->nama_kategori }}
                                        </div>
                                    @endif
                                    <div class="product-name">{{ $data->nama_sepatu }}</div>
                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                        <div class="product-price">
                                            Rp {{ number_format($data->harga_sepatu, 0, ',', '.') }}
                                        </div>
                                        @if($data->jumlah_stok <= 0)
                                            <span class="stok-badge badge bg-danger">Habis</span>
                                        @elseif($data->jumlah_stok <= 5)
                                            <span class="stok-badge badge bg-warning text-dark">
                                                Sisa {{ $data->jumlah_stok }}
                                            </span>
                                        @else
                                            <span class="stok-badge badge bg-success">Tersedia</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>

                @else
                {{-- Empty State --}}
                <div class="text-center py-5" style="color:var(--fas-muted);">
                    <i class="bi bi-search fs-1 d-block mb-3"
                       style="color:var(--fas-border);"></i>
                    <h5 style="color:var(--fas-white);">Produk tidak ditemukan</h5>
                    <p>Coba ubah filter atau kata kunci pencarian kamu.</p>
                    <a href="{{ route('user.katalog') }}" class="btn btn-fas-orange mt-2">
                        Reset Pencarian
                    </a>
                </div>
                @endif

            </div>{{-- end col-lg-9 --}}
        </div>{{-- end row --}}
    </div>{{-- end container --}}
    <footer>
        @include('layout.footer')
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>