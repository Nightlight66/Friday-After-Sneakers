<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Pesanan</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto"> 
                    <li class="nav-item">
                        <a href="{{ route('user.home') }}" class="nav-link">
                            <i class="bi bi-house-door me-1"></i> Home
                        </a>
                    </li>
                </ul>
            </div>
            <a class="navbar-brand me-0">Admin Sepatu</a>
        </div>
    </nav>

    <div class="container">
        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h4 class="mb-0">Daftar Pesanan Sneakers</h4>
                <p class="text-muted small mb-0">Kelola riwayat pesanan masuk</p>
            </div>
            <a href="{{ route('pesanan.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg me-1"></i> Tambah Pesanan
            </a>
        </div>

        <!-- Navigation Tabs -->
        <ul class="nav nav-tabs mb-4" role="tablist">
            <li class="nav-item" role="presentation">
                <a href="{{ route('dashboard') }}" class="nav-link ">
                    <i class="bi bi-house me-2"></i> Daftar Sepatu
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="{{ route('pesanan.index') }}" class="nav-link active">
                    <i class="bi bi-cart-check me-2"></i> Pesanan Sepatu
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="{{ route('laporan-penjualan.index') }}" class="nav-link">
                    <i class="bi bi-graph-up me-2"></i> Laporan Penjualan
                </a>
            </li>
        </ul>

        <!-- Flash Messages -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Table Data -->
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Produk</th>
                                <th>Harga Satuan</th>
                                <th>Jumlah</th>
                                <th>Total Harga</th>
                                <th>Periode</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pesanan as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    {{-- Menggunakan relasi sepatu --}}
                                    <strong>{{ $p->sepatu->nama_sepatu ?? 'ID Sepatu: '.$p->sepatu_id }}</strong>
                                </td>
                                <td>Rp {{ number_format($p->sepatu->harga_sepatu, 0, ',', '.') }}</td>
                                <td><span class="badge bg-secondary">{{ $p->jumlah_pesanan }} pcs</span></td>
                                <td>
                                    <strong class="text-success">
                                        Rp {{ number_format($p->total_harga, 0, ',', '.') }}
                                    </strong>
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::createFromFormat('m', $p->bulan)->locale('id')->translatedFormat('F') }} {{ $p->tahun }} 
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('pesanan.edit', $p->pesanan_id) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('pesanan.destroy', $p->pesanan_id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus pesanan ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center py-4 text-muted">
                                    <i class="bi bi-inbox fs-4 d-block mb-2"></i>
                                    Belum ada data pesanan.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>