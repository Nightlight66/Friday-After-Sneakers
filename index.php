<?php
$pageTitle = 'Home';
$activePage = 'home';

// ─── BREADCRUMB ──────────────────────────────────
// Home page doesn't need breadcrumb, so we skip it.

// ─── HARDCODED KATEGORI ─────────────────────────────
$kategoriList = [
    ['kategori_id' => 1, 'nama_kategori' => 'Lifestyle'],
    ['kategori_id' => 2, 'nama_kategori' => 'Running'],
    ['kategori_id' => 3, 'nama_kategori' => 'Basketball'],
    ['kategori_id' => 4, 'nama_kategori' => 'Skateboarding'],
];

// ─── HARDCODED PRODUCTS (12 items with unique images) ────
$productList = [
    [
        'id' => 1,
        'name' => 'Nike Air Force 1 \'07',
        'cat' => 'Lifestyle',
        'price' => 1549000,
        'img' => 'https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?w=400'
    ],
    [
        'id' => 2,
        'name' => 'Adidas Yeezy Boost 350 V2',
        'cat' => 'Lifestyle',
        'price' => 3800000,
        'img' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=400'
    ],
    [
        'id' => 3,
        'name' => 'Puma RS-X3',
        'cat' => 'Lifestyle',
        'price' => 1275000,
        'img' => 'https://images.unsplash.com/photo-1560769629-975ec94e6a86?w=400'
    ],
    [
        'id' => 4,
        'name' => 'Converse Chuck 70',
        'cat' => 'Lifestyle',
        'price' => 899000,
        'img' => 'https://images.unsplash.com/photo-1654147801991-a9fa8594e900?q=80&w=751&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
    ],
    [
        'id' => 5,
        'name' => 'New Balance 990v5 Core',
        'cat' => 'Running',
        'price' => 2999000,
        'img' => 'https://images.unsplash.com/photo-1551107696-a4b0c5a0d9a2?q=80&w=812&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
    ],
    [
        'id' => 6,
        'name' => 'ASICS Gel-Kayano 29',
        'cat' => 'Running',
        'price' => 2450000,
        'img' => 'https://images.unsplash.com/photo-1746206673199-5b75dcec1018?q=80&w=464&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
    ],
    [
        'id' => 7,
        'name' => 'Hoka Clifton 9',
        'cat' => 'Running',
        'price' => 1999000,
        'img' => 'https://images.unsplash.com/photo-1543163521-1bf539c55dd2?w=400'
    ],
    [
        'id' => 8,
        'name' => 'Saucony Endorphin Speed',
        'cat' => 'Running',
        'price' => 2150000,
        'img' => 'https://images.unsplash.com/photo-1519415943484-9fa1873496d4?w=400'
    ],
    [
        'id' => 9,
        'name' => 'Nike Air Jordan 1 Retro High',
        'cat' => 'Basketball',
        'price' => 2500000,
        'img' => 'https://images.unsplash.com/photo-1731132198530-e4b2dc51d511?q=80&w=1032&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
    ],
    [
        'id' => 10,
        'name' => 'Adidas Harden Vol. 7',
        'cat' => 'Basketball',
        'price' => 2850000,
        'img' => 'https://images.unsplash.com/photo-1620794341491-76be6eeb6946?q=80&w=394&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
    ],
    [
        'id' => 11,
        'name' => 'Vans Old Skool',
        'cat' => 'Skateboarding',
        'price' => 749000,
        'img' => 'https://images.unsplash.com/photo-1626379530580-6a58c5cf1d5e?q=80&w=387&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
    ],
    [
        'id' => 12,
        'name' => 'Nike SB Dunk Low',
        'cat' => 'Skateboarding',
        'price' => 1099000,
        'img' => 'https://images.unsplash.com/photo-1692620334820-355161f652a8?q=80&w=933&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
    ],
];
?>
<?php include 'includes/header.php'; ?>

<!-- ─── HERO ────────────────────────────────────────── -->
<section style="padding: 3rem 0 2rem; background: var(--fas-white);">
    <div class="container">
        <div class="row align-items-center g-4">
            <!-- Hero Text -->
            <div class="col-lg-6 order-2 order-lg-1">
                <div class="section-label">Welcome to Our Shop</div>
                <h1 style="font-family:var(--fas-font-cond);font-weight:700;font-size:clamp(2.5rem,5vw,4rem);letter-spacing:-0.02em;line-height:1.1;color:var(--fas-text);margin-bottom:0.75rem;">
                    SET YOUR<br>SNEAKER<br>STYLE!
                </h1>
                <p style="font-size:1.05rem;color:var(--fas-text-muted);max-width:480px;line-height:1.7;margin-bottom:1.5rem;">
                    Temukan koleksi sneakers authentic pilihan — dari lifestyle hingga running.
                    Dipercaya ribuan pelanggan selama 7 tahun.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="katalog.php" class="btn btn-fas-orange"><i class="bi bi-grid me-2"></i>Lihat Katalog</a>
                    <a href="https://wa.me/6287762951839" target="_blank" class="btn btn-fas-outline"><i class="bi bi-whatsapp me-2"></i>Hubungi Kami</a>
                </div>
                <!-- Stats inline -->
                <div class="d-flex gap-4 mt-4 pt-3" style="border-top:1px solid var(--fas-border);">
                    <div>
                        <div style="font-weight:700;font-size:1.6rem;color:var(--fas-orange);">7</div>
                        <div style="font-size:0.8rem;color:var(--fas-text-muted);">Tahun Berpengalaman</div>
                    </div>
                    <div>
                        <div style="font-weight:700;font-size:1.6rem;color:var(--fas-orange);">1000+</div>
                        <div style="font-size:0.8rem;color:var(--fas-text-muted);">Produk Terjual</div>
                    </div>
                    <div>
                        <div style="font-weight:700;font-size:1.6rem;color:var(--fas-orange);">100%</div>
                        <div style="font-size:0.8rem;color:var(--fas-text-muted);">Authentic</div>
                    </div>
                </div>
            </div>

            <!-- Hero Image -->
            <div class="col-lg-6 order-1 order-lg-2 text-center">
                <div style="position:relative;display:inline-block;">
                    <img src="https://images.unsplash.com/photo-1751624310884-0948c93d8f28?q=80&w=600&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
                         alt="Hero Sneaker" 
                         style="width:100%;max-width:520px;height:auto;border-radius:12px;box-shadow:var(--shadow-hover);">
                    <div style="position:absolute;bottom:-12px;left:-12px;width:100%;height:100%;border:2px solid var(--fas-orange);border-radius:12px;z-index:-1;"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ─── KATEGORI STRIP ────────────────────────────── -->
<?php if (!empty($kategoriList)): ?>
<div style="background:var(--fas-white);border-bottom:1px solid var(--fas-border);padding:0.8rem 0;">
    <div class="container">
        <div class="d-flex gap-2 flex-wrap justify-content-center">
            <?php foreach ($kategoriList as $kat): ?>
            <a href="katalog.php?kategori=<?= $kat['kategori_id'] ?>"
               class="btn btn-fas-outline" style="font-size:0.85rem;padding:0.4rem 1.2rem;">
                <?= htmlspecialchars($kat['nama_kategori']) ?>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php endif; ?>

<!-- ─── FEATURED PRODUCTS ─────────────────────────── -->
<section style="padding: 4rem 0;">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <div class="section-label">Produk Terbaru</div>
                <h2 class="section-title">Koleksi Pilihan</h2>
            </div>
            <a href="katalog.php" class="btn btn-fas-outline">Lihat Semua <i class="bi bi-arrow-right ms-1"></i></a>
        </div>

        <div id="bulletproofCarousel" style="position:relative; padding:0 50px;">
            <!-- Container with unique ID -->
            <div style="overflow:hidden;">
                <div id="carouselTrack" style="display:flex; transition:transform 0.4s ease-in-out;">
                    <?php foreach ($productList as $p): ?>
                    <div class="bulletproof-item" style="flex:0 0 25%; max-width:25%; padding:0 8px; box-sizing:border-box; min-height:350px;">
                        <div style="height:100%; border:1px solid #e9ecef; border-radius:8px; overflow:hidden; display:flex; flex-direction:column; background:#fff;">
                            <a href="detail.php?id=<?= $p['id'] ?>" style="text-decoration:none; display:flex; flex-direction:column; height:100%;">
                                <div style="aspect-ratio:1/1; overflow:hidden; background:#f1f3f5; flex-shrink:0;">
                                    <img src="<?= $p['img'] ?>" alt="<?= $p['name'] ?>" style="width:100%; height:100%; object-fit:cover; display:block;">
                                </div>
                                <div style="padding:1rem 1.2rem 1.2rem; flex:1; display:flex; flex-direction:column; justify-content:space-between;">
                                    <div>
                                        <div style="font-size:0.7rem; text-transform:uppercase; color:#FF5C00; font-weight:600;"><?= $p['cat'] ?></div>
                                        <div style="font-weight:700; font-size:0.95rem; color:#1a1a1a; line-height:1.2;"><?= $p['name'] ?></div>
                                    </div>
                                    <div>
                                        <div style="font-weight:600; font-size:1.1rem; color:#1a1a1a;">Rp <?= number_format($p['price'],0,',','.') ?></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <button onclick="slideCarousel(-1)" style="position:absolute; top:50%; transform:translateY(-50%); left:-50px; width:48px; height:48px; background:#fff; border:1px solid #e9ecef; border-radius:50%; box-shadow:0 4px 20px rgba(0,0,0,0.06); cursor:pointer; z-index:10; display:flex; align-items:center; justify-content:center;">
                <i class="bi bi-chevron-left" style="font-size:1.2rem;"></i>
            </button>
            <button onclick="slideCarousel(1)" style="position:absolute; top:50%; transform:translateY(-50%); right:-50px; width:48px; height:48px; background:#fff; border:1px solid #e9ecef; border-radius:50%; box-shadow:0 4px 20px rgba(0,0,0,0.06); cursor:pointer; z-index:10; display:flex; align-items:center; justify-content:center;">
                <i class="bi bi-chevron-right" style="font-size:1.2rem;"></i>
            </button>
        </div>
    </div>
</section>

<!-- ─── ABOUT ──────────────────────────────────────── -->
<section id="about" style="padding:4rem 0;background:var(--fas-white);border-top:1px solid var(--fas-border);border-bottom:1px solid var(--fas-border);">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-lg-6">
                <div class="section-label">Tentang Kami</div>
                <h2 class="section-title" style="margin-bottom:1rem;">Siapa Kami?</h2>
                <p style="color:var(--fas-text-muted);line-height:1.8;margin-bottom:1.5rem;">
                    <strong style="color:var(--fas-text);">Friday After Sneakers</strong> adalah toko reseller
                    dan dropship sepatu authentic yang telah berdiri sejak 2019. Kami hadir untuk menjawab
                    kebutuhan para sneakerhead yang menginginkan produk berkualitas dengan pelayanan terpercaya.
                </p>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div style="padding:1.5rem;background:var(--fas-offwhite);border-radius:8px;border-left:3px solid var(--fas-orange);">
                            <div style="font-weight:700;font-size:0.8rem;text-transform:uppercase;letter-spacing:0.1em;color:var(--fas-orange);margin-bottom:0.5rem;">Visi</div>
                            <p style="font-size:0.9rem;line-height:1.6;margin:0;padding-left:1.2rem;color:var(--fas-text-muted);">Menjadi toko sepatu online terpercaya yang dikenal karena kualitas produk dan layanan prima.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div style="padding:1.5rem;background:var(--fas-offwhite);border-radius:8px;border-left:3px solid var(--fas-orange);">
                            <div style="font-weight:700;font-size:0.8rem;text-transform:uppercase;letter-spacing:0.1em;color:var(--fas-orange);margin-bottom:0.5rem;">Misi</div>
                            <ul style="font-size:0.9rem;line-height:1.6;margin:0;padding-left:1.2rem;color:var(--fas-text-muted);">
                                <li>Produk 100% authentic</li>
                                <li>Pelayanan responsif & ramah</li>
                                <li>Harga kompetitif & transparan</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <img src="https://images.unsplash.com/photo-1692620334825-c15878f67796?q=80&w=870&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
                     alt="About" style="width:100%;max-width:480px;border-radius:12px;box-shadow:var(--shadow);">
            </div>
        </div>
    </div>
</section>

<!-- ─── KONTAK ──────────────────────────────────────── -->
<section id="kontak" style="padding:4rem 0;">
    <div class="container text-center">
        <div class="section-label">Butuh Bantuan?</div>
        <h2 class="section-title" style="margin-bottom:0.5rem;">Hubungi Kami Sekarang</h2>
        <p style="color:var(--fas-text-muted);max-width:500px;margin:0 auto 2rem;line-height:1.7;">
            Punya pertanyaan tentang produk, stok, atau pengiriman? Kami siap membantu kamu.
        </p>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="https://wa.me/6287762951839" target="_blank" class="btn btn-fas-orange">
                <i class="bi bi-whatsapp me-2"></i>Chat via WhatsApp
            </a>
            <a href="https://instagram.com/fridayafter.sneakers" target="_blank" class="btn btn-fas-outline">
                <i class="bi bi-instagram me-2"></i>Instagram
            </a>
        </div>
    </div>
</section>

<style>
/* ─── CAROUSEL ITEMS ────────────────────────────── */
.bulletproof-item {
    flex: 0 0 25%; /* 4 items per row on desktop */
    max-width: 25%;
    padding: 0 8px;
    box-sizing: border-box;
    min-height: 350px;
}
/* ─── PRODUCT CARD ──────────────────────────────── */
.product-card {
    height: 100%;
    border: 1px solid var(--fas-border);
    border-radius: 8px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    background: var(--fas-white);
    transition: transform 0.3s, box-shadow 0.3s;
}
.product-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-hover);
}
.img-wrap {
    aspect-ratio: 1/1;
    overflow: hidden;
    background: var(--fas-light);
    flex-shrink: 0;
}
.img-wrap img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.4s;
}
.product-card:hover .img-wrap img {
    transform: scale(1.05);
}
.card-body {
    padding: 1rem 1.2rem 1.2rem;
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
.product-brand {
    font-size: 0.7rem;
    text-transform: uppercase;
    color: var(--fas-orange);
    font-weight: 600;
}
.product-name {
    font-family: var(--fas-font-cond);
    font-weight: 700;
    font-size: 0.95rem;
    color: var(--fas-text);
    line-height: 1.2;
}
.product-price {
    font-weight: 600;
    font-size: 1.1rem;
    color: var(--fas-black);
}
/* ─── NAVIGATION BUTTONS ────────────────────────── */
.carousel-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 48px;
    height: 48px;
    background: var(--fas-white);
    border: 1px solid var(--fas-border);
    border-radius: 50%;
    box-shadow: var(--shadow);
    cursor: pointer;
    z-index: 10;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s;
}
.carousel-btn:hover {
    background: var(--fas-orange);
    border-color: var(--fas-orange);
}
.carousel-btn:hover i {
    color: #fff;
}
.carousel-btn.prev { left: -70px; }
.carousel-btn.next { right: -70px; }
/* ─── RESPONSIVE ────────────────────────────────── */
@media (max-width: 992px) {
    .bulletproof-item { flex: 0 0 33.333%; max-width: 33.333%; } /* 3 items */
}
@media (max-width: 768px) {
    .bulletproof-item { flex: 0 0 50%; max-width: 50%; min-height: 280px; } /* 2 items */
    .carousel-btn { width: 36px; height: 36px; }
    .carousel-btn.prev { left: -20px; }
    .carousel-btn.next { right: -20px; }
}
@media (max-width: 480px) {
    .bulletproof-item { flex: 0 0 100%; max-width: 100%; } /* 1 item */
}
</style>

<script>
let currentPosition = 0;
const track = document.getElementById('carouselTrack');
const items = document.querySelectorAll('.bulletproof-item');
const totalItems = items.length;
const visibleItems = 4;

function slideCarousel(direction) {
    currentPosition += direction;
    const maxPosition = totalItems - visibleItems;
    if (currentPosition < 0) currentPosition = maxPosition;
    if (currentPosition > maxPosition) currentPosition = 0;
    const translateX = -currentPosition * (items[0].offsetWidth + 16);
    track.style.transform = `translateX(${translateX}px)`;
}
</script>

<?php include 'includes/footer.php'; ?>
