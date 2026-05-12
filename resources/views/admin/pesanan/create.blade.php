<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pesanan - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a href="{{ route('user.home') }}" class="nav-link"><i class="bi bi-house-door me-1"></i> Home</a>
                    </li>
                </ul>
            </div>
            <a class="navbar-brand me-0">Admin Sepatu</a>
        </div>
    </nav>

    <div class="container">
        <div class="mb-3">
            <a href="{{ route('pesanan.index') }}" class="text-decoration-none text-muted small">
                <i class="bi bi-arrow-left"></i> Kembali ke Daftar Pesanan
            </a>
            <h4 class="mt-2">Tambah Pesanan Baru</h4>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('pesanan.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label font-weight-bold">Pilih Sepatu</label>
                            <select name="sepatu_id" id="sepatu_select" class="form-select @error('sepatu_id') is-invalid @enderror" required>
                                <option value="" selected disabled>-- Pilih Produk Sepatu --</option>
                                @foreach($sepatu as $item)
                                    <option value="{{ $item->sepatu_id }}" data-harga="{{ $item->harga_sepatu }}">
                                        {{ $item->nama_sepatu }}
                                    </option>
                                @endforeach
                            </select>
                            @error('sepatu_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label font-weight-bold text-muted">Harga Satuan (Visual)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">Rp</span>
                                <input type="number" id="harga_satuan_input" class="form-control bg-light text-muted" placeholder="0" readonly>
                            </div>
                        </div>

                            <!-- Jumlah Pesanan -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label font-weight-bold">Jumlah Pesanan</label>
                            <input type="number" name="jumlah_pesanan" id="jumlah_input" class="form-control" value="1" min="1" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label font-weight-bold text-primary">Total Harga</label>
                            <div class="input-group">
                                <span class="input-group-text bg-primary text-white">Rp</span>
                                <input type="number" name="total_harga" id="total_harga_input" class="form-control border-primary text-primary fw-bold bg-light" placeholder="0" readonly>
                            </div>
                        </div>
                    </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Bulan</label>
                            <select name="bulan" class="form-select">
                                @foreach(range(1, 12) as $m)
                                    <option value="{{ $m }}" {{ date('m') == $m ? 'selected' : '' }}>
                                        {{ \Carbon\Carbon::create()->month($m)->locale('id')->translatedFormat('F') }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Tahun</label>
                            <input type="number" name="tahun" class="form-control" value="{{ date('Y') }}">
                        </div>
                    </div>

                    <hr>
                    <div class="d-flex justify-content-end">
                        <button type="reset" class="btn btn-light me-2">Reset</button>
                        <button type="submit" class="btn btn-primary">Simpan Pesanan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const sepatuSelect = document.getElementById('sepatu_select');
    const hargaSatuanInput = document.getElementById('harga_satuan_input');
    const jumlahInput = document.getElementById('jumlah_input');
    const totalHargaInput = document.getElementById('total_harga_input');

    // Fungsi untuk menghitung dan menampilkan harga
    function hitungTotal() {
        const selectedOption = sepatuSelect.options[sepatuSelect.selectedIndex];
        
        const hargaSatuan = selectedOption.getAttribute('data-harga') ? parseFloat(selectedOption.getAttribute('data-harga')) : 0;
        
        const jumlah = parseInt(jumlahInput.value) || 1;

        if (hargaSatuan > 0) {
            hargaSatuanInput.value = Math.round(hargaSatuan);
            totalHargaInput.value = Math.round(hargaSatuan * jumlah);
        } else {
            hargaSatuanInput.value = '';
            totalHargaInput.value = '';
        }
    }

    if (sepatuSelect) {
        sepatuSelect.addEventListener('change', hitungTotal);
    }

    if (jumlahInput) {
        jumlahInput.addEventListener('input', hitungTotal);
    }
});
</script>
</body>
</html>