<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\models\Sepatu;
use App\Models\KategoriSepatu;

class SepatuController extends Controller
{
    public function dashboard(){
        $sepatu = Sepatu::all();
        return view('admin.sepatu.sepatu', compact('sepatu'));
    }

    public function createSepatu(){
        $kategori_sepatu = KategoriSepatu::all();
        return view('admin.sepatu.create-sepatu', compact('kategori_sepatu'));
    }

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

        Sepatu::create($validatedData);

        return redirect()->route('dashboard')->with('success', 'Sepatu berhasil ditambahkan!');
    }
    
    public function editSepatu($id){
        $sepatu = Sepatu::findOrFail($id);
        return view('admin.sepatu.edit-sepatu', compact('sepatu'));
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

        $sepatu->update($validatedData);

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
