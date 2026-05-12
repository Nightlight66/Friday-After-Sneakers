<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;

class LaporanController extends Controller
{
    public function index(){
        $laporan = Pesanan::select(
                'bulan',
                'tahun',
                'jumlah_pesanan as total_sepatu', 
                'total_harga as total_omset'      

                )
            ->orderBy('tahun', 'desc') // Urutkan dari tahun terbaru
            ->orderBy('bulan', 'desc') // Urutkan dari bulan terbaru
            ->get();

        return view('admin.index', compact('laporan'));
    }
}
