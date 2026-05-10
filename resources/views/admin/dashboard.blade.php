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
            <a class="navbar-brand" href="index.html">Admin Sepatu</a>
            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="nav-link btn btn-danger btn-sm ms-2 px-3 text-white border-0" style="background-color: #dc3545;">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
            </li>
        </div>
    </nav>

    <div class="container">
        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h4 class="mb-0">Manajemen Produk Sepatu</h4>
                <p class="text-muted small mb-0">Kelola data sepatu dan laporan penjualan</p>
            </div>
            <a href="{{ route('create-sepatu') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg me-1"></i> Tambah Sepatu
            </a>
        </div>

        <!-- Navigation Tabs -->
        <ul class="nav nav-tabs mb-4" role="tablist">
            <li class="nav-item" role="presentation">
                <a href="{{ route('dashboard') }}" class="nav-link active">
                    <i class="bi bi-shoe2 me-2"></i> Daftar Sepatu
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="{{ route('laporan-penjualan.index') }}" class="nav-link">
                    <i class="bi bi-graph-up me-2"></i> Laporan Penjualan
                </a>
            </li>
        </ul>

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
                                    @foreach($data->stok_sepatu as $stok)
                                        <span class="badge bg-secondary">{{ $stok->ukuran_sepatu }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @if($data->stok_sepatu->isNotEmpty())
                                        <span class="badge bg-success">{{ $data->stok_sepatu->first()->jumlah_stok }}</span>
                                    @else
                                        <span class="badge bg-danger">0</span>
                                    @endif
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
