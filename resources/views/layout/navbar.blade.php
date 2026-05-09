
<style>
    :root {
            --fas-black:   #0a0a0a;
            --fas-dark:    #111111;
            --fas-surface: #1a1a1a;
            --fas-border:  #2a2a2a;
            --fas-orange:  #FF5C00;
            --fas-orange2: #FF8A3D;
            --fas-white:   #F5F5F0;
            --fas-muted:   #888888;
            --fas-font-display: 'Bebas Neue', sans-serif;
            --fas-font-body:    'Barlow', sans-serif;
            --fas-font-cond:    'Barlow Condensed', sans-serif;
        }

        * { box-sizing: border-box; }

        body {
            background-color: var(--fas-black);
            color: var(--fas-white);
            font-family: var(--fas-font-body);
            letter-spacing: 0.01em;
        }

        /* ─── NAVBAR ─────────────────────────────── */
        .fas-navbar {
            background: rgba(10,10,10,0.95);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--fas-border);
            padding: 0 1.5rem;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .fas-navbar .navbar-brand {
            font-family: var(--fas-font-display);
            font-size: 1.6rem;
            letter-spacing: 0.05em;
            color: var(--fas-white) !important;
            line-height: 1;
        }

        .fas-navbar .navbar-brand span {
            color: var(--fas-orange);
        }

        .fas-navbar .nav-link {
            font-family: var(--fas-font-cond);
            font-weight: 600;
            font-size: 0.9rem;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--fas-muted) !important;
            padding: 1.5rem 1rem !important;
            transition: color 0.2s;
            position: relative;
        }

        .fas-navbar .nav-link:hover,
        .fas-navbar .nav-link.active {
            color: var(--fas-white) !important;
        }

        .fas-navbar .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 1rem;
            right: 1rem;
            height: 2px;
            background: var(--fas-orange);
        }

        .btn-fas-orange {
            background: var(--fas-orange);
            color: #fff;
            font-family: var(--fas-font-cond);
            font-weight: 700;
            font-size: 0.85rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            border: none;
            border-radius: 0;
            padding: 0.6rem 1.4rem;
            transition: background 0.2s, transform 0.1s;
        }

        .btn-fas-orange:hover {
            background: var(--fas-orange2);
            color: #fff;
            transform: translateY(-1px);
        }

        .btn-fas-outline {
            background: transparent;
            color: var(--fas-white);
            font-family: var(--fas-font-cond);
            font-weight: 700;
            font-size: 0.85rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            border: 1px solid var(--fas-border);
            border-radius: 0;
            padding: 0.6rem 1.4rem;
            transition: border-color 0.2s, color 0.2s;
        }

        .btn-fas-outline:hover {
            border-color: var(--fas-orange);
            color: var(--fas-orange);
        }

        .cart-badge {
            background: var(--fas-orange);
            color: #fff;
            font-size: 0.65rem;
            font-weight: 700;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            top: 8px;
            right: 4px;
        }

        /* ─── CARDS ──────────────────────────────── */
        .product-card {
            background: var(--fas-surface);
            border: 1px solid var(--fas-border);
            border-radius: 0;
            overflow: hidden;
            transition: transform 0.25s, border-color 0.25s;
        }

        .product-card:hover {
            transform: translateY(-4px);
            border-color: var(--fas-orange);
        }

        .product-card img {
            width: 100%;
            aspect-ratio: 1/1;
            object-fit: cover;
            background: #1f1f1f;
            transition: transform 0.4s;
        }

        .product-card:hover img {
            transform: scale(1.04);
        }

        .product-card .card-body {
            padding: 1rem;
            background: var(--fas-surface);
        }

        .product-card .product-name {
            font-family: var(--fas-font-cond);
            font-weight: 700;
            font-size: 1rem;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            color: var(--fas-white);
            margin-bottom: 0.2rem;
            line-height: 1.2;
        }

        .product-card .product-brand {
            font-size: 0.78rem;
            color: var(--fas-orange);
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-bottom: 0.6rem;
        }

        .product-card .product-price {
            font-family: var(--fas-font-display);
            font-size: 1.3rem;
            color: var(--fas-white);
            letter-spacing: 0.03em;
        }

        .product-card .stok-badge {
            font-size: 0.7rem;
            font-family: var(--fas-font-cond);
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            padding: 0.2rem 0.6rem;
        }

        /* ─── SECTION TITLES ─────────────────────── */
        .section-label {
            font-family: var(--fas-font-cond);
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--fas-orange);
            margin-bottom: 0.5rem;
        }

        .section-title {
            font-family: var(--fas-font-display);
            font-size: clamp(2.5rem, 6vw, 4.5rem);
            letter-spacing: 0.02em;
            line-height: 1;
            color: var(--fas-white);
        }

        /* ─── DIVIDER ─────────────────────────────── */
        .fas-divider {
            height: 1px;
            background: var(--fas-border);
            margin: 3rem 0;
        }

        /* ─── FOOTER ─────────────────────────────── */
        .fas-footer {
            background: var(--fas-dark);
            border-top: 1px solid var(--fas-border);
            padding: 3rem 0 1.5rem;
        }

        .fas-footer .footer-brand {
            font-family: var(--fas-font-display);
            font-size: 2rem;
            letter-spacing: 0.05em;
            color: var(--fas-white);
        }

        .fas-footer .footer-brand span {
            color: var(--fas-orange);
        }

        .fas-footer .footer-link {
            color: var(--fas-muted);
            text-decoration: none;
            font-size: 0.88rem;
            font-family: var(--fas-font-cond);
            letter-spacing: 0.06em;
            text-transform: uppercase;
            transition: color 0.2s;
        }

        .fas-footer .footer-link:hover {
            color: var(--fas-orange);
        }

        .fas-footer .footer-heading {
            font-family: var(--fas-font-cond);
            font-weight: 700;
            font-size: 0.75rem;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--fas-muted);
            margin-bottom: 1rem;
        }

        .social-btn {
            width: 38px;
            height: 38px;
            border: 1px solid var(--fas-border);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: var(--fas-muted);
            font-size: 1rem;
            text-decoration: none;
            transition: border-color 0.2s, color 0.2s;
        }

        .social-btn:hover {
            border-color: var(--fas-orange);
            color: var(--fas-orange);
        }

        /* ─── FORM CONTROLS ──────────────────────── */
        .fas-input {
            background: var(--fas-surface);
            border: 1px solid var(--fas-border);
            border-radius: 0;
            color: var(--fas-white);
            font-family: var(--fas-font-body);
            padding: 0.75rem 1rem;
        }

        .fas-input:focus {
            background: var(--fas-surface);
            border-color: var(--fas-orange);
            color: var(--fas-white);
            box-shadow: 0 0 0 2px rgba(255,92,0,0.15);
        }

        .fas-input::placeholder {
            color: var(--fas-muted);
        }

        .fas-select {
            background: var(--fas-surface) url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23888' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e") no-repeat right 0.75rem center/12px;
            border: 1px solid var(--fas-border);
            border-radius: 0;
            color: var(--fas-white);
            font-family: var(--fas-font-cond);
            font-weight: 600;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            font-size: 0.85rem;
            padding: 0.7rem 2.5rem 0.7rem 1rem;
            -webkit-appearance: none;
        }

        .fas-select:focus {
            background-color: var(--fas-surface);
            border-color: var(--fas-orange);
            color: var(--fas-white);
            box-shadow: 0 0 0 2px rgba(255,92,0,0.15);
        }

        .fas-select option {
            background: var(--fas-dark);
        }

        /* ─── ALERT ──────────────────────────────── */
        .fas-alert {
            border-radius: 0;
            border: none;
            border-left: 3px solid;
            font-family: var(--fas-font-body);
            font-size: 0.9rem;
            padding: 0.8rem 1rem;
        }

        .fas-alert.success {
            background: rgba(25,135,84,0.15);
            border-color: #198754;
            color: #75c49a;
        }

        .fas-alert.danger {
            background: rgba(220,53,69,0.15);
            border-color: #dc3545;
            color: #ea868f;
        }

        /* ─── SCROLLBAR ──────────────────────────── */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: var(--fas-black); }
        ::-webkit-scrollbar-thumb { background: var(--fas-border); }
        ::-webkit-scrollbar-thumb:hover { background: var(--fas-orange); }
        .fas-navbar {
            background: rgba(10,10,10,0.95);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--fas-border);
            padding: 0 1.5rem;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .fas-navbar .navbar-brand {
            font-family: var(--fas-font-display);
            font-size: 1.6rem;
            letter-spacing: 0.05em;
            color: var(--fas-white) !important;
            line-height: 1;
        }

        .fas-navbar .navbar-brand span {
            color: var(--fas-orange);
        }

        .fas-navbar .nav-link {
            font-family: var(--fas-font-cond);
            font-weight: 600;
            font-size: 0.9rem;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--fas-muted) !important;
            padding: 1.5rem 1rem !important;
            transition: color 0.2s;
            position: relative;
        }

        .fas-navbar .nav-link:hover,
        .fas-navbar .nav-link.active {
            color: var(--fas-white) !important;
        }
</style>

<nav class="navbar navbar-expand-lg fas-navbar sticky-top">
    <div class="container">
        <a class="navbar-brand me-4" href="{{ url('/') }}">FRIDAY <span>AFTER </span>SNEAKERS</a>
        <button class="navbar-toggler border-secondary" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center gap-1">
                <li class="nav-item"><a class="nav-link" href="{{ route('user.home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('user.katalog') }}">Katalog</a></li>
            </ul>
        </div>
    </div>
</nav>  