<?php
require_once 'includes/auth.php';
require_once 'includes/db.php';
$pageTitle = 'Katalog Sepatu';
$activePage = 'katalog';

// ─── FILTER & SORT PARAMS ────────────────────────
$sort      = $_GET['sort']      ?? 'terbaru';
$kategori  = (int)($_GET['kategori'] ?? 0);
$hargaMin  = (int)($_GET['harga_min'] ?? 0);
$hargaMax  = (int)($_GET['harga_max'] ?? 0);
$search    = trim($_GET['q'] ?? '');

// ─── ORDER BY ────────────────────────────────────
$orderBy = match($sort) {
    'harga_asc'  => 's.harga ASC',
    'harga_desc' => 's.harga DESC',
    'nama_asc'   => 's.nama_sepatu ASC',
    'nama_desc'  => 's.nama_sepatu DESC',
    default      => 's.created_at DESC',
};

// ─── BUILD QUERY ─────────────────────────────────
$where = ['1=1'];
$params = [];
$types  = '';

if ($kategori > 0) {
    $where[] = 's.kategori_id = ?';
    $params[] = $kategori;
    $types .= 'i';
}
if ($hargaMin > 0) {
    $where[] = 's.harga >= ?';
    $params[] = $hargaMin;
    $types .= 'i';
}
if ($hargaMax > 0) {
    $where[] = 's.harga <= ?';
    $params[] = $hargaMax;
    $types .= 'i';
}
if ($search !== '') {
    $where[] = 's.nama_sepatu LIKE ?';
    $params[] = "%$search%";
    $types .= 's';
}

$whereStr = implode(' AND ', $where);

$sql = "SELECT s.*, k.nama_kategori,
        COALESCE(SUM(ss.jumlah_stok),0) AS total_stok
        FROM sepatu s
        LEFT JOIN kategori_produk k ON s.kategori_id = k.kategori_id
        LEFT JOIN stok_sepatu ss ON s.sepatu_id = ss.sepatu_id
        WHERE $whereStr
        GROUP BY s.sepatu_id
        ORDER BY $orderBy";

$stmt = $conn->prepare($sql);
if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}
$stmt->execute();
$result = $stmt->get_result();

// ─── KATEGORI LIST ───────────────────────────────
$kategoriRes = $conn->query("SELECT * FROM kategori_produk ORDER BY nama_kategori");
$kategoriList = [];
while ($k = $kategoriRes->fetch_assoc()) $kategoriList[] = $k;

// ─── PRICE RANGE ─────────────────────────────────
$priceRange = $conn->query("SELECT MIN(harga) AS min_h, MAX(harga) AS max_h FROM sepatu")->fetch_assoc();
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
                    <input class="fas-input" type="number" name="harga_max" placeholder="Rp <?= number_format($priceRange['max_h'] ?? 0, 0, ',', '.') ?>" value="<?= $hargaMax ?: '' ?>">
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
                    <span style="font-weight:600;color:var(--fas-text);"><?= $result->num_rows ?></span> produk ditemukan
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
            <?php if ($result->num_rows > 0): ?>
            <div class="row g-3">
                <?php while ($p = $result->fetch_assoc()): ?>
                <div class="col-6 col-md-4">
                    <div class="product-card">
                        <a href="detail.php?id=<?= $p['sepatu_id'] ?>" style="text-decoration:none;">
                            <div class="img-wrap">
                                <?php $srcGambar = (strpos($p['gambar'], 'http') === 0) ? $p['gambar'] : 'uploads/sepatu/' . $p['gambar']; ?>
                                <img src="<?= htmlspecialchars($srcGambar) ?>" alt="<?= htmlspecialchars($p['nama_sepatu']) ?>" onerror="this.src='https://placehold.co/400x400/e9ecef/FF5C00?text=No+Image'">
                            </div>
                            <div class="card-body">
                                <div class="product-brand"><?= htmlspecialchars($p['nama_kategori']) ?></div>
                                <div class="product-name"><?= htmlspecialchars($p['nama_sepatu']) ?></div>
                                <div class="d-flex justify-content-between align-items-center mt-1">
                                    <span class="product-price"><?= formatRupiah($p['harga']) ?></span>
                                    <?php if ($p['total_stok'] <= 0): ?>
                                        <span class="stok-badge habis">Habis</span>
                                    <?php elseif ($p['total_stok'] <= 5): ?>
                                        <span class="stok-badge kritis">Sisa <?= $p['total_stok'] ?></span>
                                    <?php else: ?>
                                        <span class="stok-badge">Tersedia</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <?php endwhile; ?>
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
