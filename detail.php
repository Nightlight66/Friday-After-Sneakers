<?php
$id = (int)($_GET['id'] ?? 0);
if (!$id) { header('Location: katalog.php'); exit; }

// ─── HARDCODED PRODUCT DATA (match the 12 products from index.php & katalog.php) ────
$allProducts = [
    1 => [
        'id' => 1,
        'nama_sepatu' => 'Nike Air Force 1 \'07',
        'nama_kategori' => 'Lifestyle',
        'harga' => 1549000,
        'deskripsi' => 'The classic Air Force 1 gets a fresh look. Premium leather upper with Nike Air cushioning.',
        'gambar' => 'https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?w=400',
        'ukuran' => ['40', '41', '42', '43', '44'],
        'stok' => 10
    ],
    2 => [
        'id' => 2,
        'nama_sepatu' => 'Adidas Yeezy Boost 350 V2',
        'nama_kategori' => 'Lifestyle',
        'harga' => 3800000,
        'deskripsi' => 'The iconic Yeezy Boost 350 V2 with Primeknit upper and Boost cushioning.',
        'gambar' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=400',
        'ukuran' => ['40', '41', '42', '43', '44', '45'],
        'stok' => 5
    ],
    3 => [
        'id' => 3,
        'nama_sepatu' => 'Puma RS-X3',
        'nama_kategori' => 'Lifestyle',
        'harga' => 1275000,
        'deskripsi' => 'Bold design with RS-X3 technology. Comfortable and stylish for everyday wear.',
        'gambar' => 'https://images.unsplash.com/photo-1560769629-975ec94e6a86?w=400',
        'ukuran' => ['41', '42', '43'],
        'stok' => 7
    ],
    4 => [
        'id' => 4,
        'nama_sepatu' => 'Converse Chuck 70',
        'nama_kategori' => 'Lifestyle',
        'harga' => 899000,
        'deskripsi' => 'Classic Converse Chuck 70 with premium canvas and vintage details.',
        'gambar' => 'https://images.unsplash.com/photo-1654147801991-a9fa8594e900?q=80&w=751&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
        'ukuran' => ['36', '37', '38', '39', '40'],
        'stok' => 12
    ],
    5 => [
        'id' => 5,
        'nama_sepatu' => 'New Balance 990v5 Core',
        'nama_kategori' => 'Running',
        'harga' => 2999000,
        'deskripsi' => 'Premium running shoe with ENCAP midsole technology. Trusted by runners worldwide.',
        'gambar' => 'https://images.unsplash.com/photo-1551107696-a4b0c5a0d9a2?q=80&w=812&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
        'ukuran' => ['40', '41', '42', '43', '44', '45'],
        'stok' => 8
    ],
    // ... Add remaining 7 products from your index.php list
    6 => [
        'id' => 6,
        'nama_sepatu' => 'ASICS Gel-Kayano 29',
        'nama_kategori' => 'Running',
        'harga' => 2450000,
        'deskripsi' => 'Advanced stability running shoe with Gel technology.',
        'gambar' => 'https://images.unsplash.com/photo-1746206673199-5b75dcec1018?q=80&w=464&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
        'ukuran' => ['41', '42', '43', '44'],
        'stok' => 6
    ],
    7 => [
        'id' => 7,
        'nama_sepatu' => 'Hoka Clifton 9',
        'nama_kategori' => 'Running',
        'harga' => 1999000,
        'deskripsi' => 'Lightweight cushioning for long distance runs.',
        'gambar' => 'https://images.unsplash.com/photo-1543163521-1bf539c55dd2?w=400',
        'ukuran' => ['40', '41', '42', '43'],
        'stok' => 9
    ],
    8 => [
        'id' => 8,
        'nama_sepatu' => 'Saucony Endorphin Speed',
        'nama_kategori' => 'Running',
        'harga' => 2150000,
        'deskripsi' => 'Speed-focused running shoe with PWRRUN PB cushioning.',
        'gambar' => 'https://images.unsplash.com/photo-1519415943484-9fa1873496d4?w=400',
        'ukuran' => ['41', '42', '43'],
        'stok' => 4
    ],
    9 => [
        'id' => 9,
        'nama_sepatu' => 'Nike Air Jordan 1 Retro High',
        'nama_kategori' => 'Basketball',
        'harga' => 2500000,
        'deskripsi' => 'Iconic Jordan 1 design with premium leather and classic colorway.',
        'gambar' => 'https://images.unsplash.com/photo-1731132198530-e4b2dc51d511?q=80&w=1032&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
        'ukuran' => ['42', '43', '44'],
        'stok' => 3
    ],
    10 => [
        'id' => 10,
        'nama_sepatu' => 'Adidas Harden Vol. 7',
        'nama_kategori' => 'Basketball',
        'harga' => 2850000,
        'deskripsi' => 'High-performance basketball shoe with Boost cushioning.',
        'gambar' => 'https://images.unsplash.com/photo-1620794341491-76be6eeb6946?q=80&w=394&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
        'ukuran' => ['41', '42', '43', '44', '45'],
        'stok' => 5
    ],
    11 => [
        'id' => 11,
        'nama_sepatu' => 'Vans Old Skool',
        'nama_kategori' => 'Skateboarding',
        'harga' => 749000,
        'deskripsi' => 'Timeless Vans design with side stripe and durable canvas.',
        'gambar' => 'https://images.unsplash.com/photo-1626379530580-6a58c5cf1d5e?q=80&w=387&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
        'ukuran' => ['36', '37', '38', '39', '40', '41', '42'],
        'stok' => 15
    ],
    12 => [
        'id' => 12,
        'nama_sepatu' => 'Nike SB Dunk Low',
        'nama_kategori' => 'Skateboarding',
        'harga' => 1099000,
        'deskripsi' => 'Skateboarding classic with padded tongue and cupsole.',
        'gambar' => 'https://images.unsplash.com/photo-1692620334820-355161f652a8?q=80&w=933&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
        'ukuran' => ['40', '41', '42', '43', '44'],
        'stok' => 6
    ],
];

if (!isset($allProducts[$id])) {
    header('Location: katalog.php');
    exit;
}

$sepatu = $allProducts[$id];
$stokData = array_map(function($uk) use ($sepatu) {
    return ['ukuran' => $uk, 'jumlah_stok' => $sepatu['stok']];
}, $sepatu['ukuran']);

$pageTitle = $sepatu['nama_sepatu'];
$activePage = 'katalog';
$breadcrumbItems = [
    ['url' => 'index.php', 'label' => 'Home'],
    ['url' => 'katalog.php', 'label' => 'Katalog'],
    ['label' => $sepatu['nama_sepatu']]
];
?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/breadcrumb.php'; ?>

<style>
.ukuran-btn { display:none; }
.ukuran-label {
    display:inline-flex;align-items:center;justify-content:center;
    min-width:48px;height:38px;padding:0 0.5rem;
    border:1px solid var(--fas-border);
    border-radius:6px;
    font-family:var(--fas-font-cond);font-weight:700;font-size:0.85rem;
    letter-spacing:0.05em;cursor:pointer;
    color:var(--fas-text-muted);background:var(--fas-white);
    transition:all 0.2s;
}
.ukuran-btn:checked + .ukuran-label {
    border-color:var(--fas-orange);
    color:var(--fas-orange);
    background:rgba(255,92,0,0.05);
}
.ukuran-label.habis {
    opacity:0.4;cursor:not-allowed;text-decoration:line-through;
}
.ukuran-btn:disabled + .ukuran-label { pointer-events:none; }
</style>

<div class="container" style="padding:2rem 0 4rem;">
    <div class="row g-4">
        <!-- Gambar -->
        <div class="col-lg-6">
            <div style="position:sticky;top:80px;">
                <div style="background:var(--fas-white);border-radius:12px;box-shadow:var(--shadow);overflow:hidden;aspect-ratio:1/1;display:flex;align-items:center;justify-content:center;">
                    <img src="<?= $sepatu['gambar'] ?>" alt="<?= htmlspecialchars($sepatu['nama_sepatu']) ?>" style="width:100%;height:100%;object-fit:cover;">
                </div>
            </div>
        </div>

        <!-- Detail -->
        <div class="col-lg-6">
            <div class="section-label" style="margin-bottom:0.25rem;"><?= htmlspecialchars($sepatu['nama_kategori']) ?></div>
            <h1 style="font-family:var(--fas-font-cond);font-weight:700;font-size:clamp(1.6rem,3vw,2.8rem);letter-spacing:0.02em;color:var(--fas-text);margin-bottom:0.5rem;">
                <?= htmlspecialchars($sepatu['nama_sepatu']) ?>
            </h1>
            <div style="font-weight:600;font-size:1.6rem;color:var(--fas-orange);margin-bottom:1.5rem;">
                <?= formatRupiah($sepatu['harga']) ?>
            </div>

            <p style="color:var(--fas-text-muted);line-height:1.8;font-size:0.95rem;margin-bottom:1.5rem;">
                <?= nl2br(htmlspecialchars($sepatu['deskripsi'])) ?>
            </p>

            <div style="height:1px;background:var(--fas-border);margin:1.5rem 0;"></div>

            <!-- Pilih Ukuran -->
            <div class="mb-4">
                <div style="font-weight:600;font-size:0.85rem;margin-bottom:0.5rem;">Pilih Ukuran</div>
                <div class="d-flex flex-wrap gap-2">
                    <?php foreach ($stokData as $stok): ?>
                    <div>
                        <input type="radio" class="ukuran-btn" name="ukuran" id="uk_<?= $stok['ukuran'] ?>" value="<?= htmlspecialchars($stok['ukuran']) ?>" required>
                        <label for="uk_<?= $stok['ukuran'] ?>" class="ukuran-label" title="Stok: <?= $stok['jumlah_stok'] ?>">
                            EU <?= htmlspecialchars($stok['ukuran']) ?>
                        </label>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Jumlah -->
            <div class="mb-4">
                <div style="font-weight:600;font-size:0.85rem;margin-bottom:0.5rem;">Jumlah</div>
                <div class="d-flex align-items-center gap-0" style="width:fit-content;">
                    <button type="button" onclick="changeQty(-1)" style="width:36px;height:36px;background:var(--fas-white);border:1px solid var(--fas-border);color:var(--fas-text);font-size:1rem;cursor:pointer;border-radius:4px;">−</button>
                    <input type="number" id="qtyInput" name="jumlah" value="1" min="1" style="width:50px;height:36px;text-align:center;background:var(--fas-white);border:1px solid var(--fas-border);border-left:none;border-right:none;color:var(--fas-text);font-weight:600;">
                    <button type="button" onclick="changeQty(1)" style="width:36px;height:36px;background:var(--fas-white);border:1px solid var(--fas-border);color:var(--fas-text);font-size:1rem;cursor:pointer;border-radius:4px;">+</button>
                </div>
            </div>

            <!-- CTA -->
            <div class="d-flex gap-3">
                <a href="https://wa.me/6287762951839?text=Halo+kak,+saya+tertarik+dengan+<?= urlencode($sepatu['nama_sepatu']) ?>" target="_blank" class="btn btn-fas-orange flex-grow-1 py-3" style="font-size:1rem;">
                    <i class="bi bi-whatsapp me-2"></i>Beli via WhatsApp
                </a>
                <a href="katalog.php" class="btn btn-fas-outline py-3 px-3">
                    <i class="bi bi-arrow-left"></i> Kembali ke Katalog
                </a>
            </div>

            <div style="height:1px;background:var(--fas-border);margin:1.5rem 0;"></div>

            <div class="d-flex flex-column gap-2">
                <div class="d-flex align-items-center gap-2"><i class="bi bi-shield-check text-success"></i> <span style="color:var(--fas-text-muted);font-size:0.88rem;">Produk 100% Authentic & Original</span></div>
                <div class="d-flex align-items-center gap-2"><i class="bi bi-truck" style="color:var(--fas-orange);"></i> <span style="color:var(--fas-text-muted);font-size:0.88rem;">Pengiriman ke seluruh Indonesia</span></div>
                <div class="d-flex align-items-center gap-2"><i class="bi bi-whatsapp text-success"></i> <span style="color:var(--fas-text-muted);font-size:0.88rem;">Konsultasi via <a href="https://wa.me/6287762951839" target="_blank" style="color:var(--fas-orange);text-decoration:none;">WhatsApp</a></span></div>
            </div>
        </div>
    </div>
</div>

<script>
function changeQty(delta) {
    const input = document.getElementById('qtyInput');
    let val = parseInt(input.value) + delta;
    if (val < 1) val = 1;
    input.value = val;
}
</script>

<?php include 'includes/footer.php'; ?>
