<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Sepatu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html" class="text-decoration-none">Daftar Sepatu</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Sepatu</li>
                    </ol>
                </nav>

                <div class="card shadow-sm border-0">
                    <div class="card-header bg-warning text-dark py-3">
                        <h5 class="mb-0">Edit Data: {{ $sepatu->nama_sepatu }}</h5>
                    </div>
                    <div class="card-body p-4">
                        <!-- Menggunakan enctype form-data untuk kemungkinan update gambar -->
                        <form action="{{ route('update-sepatu', $sepatu->sepatu_id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <!-- Hidden input untuk ID (biasanya dipakai di Laravel/Backend) -->
                            <input type="hidden" name="sepatu_id" value="{{ $sepatu->sepatu_id }}">

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="nama_sepatu" class="form-label fw-semibold">Nama Sepatu</label>
                                    <input type="text" id="nama_sepatu" name="nama_sepatu" class="form-control" value="{{ $sepatu->nama_sepatu }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="merk_sepatu" class="form-label fw-semibold">Merk Sepatu</label>
                                    <input type="text" id="merk_sepatu" name="merk_sepatu" class="form-control" value="{{ $sepatu->merk_sepatu }}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="harga_sepatu" class="form-label fw-semibold">Harga Sepatu (Rp)</label>
                                    <input type="number" id="harga_sepatu" name="harga_sepatu" class="form-control" step="0.01" value="{{ $sepatu->harga_sepatu }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="ukuran_sepatu" class="form-label fw-semibold">Ukuran Sepatu</label>
                                    <input type="text" name="ukuran_sepatu" class="form-control" placeholder="Contoh: 40,41,42,43" value="{{ $sepatu->ukuran_sepatu }}" required>    
                                    <div class="form-text">Gunakan koma (,) sebagai pemisah antar ukuran.</div>                            
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="jumlah_stok" class="form-label fw-semibold">Stok Tersedia</label>
                                    <input type="number" id="jumlah_stok" name="jumlah_stok" class="form-control" placeholder="0" min="0" value="{{ $sepatu->jumlah_stok }}" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi_sepatu" class="form-label fw-semibold">Deskripsi</label>
                                <textarea id="deskripsi_sepatu" name="deskripsi_sepatu" class="form-control" rows="4" required>{{ $sepatu->deskripsi_sepatu }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label for="gambar_sepatu" class="form-label fw-semibold">Ganti Gambar (Opsional)</label>
                                <div class="d-flex align-items-center gap-3 mb-2">
                                    <img src="{{ asset('storage/'.$sepatu->gambar_sepatu) }}" alt="Current Image" class="rounded border" style="width: 60px; height: 60px; object-fit: cover;">
                                    <span class="text-muted small">Gambar saat ini</span>
                                </div>
                                <input class="form-control" type="file" id="gambar_sepatu" name="gambar_sepatu" accept="image/*">
                            </div>

                            <hr class="text-muted">

                            <div class="d-flex justify-content-end gap-2 mt-3">
                                <a href="index.html" class="btn btn-light border">Batal</a>
                                <button type="submit" class="btn btn-warning px-4">Update Data</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>