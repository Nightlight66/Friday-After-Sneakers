<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Sepatu Baru</title>
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
                        <li class="breadcrumb-item active" aria-current="page">Tambah Sepatu</li>
                    </ol>
                </nav>

                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white py-3">
                        <h5 class="mb-0">Form Tambah Sepatu</h5>
                    </div>
                    
                    <div class="card-body p-4">
                        <!-- Tag Form diletakkan di sini, menggunakan Route Laravel yang benar -->
                        <form action="{{ route('store-sepatu') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="nama_sepatu" class="form-label fw-semibold">Nama Sepatu</label>
                                    <input type="text" id="nama_sepatu" name="nama_sepatu" class="form-control" placeholder="Contoh: Air Max 97" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="merk_sepatu" class="form-label fw-semibold">Merk Sepatu</label>
                                    <input type="text" id="merk_sepatu" name="merk_sepatu" class="form-control" placeholder="Contoh: Nike" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="kategori_id" class="form-label fw-semibold">Kategori Sepatu</label>
                                    <select id="kategori_id" name="kategori_id" class="form-select" required>
                                        <option value="" disabled selected>Pilih Kategori</option>
                                        @foreach($kategori_sepatu as $kategori)
                                            <option value="{{ $kategori->kategori_id }}">{{ $kategori->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="harga_sepatu" class="form-label fw-semibold">Harga Sepatu (Rp)</label>
                                    <input type="number" id="harga_sepatu" name="harga_sepatu" class="form-control" step="0.01" placeholder="0" required>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="ukuran_sepatu" class="form-label fw-semibold">Ukuran Sepatu</label>
                                    <input type="text" name="ukuran_sepatu" class="form-control" placeholder="Contoh: 40,41,42,43" value="{{ old('ukuran') }}">    
                                    <div class="form-text">Gunakan koma (,) sebagai pemisah antar ukuran.</div>                            
                                </div>
                                <div class="col-md-6">
                                    <label for="jumlah_stok" class="form-label fw-semibold">Jumlah Stok</label>
                                    <input type="number" id="jumlah_stok" name="jumlah_stok" class="form-control" placeholder="0" min="0" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi_sepatu" class="form-label fw-semibold">Deskripsi</label>
                                <textarea id="deskripsi_sepatu" name="deskripsi_sepatu" class="form-control" rows="4" placeholder="Tuliskan detail spesifikasi sepatu..." required></textarea>
                            </div>

                            <div class="mb-4">
                                <label for="gambar_sepatu" class="form-label fw-semibold">Upload Gambar Sepatu</label>
                                <input class="form-control" type="file" id="gambar_sepatu" name="gambar_sepatu" accept="image/*" required>
                                <div class="form-text">Format yang didukung: JPG, PNG, WEBP. Maks 2MB.</div>
                            </div>

                            <hr class="text-muted">

                            <div class="d-flex justify-content-end gap-2 mt-3">
                                <!-- Ubah href kembali ke route index jika diperlukan, misal: route('sepatu.index') -->
                                <a href="index.html" class="btn btn-light border">Batal</a>
                                <button type="submit" class="btn btn-primary px-4">Simpan Data</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>