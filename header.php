<?php
// includes/header.php
if (session_status() === PHP_SESSION_NONE) session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? 'Friday After Sneakers' ?> · FAS</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Barlow+Condensed:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --fas-white:    #ffffff;
            --fas-offwhite: #f8f9fa;
            --fas-light:    #f1f3f5;
            --fas-border:   #e9ecef;
            --fas-text:     #1a1a1a;
            --fas-text-muted: #6c757d;
            --fas-black:    #0a0a0a;
            --fas-orange:   #FF5C00;
            --fas-orange2:  #FF8A3D;
            --fas-font-body:    'Inter', sans-serif;
            --fas-font-cond:    'Barlow Condensed', sans-serif;
            --shadow: 0 4px 20px rgba(0,0,0,0.06);
            --shadow-hover: 0 8px 40px rgba(0,0,0,0.12);
        }

        * { box-sizing: border-box; }

        body {
            background: var(--fas-offwhite);
            color: var(--fas-text);
            font-family: var(--fas-font-body);
            line-height: 1.6;
        }

        /* ─── MAIN NAVBAR ────────────────────────────────────── */
        .fas-navbar {
            background: var(--fas-white);
            border-bottom: 2px solid var(--fas-orange);
            padding: 0.8rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 1px 4px rgba(0,0,0,0.04);
        }
        .fas-navbar .navbar-brand {
            font-family: var(--fas-font-cond);
            font-weight: 700;
            font-size: 1.4rem;
            letter-spacing: 0.02em;
            color: var(--fas-black) !important;
        }
        .fas-navbar .navbar-brand span {
            color: var(--fas-orange);
        }
        .fas-navbar .nav-link {
            font-family: var(--fas-font-cond);
            font-weight: 600;
            font-size: 0.85rem;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            color: var(--fas-text-muted) !important;
            padding: 0.5rem 0.8rem !important;
            transition: color 0.2s;
            border-bottom: 2px solid transparent;
        }
        .fas-navbar .nav-link:hover {
            color: var(--fas-black) !important;
        }
        .fas-navbar .nav-link.active {
            color: var(--fas-black) !important;
            border-bottom-color: var(--fas-orange);
        }
        .fas-navbar .nav-icon-link {
            font-size: 1.2rem;
            color: var(--fas-text-muted);
            text-decoration: none;
            padding: 0.25rem;
            transition: color 0.2s;
        }
        .fas-navbar .nav-icon-link:hover {
            color: var(--fas-orange);
        }

        /* ─── BUTTONS ────────────────────────────────────────── */
        .btn-fas-orange {
            background: var(--fas-orange);
            color: #fff;
            border: none;
            font-family: var(--fas-font-cond);
            font-weight: 700;
            font-size: 0.85rem;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            padding: 0.6rem 1.8rem;
            border-radius: 0;
            transition: background 0.2s, transform 0.15s;
        }
        .btn-fas-orange:hover {
            background: var(--fas-orange2);
            color: #fff;
            transform: translateY(-1px);
        }

        .btn-fas-outline {
            background: transparent;
            color: var(--fas-text);
            border: 1px solid var(--fas-border);
            font-family: var(--fas-font-cond);
            font-weight: 600;
            font-size: 0.85rem;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            padding: 0.6rem 1.8rem;
            border-radius: 0;
            transition: border-color 0.2s, color 0.2s;
        }
        .btn-fas-outline:hover {
            border-color: var(--fas-orange);
            color: var(--fas-orange);
        }

        /* ─── PRODUCT CARDS ──────────────────────────────────── */
        .product-card {
            background: var(--fas-white);
            border: 1px solid var(--fas-border);
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.25s, box-shadow 0.3s;
            box-shadow: var(--shadow);
            height: 100%;
        }
        .product-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-hover);
        }
        .product-card .img-wrap {
            aspect-ratio: 1/1;
            overflow: hidden;
            background: var(--fas-light);
        }
        .product-card .img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s;
        }
        .product-card:hover .img-wrap img {
            transform: scale(1.04);
        }
        .product-card .card-body {
            padding: 1rem 1.2rem 1.2rem;
        }
        .product-card .product-brand {
            font-size: 0.7rem;
            text-transform: uppercase;
            color: var(--fas-orange);
            font-weight: 600;
            margin-bottom: 0.2rem;
        }
        .product-card .product-name {
            font-family: var(--fas-font-cond);
            font-weight: 700;
            font-size: 0.95rem;
            color: var(--fas-text);
            line-height: 1.2;
            margin-bottom: 0.4rem;
        }
        .product-card .product-price {
            font-weight: 600;
            font-size: 1.1rem;
            color: var(--fas-black);
        }
        .product-card .stok-badge {
            font-size: 0.6rem;
            font-weight: 600;
            padding: 0.15rem 0.6rem;
            border-radius: 100px;
            background: var(--fas-orange);
            color: #fff;
        }

        /* ─── SECTION TITLES ─────────────────────────────────── */
        .section-label {
            font-family: var(--fas-font-cond);
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: var(--fas-orange);
            margin-bottom: 0.25rem;
        }
        .section-title {
            font-family: var(--fas-font-cond);
            font-weight: 700;
            font-size: 2rem;
            letter-spacing: 0.02em;
            color: var(--fas-text);
            line-height: 1.1;
        }

        /* ─── BREADCRUMB ────────────────────────────────────── */
        .fas-breadcrumb {
            background: transparent;
            padding: 0;
            margin: 0 0 1.5rem 0;
            font-size: 0.82rem;
        }
        .fas-breadcrumb .breadcrumb-item a {
            color: var(--fas-text-muted);
            text-decoration: none;
            transition: color 0.2s;
        }
        .fas-breadcrumb .breadcrumb-item a:hover {
            color: var(--fas-orange);
        }
        .fas-breadcrumb .breadcrumb-item.active {
            color: var(--fas-text);
            font-weight: 600;
        }

        /* ─── LOADING SPINNER ───────────────────────────────── */
        .fas-spinner {
            display: none;
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(255,255,255,0.85);
            backdrop-filter: blur(4px);
            z-index: 9999;
            align-items: center;
            justify-content: center;
        }
        .fas-spinner.show {
            display: flex;
        }
        .fas-spinner-inner {
            width: 42px; height: 42px;
            border: 3px solid var(--fas-border);
            border-top-color: var(--fas-orange);
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }
        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* ─── RESPONSIVE ──────────────────────────────────────── */
        @media (max-width: 768px) {
            .fas-navbar .navbar-brand { font-size: 1.1rem; }
            .fas-navbar .nav-link { font-size: 0.75rem; }
            .product-card .product-name { font-size: 0.85rem; }
            .product-card .product-price { font-size: 1rem; }
            .section-title { font-size: 1.6rem; }
        }
        @media (max-width: 480px) {
            .col-6 { width: 100%; }
        }

        /* ─── FOOTER ────────────────────────────────────────── */
        .fas-footer {
            background: var(--fas-black);
            color: rgba(255,255,255,0.7);
            padding: 3rem 0 1.5rem;
            margin-top: 4rem;
        }
        .fas-footer .footer-brand {
            font-family: var(--fas-font-cond);
            font-weight: 700;
            font-size: 1.6rem;
            letter-spacing: 0.05em;
            color: #fff;
        }
        .fas-footer .footer-brand span {
            color: var(--fas-orange);
        }
        .fas-footer .footer-link {
            color: rgba(255,255,255,0.6);
            text-decoration: none;
            font-size: 0.88rem;
            transition: color 0.2s;
        }
        .fas-footer .footer-link:hover {
            color: #fff;
        }
        .fas-footer .footer-heading {
            font-family: var(--fas-font-cond);
            font-weight: 700;
            font-size: 0.75rem;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.4);
            margin-bottom: 1rem;
        }
        .fas-footer .social-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px; height: 36px;
            border: 1px solid rgba(255,255,255,0.15);
            color: rgba(255,255,255,0.5);
            text-decoration: none;
            transition: border-color 0.2s, color 0.2s;
        }
        .fas-footer .social-btn:hover {
            border-color: var(--fas-orange);
            color: var(--fas-orange);
        }

        /* ─── ALERT ──────────────────────────────────────────── */
        .fas-alert {
            border: none;
            border-left: 3px solid;
            border-radius: 0;
            padding: 0.8rem 1rem;
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
        }
        .fas-alert.success {
            background: rgba(25,135,84,0.08);
            border-color: #198754;
            color: #0f5132;
        }
        .fas-alert.danger {
            background: rgba(220,53,69,0.08);
            border-color: #dc3545;
            color: #842029;
        }

        /* ─── FORMS ──────────────────────────────────────────── */
        .fas-input {
            background: var(--fas-white);
            border: 1px solid var(--fas-border);
            border-radius: 0;
            color: var(--fas-text);
            font-family: var(--fas-font-body);
            padding: 0.75rem 1rem;
            width: 100%;
            transition: border-color 0.2s;
        }
        .fas-input:focus {
            border-color: var(--fas-orange);
            outline: none;
            box-shadow: 0 0 0 3px rgba(255,92,0,0.1);
        }
    </style>
</head>
<body>

<!-- ─── MAIN NAVBAR ────────────────────────────────────── -->
<nav class="navbar fas-navbar">
    <div class="container">
        <a class="navbar-brand" href="/index.php">FRIDAY<span>AFTER</span>SNEAKERS</a>

        <button class="navbar-toggler border-0 p-0" type="button"
                data-bs-toggle="collapse" data-bs-target="#navMenu">
            <i class="bi bi-list" style="font-size:1.4rem;color:var(--fas-text);"></i>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav me-auto ms-4">
                <li class="nav-item">
                    <a class="nav-link <?= ($activePage ?? '') === 'home' ? 'active' : '' ?>" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($activePage ?? '') === 'katalog' ? 'active' : '' ?>" href="katalog.php">Katalog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($activePage ?? '') === 'about' ? 'active' : '' ?>" href="index.php#about">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($activePage ?? '') === 'kontak' ? 'active' : '' ?>" href="index.php#kontak">Kontak</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
