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
            <h4 class="mb-0">Daftar Sepatu</h4>
            <a href="{{ route('create-sepatu') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg me-1"></i> Tambah Data
            </a>
        </div>

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
                                <th>Ukuran</th>
                                <th>Jumlah Stok</th>
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
                                <td>{{ $data->nama_sepatu }}</td>
                                <td>{{ $data->merk_sepatu }}</td>
                                <td>
                                    @foreach($data->stok_sepatu as $stok)
                                            {{ $stok->ukuran_sepatu }}
                                    @endforeach
                                </td>
                                <td>
                                    @if($data->stok_sepatu->isNotEmpty())
                                        {{ $data->stok_sepatu->first()->jumlah_stok }}
                                    @else
                                        <span class="text-muted small">Stok kosong</span>
                                    @endif
                                </td>
                                <td>Rp {{ number_format($data->harga_sepatu, 0, ',', '.') }}</td>                                
                                <td class="text-center">
                                    <a href="{{ route('edit-sepatu', $data->sepatu_id) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('delete-sepatu', $data->sepatu_id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger" title="Hapus" data-bs-toggle="modal" data-bs-target="#hapusModal">
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

    <!-- Modal Konfirmasi Hapus -->
    <div class="modal fade" id="hapusModal" tabindex="-1">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content text-center">
                <div class="modal-body p-4">
                    <i class="bi bi-exclamation-circle text-danger mb-3" style="font-size: 3rem;"></i>
                    <h5 class="mb-3">Yakin hapus data?</h5>
                    <p class="text-muted text-sm">Data sepatu ini akan dihapus secara permanen.</p>
                    <div class="d-flex justify-content-center gap-2">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-danger">Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>