<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index(){
        // Mengambil data dari tabel pesanan, dikelompokkan per bulan dan tahun
        $laporan = Pesanan::select(
                'bulan',
                'tahun',
                DB::raw('SUM(jumlah_pesanan) as total_sepatu'), // Untuk kolom Total Sepatu Terjual
                DB::raw('SUM(total_harga) as total_omset')     // Untuk kolom Total Omset
            )
            ->groupBy('tahun', 'bulan')
            ->orderBy('tahun', 'desc') // Urutkan dari tahun terbaru
            ->orderBy('bulan', 'desc') // Urutkan dari bulan terbaru
            ->get();

        return view('admin.laporan.index', compact('laporan'));
    }
}
