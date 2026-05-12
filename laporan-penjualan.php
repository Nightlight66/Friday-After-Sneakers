<?php
// laporan-penjualan.php
$pageTitle = 'Laporan Penjualan';
$activePage = 'laporan';
$breadcrumbItems = [
    ['url' => '/index.php', 'label' => 'Home'],
    ['label' => 'Laporan Penjualan']
];
include 'includes/header.php';
include 'includes/breadcrumb.php';
?>

<div class="container" style="padding:2rem 0 4rem;">
    <div class="d-flex justify-content-between align-items-end mb-4">
        <div>
            <div class="section-label">Rekap Penjualan</div>
            <h1 class="section-title">Laporan Tahunan 2026</h1>
        </div>
        <div style="background:var(--fas-white);border:1px solid var(--fas-border);border-radius:8px;padding:0.4rem 1rem;font-weight:600;color:var(--fas-text);">
            <i class="bi bi-calendar3 me-1"></i> 2026
        </div>
    </div>

    <!-- ─── SUMMARY CARDS ────────────────────────────── -->
    <div class="row g-3 mb-4">
        <div class="col-6 col-lg-3">
            <div style="background:var(--fas-white);border-radius:8px;box-shadow:var(--shadow);padding:1.2rem 1.2rem;">
                <div style="font-size:0.7rem;font-weight:600;text-transform:uppercase;letter-spacing:0.08em;color:var(--fas-text-muted);">Total Omset</div>
                <div style="font-weight:700;font-size:1.6rem;color:var(--fas-orange);">Rp 427.800.000</div>
                <div style="font-size:0.8rem;color:var(--fas-text-muted);">↑ 12,4% dari tahun lalu</div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div style="background:var(--fas-white);border-radius:8px;box-shadow:var(--shadow);padding:1.2rem 1.2rem;">
                <div style="font-size:0.7rem;font-weight:600;text-transform:uppercase;letter-spacing:0.08em;color:var(--fas-text-muted);">Total Transaksi</div>
                <div style="font-weight:700;font-size:1.6rem;color:var(--fas-text);">1.248</div>
                <div style="font-size:0.8rem;color:var(--fas-text-muted);">Rata‑rata Rp 342.000 / transaksi</div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div style="background:var(--fas-white);border-radius:8px;box-shadow:var(--shadow);padding:1.2rem 1.2rem;">
                <div style="font-size:0.7rem;font-weight:600;text-transform:uppercase;letter-spacing:0.08em;color:var(--fas-text-muted);">Sepatu Terjual</div>
                <div style="font-weight:700;font-size:1.6rem;color:var(--fas-text);">1.672</div>
                <div style="font-size:0.8rem;color:var(--fas-text-muted);">pasang sepatu</div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div style="background:var(--fas-white);border-radius:8px;box-shadow:var(--shadow);padding:1.2rem 1.2rem;">
                <div style="font-size:0.7rem;font-weight:600;text-transform:uppercase;letter-spacing:0.08em;color:var(--fas-text-muted);">Bulan Terbaik</div>
                <div style="font-weight:700;font-size:1.6rem;color:var(--fas-orange);">April</div>
                <div style="font-size:0.8rem;color:var(--fas-text-muted);">Rp 58.200.000</div>
            </div>
        </div>
    </div>

    <!-- ─── CHART ─────────────────────────────────────── -->
    <div style="background:var(--fas-white);border-radius:8px;box-shadow:var(--shadow);padding:1.5rem;margin-bottom:2rem;">
        <div style="font-weight:600;font-size:0.85rem;margin-bottom:1rem;">Omset Bulanan (dalam Juta Rp)</div>
        <canvas id="omsetChart" style="max-height:280px;"></canvas>
    </div>

    <!-- ─── TABLE ─────────────────────────────────────── -->
    <div style="background:var(--fas-white);border-radius:8px;box-shadow:var(--shadow);overflow:hidden;margin-bottom:2rem;">
        <div style="overflow-x:auto;">
            <table style="width:100%;border-collapse:collapse;font-size:0.9rem;">
                <thead>
                    <tr style="background:var(--fas-offwhite);">
                        <th style="padding:0.8rem 1rem;text-align:left;font-weight:600;font-size:0.75rem;text-transform:uppercase;letter-spacing:0.05em;color:var(--fas-text-muted);">Bulan</th>
                        <th style="padding:0.8rem 1rem;text-align:right;font-weight:600;font-size:0.75rem;text-transform:uppercase;letter-spacing:0.05em;color:var(--fas-text-muted);">Transaksi</th>
                        <th style="padding:0.8rem 1rem;text-align:right;font-weight:600;font-size:0.75rem;text-transform:uppercase;letter-spacing:0.05em;color:var(--fas-text-muted);">Pasang Terjual</th>
                        <th style="padding:0.8rem 1rem;text-align:right;font-weight:600;font-size:0.75rem;text-transform:uppercase;letter-spacing:0.05em;color:var(--fas-text-muted);">Omset</th>
                        <th style="padding:0.8rem 1rem;text-align:right;font-weight:600;font-size:0.75rem;text-transform:uppercase;letter-spacing:0.05em;color:var(--fas-text-muted);">Rata‑rata</th>
                        <th style="width:120px;padding:0.8rem 1rem;font-weight:600;font-size:0.75rem;text-transform:uppercase;letter-spacing:0.05em;color:var(--fas-text-muted);">Proporsi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $months = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
                $data = [
                    [98,120,34.2],[85,110,29.8],[112,145,39.5],
                    [140,185,58.2],[125,160,44.0],[108,135,37.6],
                    [94,115,32.0],[118,150,48.5],[105,130,35.8],
                    [130,170,51.5],[88,105,28.5],[55,65,17.2]
                ];
                $maxOmset = max(array_column($data,2));
                ?>
                <?php for ($m = 0; $m < 12; $m++): 
                    $trx = $data[$m][0];
                    $terjual = $data[$m][1];
                    $omset = $data[$m][2];
                    $barWidth = round($omset / $maxOmset * 100);
                ?>
                <tr style="border-bottom:1px solid var(--fas-border);">
                    <td style="padding:0.7rem 1rem;font-weight:500;"><?= $months[$m] ?></td>
                    <td style="padding:0.7rem 1rem;text-align:right;"><?= number_format($trx) ?></td>
                    <td style="padding:0.7rem 1rem;text-align:right;"><?= number_format($terjual) ?></td>
                    <td style="padding:0.7rem 1rem;text-align:right;font-weight:600;color:var(--fas-orange);">Rp <?= number_format($omset * 1_000_000,0,',','.') ?></td>
                    <td style="padding:0.7rem 1rem;text-align:right;color:var(--fas-text-muted);font-size:0.85rem;">Rp <?= number_format(($trx>0?$omset/$trx:0)*1_000_000,0,',','.') ?></td>
                    <td style="padding:0.7rem 1rem;">
                        <div style="background:var(--fas-light);height:6px;border-radius:4px;overflow:hidden;">
                            <div style="height:100%;width:<?= $barWidth ?>%;background:var(--fas-orange);border-radius:4px;"></div>
                        </div>
                    </td>
                </tr>
                <?php endfor; ?>
                </tbody>
                <tfoot>
                    <tr style="background:var(--fas-black);color:#fff;">
                        <td style="padding:0.8rem 1rem;font-weight:700;">TOTAL</td>
                        <td style="padding:0.8rem 1rem;text-align:right;">1.248</td>
                        <td style="padding:0.8rem 1rem;text-align:right;">1.672</td>
                        <td style="padding:0.8rem 1rem;text-align:right;color:var(--fas-orange);font-weight:700;">Rp 427.800.000</td>
                        <td style="padding:0.8rem 1rem;text-align:right;color:rgba(255,255,255,0.6);">Rp 342.000</td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('omsetChart').getContext('2d');
    const data = [34.2,29.8,39.5,58.2,44.0,37.6,32.0,48.5,35.8,51.5,28.5,17.2];
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'],
            datasets: [{
                label: 'Omset (Juta Rp)',
                data: data,
                backgroundColor: data.map(v => v > 0 ? 'rgba(255,92,0,0.7)' : 'rgba(0,0,0,0.06)'),
                borderColor: data.map(v => v > 0 ? '#FF5C00' : 'transparent'),
                borderWidth: 0,
                borderRadius: 4,
            }]
        },
        options: {
            responsive: true, maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: '#fff',
                    borderColor: '#e9ecef',
                    borderWidth: 1,
                    titleColor: '#1a1a1a',
                    bodyColor: '#1a1a1a',
                    callbacks: { label: c => 'Rp ' + c.raw.toFixed(1) + ' Juta' }
                }
            },
            scales: {
                x: { grid: { color: 'rgba(0,0,0,0.04)' }, ticks: { color: '#6c757d' } },
                y: { grid: { color: 'rgba(0,0,0,0.04)' }, ticks: { color: '#6c757d', callback: v => v + 'Jt' } }
            }
        }
    });
});
</script>

<?php include 'includes/footer.php'; ?>