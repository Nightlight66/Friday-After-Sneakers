<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan Bulanan</title>
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
                <h4 class="mb-0">Laporan Penjualan Bulanan</h4>
                <p class="text-muted small mb-0">Rekapitulasi otomatis dari data pesanan</p>
            </div>
        </div>

        <ul class="nav nav-tabs mb-4" role="tablist">
            <li class="nav-item" role="presentation">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="bi bi-house me-2"></i> Daftar Sepatu
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="{{ route('pesanan.index') }}" class="nav-link">
                    <i class="bi bi-cart-check me-2"></i> Pesanan Sepatu
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="{{ route('laporan-penjualan.index') }}" class="nav-link active">
                    <i class="bi bi-graph-up me-2"></i> Laporan Penjualan
                </a>
            </li>
        </ul>

        <!-- Table Data -->
        <div class="card shadow-sm mb-5">
            <div class="card-body p-0">
                @if($laporan->isNotEmpty())
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4">No</th>
                                    <th>Periode Bulan</th>
                                    <th>Total Sepatu Terjual</th>
                                    <th>Total Omset</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($laporan as $data)
                                <tr>
                                    <td class="ps-4">{{ $loop->iteration }}</td>
                                    <td>
                                        <strong>{{ \Carbon\Carbon::createFromFormat('m', $data->bulan)->locale('id')->translatedFormat('F') }} {{ $data->tahun }}</strong>
                                    </td>
                                    <td>
                                        <span class="badge bg-info text-dark">{{ $data->total_sepatu }} pcs</span>
                                    </td>
                                    <td>
                                        <strong style="color: #28a745;">Rp {{ number_format($data->total_omset, 0, ',', '.') }}</strong>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="bi bi-inbox" style="font-size: 3rem; color: #999;"></i>
                        <p class="text-muted mt-3">Belum ada transaksi pesanan yang tercatat.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>