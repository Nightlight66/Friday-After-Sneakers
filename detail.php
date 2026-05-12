<?php
require_once 'includes/auth.php';
require_once 'includes/db.php';

$id = (int)($_GET['id'] ?? 0);
if (!$id) { header('Location: /katalog.php'); exit; }

$stmt = $conn->prepare("SELECT s.*, k.nama_kategori
    FROM sepatu s LEFT JOIN kategori_produk k ON s.kategori_id = k.kategori_id
    WHERE s.sepatu_id = ?");
$stmt->bind_param('i', $id);
$stmt->execute();
$sepatu = $stmt->get_result()->fetch_assoc();

if (!$sepatu) { header('Location: /katalog.php'); exit; }

$stokRes = $conn->prepare("SELECT * FROM stok_sepatu WHERE sepatu_id = ? ORDER BY ukuran+0");
$stokRes->bind_param('i', $id);
$stokRes->execute();
$stokData = $stokRes->get_result()->fetch_all(MYSQLI_ASSOC);

$pageTitle = $sepatu['nama_sepatu'];
$activePage = 'katalog';
$breadcrumbItems = [
    ['url' => '/index.php', 'label' => 'Home'],
    ['url' => '/katalog.php', 'label' => 'Katalog'],
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
                    <?php if ($sepatu['gambar'] && file_exists('uploads/sepatu/' . $sepatu['gambar'])): ?>
                        <img src="/uploads/sepatu/<?= htmlspecialchars($sepatu['gambar']) ?>" alt="<?= htmlspecialchars($sepatu['nama_sepatu']) ?>" style="width:100%;height:100%;object-fit:cover;">
                    <?php else: ?>
                        <div class="text-center">
                            <i class="bi bi-image" style="font-size:4rem;color:var(--fas-border);"></i>
                            <p style="color:var(--fas-text-muted);font-size:0.8rem;margin-top:0.5rem;">Belum ada foto</p>
                        </div>
                    <?php endif; ?>
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

            <?php if ($sepatu['deskripsi']): ?>
            <p style="color:var(--fas-text-muted);line-height:1.8;font-size:0.95rem;margin-bottom:1.5rem;">
                <?= nl2br(htmlspecialchars($sepatu['deskripsi'])) ?>
            </p>
            <?php endif; ?>

            <div style="height:1px;background:var(--fas-border);margin:1.5rem 0;"></div>

            <!-- Pilih Ukuran -->
            <div class="mb-4">
                <div style="font-weight:600;font-size:0.85rem;margin-bottom:0.5rem;">Pilih Ukuran</div>
                <div class="d-flex flex-wrap gap-2">
                    <?php foreach ($stokData as $stok):
                        $habis = $stok['jumlah_stok'] <= 0;
                    ?>
                    <div>
                        <input type="radio" class="ukuran-btn" name="ukuran" id="uk_<?= $stok['ukuran'] ?>" value="<?= htmlspecialchars($stok['ukuran']) ?>" <?= $habis ? 'disabled' : '' ?> required>
                        <label for="uk_<?= $stok['ukuran'] ?>" class="ukuran-label <?= $habis ? 'habis' : '' ?>" title="<?= $habis ? 'Stok habis' : 'Stok: ' . $stok['jumlah_stok'] ?>">
                            EU <?= htmlspecialchars($stok['ukuran']) ?>
                        </label>
                    </div>
                    <?php endforeach; ?>
                    <?php if (empty($stokData)): ?>
                    <p style="color:var(--fas-text-muted);font-size:0.9rem;">Belum ada data ukuran.</p>
                    <?php endif; ?>
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
                <button type="submit" class="btn btn-fas-orange flex-grow-1 py-3" style="font-size:1rem;" <?= empty($stokData) ? 'disabled' : '' ?>>
                    <i class="bi bi-bag-plus me-2"></i> Tambah ke Keranjang
                </button>
                <a href="https://wa.me/6281234567890?text=Halo+kak,+saya+tertarik+dengan+<?= urlencode($sepatu['nama_sepatu']) ?>" target="_blank" class="btn btn-fas-outline py-3 px-3">
                    <i class="bi bi-whatsapp"></i>
                </a>
            </div>

            <div style="height:1px;background:var(--fas-border);margin:1.5rem 0;"></div>

            <!-- Info -->
            <div class="d-flex flex-column gap-2">
                <div class="d-flex align-items-center gap-2"><i class="bi bi-shield-check text-success"></i> <span style="color:var(--fas-text-muted);font-size:0.88rem;">Produk 100% Authentic & Original</span></div>
                <div class="d-flex align-items-center gap-2"><i class="bi bi-truck" style="color:var(--fas-orange);"></i> <span style="color:var(--fas-text-muted);font-size:0.88rem;">Pengiriman ke seluruh Indonesia</span></div>
                <div class="d-flex align-items-center gap-2"><i class="bi bi-whatsapp text-success"></i> <span style="color:var(--fas-text-muted);font-size:0.88rem;">Konsultasi via <a href="https://wa.me/6281234567890" target="_blank" style="color:var(--fas-orange);text-decoration:none;">WhatsApp</a></span></div>
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