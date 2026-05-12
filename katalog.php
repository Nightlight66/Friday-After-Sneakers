<?php
$pageTitle = 'Katalog Sepatu';
$activePage = 'katalog';

// ─── HARDCODED PRODUCTS (using the same list as index.php) ────
$allProducts = [
    [
        'id' => 1,
        'name' => 'Nike Air Force 1 \'07',
        'cat' => 'Lifestyle',
        'price' => 1549000,
        'gambar' => 'https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?w=400'
    ],
    [
        'id' => 2,
        'name' => 'Adidas Yeezy Boost 350 V2',
        'cat' => 'Lifestyle',
        'price' => 3800000,
        'gambar' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=400'
    ],
    [
        'id' => 3,
        'name' => 'Puma RS-X3',
        'cat' => 'Lifestyle',
        'price' => 1275000,
        'gambar' => 'https://images.unsplash.com/photo-1560769629-975ec94e6a86?w=400'
    ],
    [
        'id' => 4,
        'name' => 'Converse Chuck 70',
        'cat' => 'Lifestyle',
        'price' => 899000,
        'gambar' => 'https://images.unsplash.com/photo-1654147801991-a9fa8594e900?q=80&w=751&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
    ],
    [
        'id' => 5,
        'name' => 'New Balance 990v5 Core',
        'cat' => 'Running',
        'price' => 2999000,
        'gambar' => 'https://images.unsplash.com/photo-1551107696-a4b0c5a0d9a2?q=80&w=812&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
    ],
    [
        'id' => 6,
        'name' => 'ASICS Gel-Kayano 29',
        'cat' => 'Running',
        'price' => 2450000,
        'gambar' => 'https://images.unsplash.com/photo-1746206673199-5b75dcec1018?q=80&w=464&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
    ],
    [
        'id' => 7,
        'name' => 'Hoka Clifton 9',
        'cat' => 'Running',
        'price' => 1999000,
        'gambar' => 'https://images.unsplash.com/photo-1543163521-1bf539c55dd2?w=400'
    ],
    [
        'id' => 8,
        'name' => 'Saucony Endorphin Speed',
        'cat' => 'Running',
        'price' => 2150000,
        'gambar' => 'https://images.unsplash.com/photo-1519415943484-9fa1873496d4?w=400'
    ],
    [
        'id' => 9,
        'name' => 'Nike Air Jordan 1 Retro High',
        'cat' => 'Basketball',
        'price' => 2500000,
        'gambar' => 'https://images.unsplash.com/photo-1731132198530-e4b2dc51d511?q=80&w=1032&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
    ],
    [
        'id' => 10,
        'name' => 'Adidas Harden Vol. 7',
        'cat' => 'Basketball',
        'price' => 2850000,
        'gambar' => 'https://images.unsplash.com/photo-1620794341491-76be6eeb6946?q=80&w=394&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
    ],
    [
        'id' => 11,
        'name' => 'Vans Old Skool',
        'cat' => 'Skateboarding',
        'price' => 749000,
        'gambar' => 'https://images.unsplash.com/photo-1626379530580-6a58c5cf1d5e?q=80&w=387&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
    ],
    [
        'id' => 12,
        'name' => 'Nike SB Dunk Low',
        'cat' => 'Skateboarding',
        'price' => 1099000,
        'gambar' => 'https://images.unsplash.com/photo-1692620334820-355161f652a8?q=80&w=933&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
    ],
];

// ─── HARDCODED KATEGORI ─────────────────────────────
$kategoriList = [
    ['kategori_id' => 1, 'nama_kategori' => 'Lifestyle'],
    ['kategori_id' => 2, 'nama_kategori' => 'Running'],
    ['kategori_id' => 3, 'nama_kategori' => 'Basketball'],
    ['kategori_id' => 4, 'nama_kategori' => 'Skateboarding'],
];

// ─── PRICE RANGE ─────────────────────────────────
$hargaMinAll = min(array_column($allProducts, 'price'));
$hargaMaxAll = max(array_column($allProducts, 'price'));

// ─── FILTER & SORT PARAMS ────────────────────────
$sort      = $_GET['sort']      ?? 'terbaru';
$kategori  = (int)($_GET['kategori'] ?? 0);
$hargaMin  = (int)($_GET['harga_min'] ?? 0);
$hargaMax  = (int)($_GET['harga_max'] ?? 0);
$search    = trim($_GET['q'] ?? '');

// ─── FILTER PRODUCTS ─────────────────────────────
$filteredProducts = array_filter($allProducts, function($p) use ($kategori, $hargaMin, $hargaMax, $search) {
    // Kategori filter
    if ($kategori > 0) {
        $catMap = [1 => 'Lifestyle', 2 => 'Running', 3 => 'Basketball', 4 => 'Skateboarding'];
        if ($catMap[$kategori] !== $p['cat']) return false;
    }
    // Harga filter
    if ($hargaMin > 0 && $p['price'] < $hargaMin) return false;
    if ($hargaMax > 0 && $p['price'] > $hargaMax) return false;
    // Search filter
    if ($search !== '' && stripos($p['name'], $search) === false) return false;
    return true;
});

// ─── SORT PRODUCTS ───────────────────────────────
$filteredProducts = array_values($filteredProducts); // re-index
usort($filteredProducts, function($a, $b) use ($sort) {
    switch($sort) {
        case 'harga_asc':  return $a['price'] - $b['price'];
        case 'harga_desc': return $b['price'] - $a['price'];
        case 'nama_asc':   return strcmp($a['name'], $b['name']);
        case 'nama_desc':  return strcmp($b['name'], $a['name']);
        default:           return 0; // terbaru (no change)
    }
});
?>
<?php include 'includes/header.php'; ?>

<style>
.filter-sidebar {
    background: var(--fas-white);
    border: 1px solid var(--fas-border);
    border-radius: 8px;
    padding: 1.5rem;
    position: sticky;
    top: 80px;
    box-shadow: var(--shadow);
}
.filter-title {
    font-family: var(--fas-font-cond);
    font-weight: 700;
    font-size: 0.75rem;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    color: var(--fas-text-muted);
    margin-bottom: 1rem;
    padding-bottom: 0.6rem;
    border-bottom: 1px solid var(--fas-border);
}
.filter-item {
    display: flex;
    align-items: center;
    gap: 0.6rem;
    padding: 0.35rem 0;
    font-size: 0.9rem;
    color: var(--fas-text-muted);
    cursor: pointer;
    transition: color 0.2s;
    text-decoration: none;
}
.filter-item:hover {
    color: var(--fas-text);
}
.filter-item.active {
    color: var(--fas-orange);
    font-weight: 600;
}
.filter-item .dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: var(--fas-border);
    flex-shrink: 0;
}
.filter-item.active .dot {
    background: var(--fas-orange);
}
.sort-btn {
    background: var(--fas-white);
    border: 1px solid var(--fas-border);
    border-radius: 6px;
    color: var(--fas-text-muted);
    font-family: var(--fas-font-cond);
    font-weight: 600;
    font-size: 0.8rem;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    padding: 0.4rem 1rem;
    text-decoration: none;
    transition: border-color 0.2s, color 0.2s;
    white-space: nowrap;
}
.sort-btn:hover,
.sort-btn.active {
    border-color: var(--fas-orange);
    color: var(--fas-orange);
}
.search-bar {
    position: relative;
}
.search-bar input {
    background: var(--fas-white);
    border: 1px solid var(--fas-border);
    border-radius: 6px;
    color: var(--fas-text);
    padding: 0.7rem 1rem 0.7rem 2.6rem;
    width: 100%;
    outline: none;
    transition: border-color 0.2s;
}
.search-bar input:focus {
    border-color: var(--fas-orange);
}
.search-bar input::placeholder {
    color: var(--fas-text-muted);
}
.search-bar i {
    position: absolute;
    left: 0.9rem;
    top: 50%;
    transform: translateY(-50%);
    color: var(--fas-text-muted);
}
.fas-input {
    background: var(--fas-white);
    border: 1px solid var(--fas-border);
    border-radius: 6px;
    color: var(--fas-text);
    padding: 0.7rem 1rem;
    width: 100%;
    outline: none;
    transition: border-color 0.2s;
}
.fas-input:focus {
    border-color: var(--fas-orange);
}
.fas-input::placeholder {
    color: var(--fas-text-muted);
}
</style>

<!-- Page Header -->
<div style="background:var(--fas-white);border-bottom:1px solid var(--fas-border);padding:2rem 0;">
    <div class="container">
        <div class="section-label">Produk Kami</div>
        <h1 class="section-title">Katalog Sepatu</h1>
    </div>
</div>

<div class="container" style="padding:2.5rem 0 4rem;">
    <div class="row g-4">

        <!-- ─── SIDEBAR FILTER ──────────────────── -->
        <div class="col-lg-3 d-none d-lg-block">
            <form method="GET" class="filter-sidebar">
                <input type="hidden" name="sort" value="<?= htmlspecialchars($sort) ?>">

                <div class="filter-title">Pencarian</div>
                <div class="search-bar mb-3">
                    <i class="bi bi-search"></i>
                    <input type="text" name="q" placeholder="Cari sepatu..." value="<?= htmlspecialchars($search) ?>">
                </div>

                <div class="filter-title">Kategori</div>
                <a href="<?= '?' . http_build_query(array_merge($_GET, ['kategori' => 0])) ?>"
                   class="filter-item <?= $kategori === 0 ? 'active' : '' ?>">
                    <span class="dot"></span> Semua Kategori
                </a>
                <?php foreach ($kategoriList as $kat): ?>
                <a href="<?= '?' . http_build_query(array_merge($_GET, ['kategori' => $kat['kategori_id']])) ?>"
                   class="filter-item <?= $kategori == $kat['kategori_id'] ? 'active' : '' ?>">
                    <span class="dot"></span> <?= htmlspecialchars($kat['nama_kategori']) ?>
                </a>
                <?php endforeach; ?>

                <div class="filter-title">Rentang Harga</div>
                <div class="mb-2">
                    <label style="font-size:0.75rem;font-weight:600;color:var(--fas-text-muted);">Min</label>
                    <input class="fas-input" type="number" name="harga_min" placeholder="Rp 0" value="<?= $hargaMin ?: '' ?>">
                </div>
                <div class="mb-3">
                    <label style="font-size:0.75rem;font-weight:600;color:var(--fas-text-muted);">Max</label>
                    <input class="fas-input" type="number" name="harga_max" placeholder="Rp <?= number_format($hargaMaxAll, 0, ',', '.') ?>" value="<?= $hargaMax ?: '' ?>">
                </div>
                <button type="submit" class="btn btn-fas-orange w-100">Terapkan Filter</button>
                <?php if ($hargaMin || $hargaMax || $search || $kategori): ?>
                <a href="katalog.php" class="btn btn-fas-outline w-100 mt-2"><i class="bi bi-x me-1"></i>Reset</a>
                <?php endif; ?>
            </form>
        </div>

        <!-- ─── PRODUK AREA ────────────────────── -->
        <div class="col-lg-9">

            <!-- Toolbar -->
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
                <div style="font-size:0.88rem;color:var(--fas-text-muted);">
                    <span style="font-weight:600;color:var(--fas-text);"><?= count($filteredProducts) ?></span> produk ditemukan
                    <?php if ($search): ?>
                        untuk "<span style="color:var(--fas-orange);"><?= htmlspecialchars($search) ?></span>"
                    <?php endif; ?>
                </div>
                <div class="d-flex gap-2 flex-wrap">
                    <?php
                    $sorts = [
                        'terbaru'    => 'Terbaru',
                        'harga_asc'  => '<i class="bi bi-arrow-up me-1"></i>Harga',
                        'harga_desc' => '<i class="bi bi-arrow-down me-1"></i>Harga',
                        'nama_asc'   => 'A–Z',
                        'nama_desc'  => 'Z–A',
                    ];
                    foreach ($sorts as $val => $label):
                        $params = array_merge($_GET, ['sort' => $val]);
                        $isActive = $sort === $val;
                    ?>
                    <a href="?<?= http_build_query($params) ?>" class="sort-btn <?= $isActive ? 'active' : '' ?>"><?= $label ?></a>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Mobile Filter -->
            <div class="d-lg-none mb-3">
                <button class="btn btn-fas-outline w-100" type="button" data-bs-toggle="collapse" data-bs-target="#mobileFilter">
                    <i class="bi bi-funnel me-2"></i>Filter Produk
                </button>
                <div class="collapse mt-2" id="mobileFilter">
                    <form method="GET" class="filter-sidebar" style="position:static;">
                        <input type="hidden" name="sort" value="<?= htmlspecialchars($sort) ?>">
                        <div class="search-bar mb-3">
                            <i class="bi bi-search"></i>
                            <input class="fas-input" type="text" name="q" placeholder="Cari sepatu..." value="<?= htmlspecialchars($search) ?>">
                        </div>
                        <div class="filter-title">Kategori</div>
                        <select class="fas-select w-100 mb-3" name="kategori">
                            <option value="0">Semua Kategori</option>
                            <?php foreach ($kategoriList as $kat): ?>
                            <option value="<?= $kat['kategori_id'] ?>" <?= $kategori == $kat['kategori_id'] ? 'selected' : '' ?>><?= htmlspecialchars($kat['nama_kategori']) ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button type="submit" class="btn btn-fas-orange w-100">Terapkan</button>
                    </form>
                </div>
            </div>

            <!-- Grid -->
            <?php if (count($filteredProducts) > 0): ?>
            <div class="row g-3">
                <?php foreach ($filteredProducts as $p): ?>
                <div class="col-6 col-md-4">
                    <div class="product-card">
                        <a href="detail.php?id=<?= $p['id'] ?>" style="text-decoration:none;">
                            <div class="img-wrap">
                                <img src="<?= $p['gambar'] ?>" alt="<?= htmlspecialchars($p['name']) ?>" onerror="this.src='https://placehold.co/400x400/e9ecef/FF5C00?text=No+Image'">
                            </div>
                            <div class="card-body">
                                <div class="product-brand"><?= htmlspecialchars($p['cat']) ?></div>
                                <div class="product-name"><?= htmlspecialchars($p['name']) ?></div>
                                <div class="d-flex justify-content-between align-items-center mt-1">
                                    <span class="product-price"><?= formatRupiah($p['price']) ?></span>
                                    <span class="stok-badge">Tersedia</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php else: ?>
            <div class="text-center py-5" style="color:var(--fas-text-muted);">
                <i class="bi bi-search fs-1 d-block mb-3" style="color:var(--fas-border);"></i>
                <h5 style="color:var(--fas-text);">Produk tidak ditemukan</h5>
                <p>Coba ubah filter atau kata kunci pencarian kamu.</p>
                <a href="katalog.php" class="btn btn-fas-orange mt-2">Reset Pencarian</a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
