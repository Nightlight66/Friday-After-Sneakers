<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;
use App\models\Sepatu;
use App\Models\StokSepatu;

class SepatuController extends Controller
{
    public function storeSepatu(Request $request) {
        $validatedData = $request->validate([
            'nama_sepatu' => 'required|string|max:255',
            'merk_sepatu' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori_sepatu,kategori_id',
            'deskripsi_sepatu' => 'nullable|string',
            'harga_sepatu' => 'required|numeric',
            'gambar_sepatu' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'ukuran_sepatu' => 'required|string',
            'jumlah_stok' => 'required|integer|min:0'
        ]);

        // Simpan Gambar
        if ($request->hasFile('gambar_sepatu')) {
            $validatedData['gambar_sepatu'] = $request->file('gambar_sepatu')->store('images', 'public');
        }

        // Pisahkan data untuk tabel sepatu
        $dataSepatuUtama = Arr::except($validatedData, ['ukuran_sepatu', 'jumlah_stok']);

        // Simpan data utama sepatu
        $sepatu = Sepatu::create($dataSepatuUtama);

       // 1. Ubah string "40, 42, 43" menjadi array ["40", "42", "43"]
        $ukuranArray = explode(',', str_replace(' ', '', $request->ukuran_sepatu));

        // 2. Loop array-nya
        foreach ($ukuranArray as $ukuran) {
            if (!empty($ukuran)) {
                StokSepatu::create([
                    'sepatu_id'     => $sepatu->sepatu_id,
                    'ukuran_sepatu' => $ukuran, // PAKAI $ukuran (satuan), BUKAN $ukuranSepatu (gabungan)
                    'jumlah_stok'   => $request->jumlah_stok
                ]);
            }
        }

        return redirect()->route('dashboard')->with('success', 'Sepatu berhasil ditambahkan!');
    }

    public function updateSepatu(Request $request, $id) {
        $sepatu = Sepatu::findOrFail($id);

        $validatedData = $request->validate([
            'nama_sepatu' => 'required|string|max:255',
            'merk_sepatu' => 'required|string|max:255',
            'deskripsi_sepatu' => 'nullable|string',
            'harga_sepatu' => 'required|numeric',
            'gambar_sepatu' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'ukuran_sepatu' => 'required|string',
            'jumlah_stok' => 'required|integer|min:0'
        ]);

        if ($request->hasFile('gambar_sepatu')) {
            if ($sepatu->gambar_sepatu) {
                Storage::disk('public')->delete($sepatu->gambar_sepatu);
            }
            $validatedData['gambar_sepatu'] = $request->file('gambar_sepatu')->store('images', 'public');
        } else {
            $validatedData['gambar_sepatu'] = $sepatu->gambar_sepatu;
        }

        $dataSepatuUtama = Arr::except($validatedData, ['ukuran_sepatu', 'jumlah_stok']);
        $sepatu->update($dataSepatuUtama);

        StokSepatu::where('sepatu_id', $sepatu->sepatu_id)->delete();

        $ukuranArray = explode(',', str_replace(' ', '', $request->ukuran_sepatu));

        foreach ($ukuranArray as $ukuran) {
            if (!empty($ukuran)) {
                StokSepatu::create([
                    'sepatu_id'     => $sepatu->sepatu_id,
                    'ukuran_sepatu' => $ukuran,
                    'jumlah_stok'   => $request->jumlah_stok
                ]);
            }
        }

        return redirect()->route('dashboard')->with('success', 'Data sepatu berhasil diperbarui!');
    }

    public function deleteSepatu($sepatu_id){
        $sepatu = Sepatu::where('sepatu_id', $sepatu_id)->firstOrFail();
        if($sepatu->gambar_sepatu){
            Storage::disk('public')->delete($sepatu->gambar_sepatu);
        }
        $sepatu->delete();
        return redirect()->route('dashboard')->with('success', 'Sepatu berhasil dihapus!');
    }
}
