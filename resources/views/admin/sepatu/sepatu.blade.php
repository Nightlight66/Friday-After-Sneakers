<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Sepatu</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto"> <li class="nav-item">
                        <a href="{{ route('user.home') }}" class="nav-link {{ request()->routeIs('user.home') ? 'active' : '' }}">
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
                <h4 class="mb-0">Manajemen Produk Sepatu</h4>
                <p class="text-muted small mb-0">Kelola data sepatu anda</p>
            </div>
            <a href="{{ route('create-sepatu') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg me-1"></i> Tambah Sepatu
            </a>
        </div>

        <!-- Navigation Tabs -->
        <ul class="nav nav-tabs mb-4" role="tablist">
            <li class="nav-item" role="presentation">
                <a href="{{ route('dashboard') }}" class="nav-link active">
                    <i class="bi bi-house me-2"></i> Daftar Sepatu
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="{{ route('pesanan.index') }}" class="nav-link">
                    <i class="bi bi-cart-check me-2"></i> Pesanan Sepatu
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="{{ route('laporan-penjualan.index') }}" class="nav-link">
                    <i class="bi bi-graph-up me-2"></i> Laporan Penjualan
                </a>
            </li>
        </ul>
        
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-circle me-2"></i>{{ session('error') }}
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
                                <th>Gambar</th>
                                <th>Nama Sepatu</th>
                                <th>Merk</th>
                                <th>Kategori</th>
                                <th>Deskripsi</th>
                                <th>Ukuran</th>
                                <th>Stok</th>
                                <th>Harga</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sepatu as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ asset('storage/'.$data->gambar_sepatu) }}" alt="Sepatu" class="rounded border" style="width: 60px; height: 60px; object-fit: cover;">
                                </td>
                                <td><strong>{{ $data->nama_sepatu }}</strong></td>
                                <td>{{ $data->merk_sepatu }}</td>
                                <td>
                                    @if($data->kategori)
                                        <span class="badge bg-info">{{ $data->kategori->nama_kategori }}</span>
                                    @else
                                        <span class="text-muted small">-</span>
                                    @endif
                                </td>
                                <td>
                                    <small class="text-muted">{{ Str::limit($data->deskripsi_sepatu, 50) }}</small>
                                </td>
                                <td>
                                    <span class="badge bg-secondary">{{ $data->ukuran_sepatu }}</span>
                                </td>
                                <td>
                                    <span class="badge bg-success">{{ $data->jumlah_stok }}</span>
                                </td>
                                <td><strong style="color: #ff5c00;">Rp {{ number_format($data->harga_sepatu, 0, ',', '.') }}</strong></td>                                
                                <td class="text-center">
                                    <a href="{{ route('edit-sepatu', $data->sepatu_id) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('delete-sepatu', $data->sepatu_id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus sepatu ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
