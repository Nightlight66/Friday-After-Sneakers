<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Laporan Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('laporan-penjualan.index') }}" class="text-decoration-none">Laporan Penjualan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Laporan</li>
                    </ol>
                </nav>

                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white py-3">
                        <h5 class="mb-0"><i class="bi bi-pencil-square me-2"></i>Form Edit Laporan Penjualan</h5>
                    </div>
                    
                    <div class="card-body p-4">
                        <form action="{{ route('laporan-penjualan.update', $laporan->laporan_id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="bulan" class="form-label fw-semibold">Bulan</label>
                                    <select id="bulan" name="bulan" class="form-select @error('bulan') is-invalid @enderror" required>
                                        <option value="" disabled>Pilih Bulan</option>
                                        <option value="1" @selected($laporan->bulan == 1)>Januari</option>
                                        <option value="2" @selected($laporan->bulan == 2)>Februari</option>
                                        <option value="3" @selected($laporan->bulan == 3)>Maret</option>
                                        <option value="4" @selected($laporan->bulan == 4)>April</option>
                                        <option value="5" @selected($laporan->bulan == 5)>Mei</option>
                                        <option value="6" @selected($laporan->bulan == 6)>Juni</option>
                                        <option value="7" @selected($laporan->bulan == 7)>Juli</option>
                                        <option value="8" @selected($laporan->bulan == 8)>Agustus</option>
                                        <option value="9" @selected($laporan->bulan == 9)>September</option>
                                        <option value="10" @selected($laporan->bulan == 10)>Oktober</option>
                                        <option value="11" @selected($laporan->bulan == 11)>November</option>
                                        <option value="12" @selected($laporan->bulan == 12)>Desember</option>
                                    </select>
                                    @error('bulan')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="tahun" class="form-label fw-semibold">Tahun</label>
                                    <input type="number" id="tahun" name="tahun" 
                                           class="form-control @error('tahun') is-invalid @enderror" 
                                           placeholder="2026" value="{{ old('tahun', $laporan->tahun) }}" 
                                           min="2000" max="2099" required>
                                    @error('tahun')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="total_sepatu_terjual" class="form-label fw-semibold">Total Sepatu Terjual</label>
                                    <input type="number" id="total_sepatu_terjual" name="total_sepatu_terjual" 
                                           class="form-control @error('total_sepatu_terjual') is-invalid @enderror" 
                                           placeholder="0" value="{{ old('total_sepatu_terjual', $laporan->total_sepatu_terjual) }}" 
                                           min="0" required>
                                    @error('total_sepatu_terjual')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="total_omset" class="form-label fw-semibold">Total Omset (Rp)</label>
                                    <input type="number" id="total_omset" name="total_omset" 
                                           class="form-control @error('total_omset') is-invalid @enderror" 
                                           placeholder="0" value="{{ old('total_omset', $laporan->total_omset) }}" 
                                           step="0.01" min="0" required>
                                    @error('total_omset')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Info Box --}}
                            <div class="alert alert-info mb-4" role="alert">
                                <i class="bi bi-info-circle me-2"></i>
                                <small>Perbarui data laporan {{ $laporan->nama_bulan }} {{ $laporan->tahun }}</small>
                            </div>

                            <hr class="text-muted">

                            <div class="d-flex justify-content-end gap-2 mt-3">
                                <a href="{{ route('laporan-penjualan.index') }}" class="btn btn-light border">Batal</a>
                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="bi bi-save me-1"></i> Perbarui Laporan
                                </button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
