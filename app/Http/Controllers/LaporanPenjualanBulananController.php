<?php

namespace App\Http\Controllers;

use App\Models\LaporanPenjualanBulanan;
use Illuminate\Http\Request;

class LaporanPenjualanBulananController extends Controller
{
    // Tampilkan daftar laporan
    public function index()
    {
        $laporan = LaporanPenjualanBulanan::orderBy('tahun', 'desc')
                                          ->orderBy('bulan', 'desc')
                                          ->get();
        return view('admin.laporan.index', compact('laporan'));
    }

    // Tampilkan form tambah laporan
    public function create()
    {
        return view('admin.laporan.create');
    }

    // Simpan laporan baru
    public function store(Request $request)
    {
        $request->validate([
            'bulan' => 'required|integer|min:1|max:12',
            'tahun' => 'required|integer|min:2000|max:2099',
            'total_sepatu_terjual' => 'required|integer|min:0',
            'total_omset' => 'required|numeric|min:0',
        ]);

        // Cek apakah sudah ada laporan untuk bulan dan tahun yang sama
        $exists = LaporanPenjualanBulanan::where('bulan', $request->bulan)
                                         ->where('tahun', $request->tahun)
                                         ->first();

        if ($exists) {
            return back()->with('error', 'Laporan untuk bulan dan tahun ini sudah ada!');
        }

        LaporanPenjualanBulanan::create([
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'total_sepatu_terjual' => $request->total_sepatu_terjual,
            'total_omset' => $request->total_omset,
        ]);

        return redirect()->route('laporan-penjualan.index')->with('success', 'Laporan berhasil ditambahkan!');
    }

    // Tampilkan form edit laporan
    public function edit($id)
    {
        $laporan = LaporanPenjualanBulanan::findOrFail($id);
        return view('admin.laporan.edit', compact('laporan'));
    }

    // Update laporan
    public function update(Request $request, $id)
    {
        $request->validate([
            'bulan' => 'required|integer|min:1|max:12',
            'tahun' => 'required|integer|min:2000|max:2099',
            'total_sepatu_terjual' => 'required|integer|min:0',
            'total_omset' => 'required|numeric|min:0',
        ]);

        $laporan = LaporanPenjualanBulanan::findOrFail($id);

        // Cek apakah sudah ada laporan untuk bulan dan tahun yang sama (selain data ini sendiri)
        $exists = LaporanPenjualanBulanan::where('bulan', $request->bulan)
                                         ->where('tahun', $request->tahun)
                                         ->where('laporan_id', '!=', $id)
                                         ->first();

        if ($exists) {
            return back()->with('error', 'Laporan untuk bulan dan tahun ini sudah ada!');
        }

        $laporan->update([
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'total_sepatu_terjual' => $request->total_sepatu_terjual,
            'total_omset' => $request->total_omset,
        ]);

        return redirect()->route('laporan-penjualan.index')->with('success', 'Laporan berhasil diperbarui!');
    }

    // Hapus laporan
    public function destroy($id)
    {
        $laporan = LaporanPenjualanBulanan::findOrFail($id);
        $laporan->delete();

        return redirect()->route('laporan-penjualan.index')->with('success', 'Laporan berhasil dihapus!');
    }
}
