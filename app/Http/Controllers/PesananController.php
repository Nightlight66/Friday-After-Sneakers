<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Sepatu;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function showPesanan(){
        $pesanan = Pesanan::with('sepatu')->get();
        return view('admin.pesanan.pesanan', compact('pesanan'));
    }

    public function create(){
        $sepatu = Sepatu::all();
        return view('admin.pesanan.create', compact('sepatu'));
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'sepatu_id'      => 'required|exists:sepatu,sepatu_id',
            'total_harga'   => 'required|numeric', 
            'jumlah_pesanan' => 'required|integer|min:1',
            'bulan'          => 'required|integer|between:1,12',
            'tahun'          => 'required|integer|min:2000',
        ]);

        $sepatu = Sepatu::findOrFail($request->sepatu_id);

        if ($sepatu->jumlah_stok < $request->jumlah_pesanan) {
            return back()->with('error', 'Stok tidak mencukupi! Sisa stok saat ini: ' . $sepatu->jumlah_stok . ' pcs.');
        }

        $sepatu->decrement('jumlah_stok', $request->jumlah_pesanan);        

        Pesanan::create($validatedData);

        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil disimpan dan stok otomatis berkurang!');
    }

    public function edit($id){
        $pesanan = Pesanan::findOrFail($id);
        $sepatu = Sepatu::all();
        return view('admin.pesanan.update', compact('pesanan', 'sepatu'));
    }

    public function update(Request $request, $id){
        // 1. Validasi input
        $validatedData = $request->validate([
            'sepatu_id'      => 'required|exists:sepatu,sepatu_id',
            'total_harga'   => 'required|numeric', 
            'jumlah_pesanan' => 'required|integer|min:1',
            'bulan'          => 'required|integer|between:1,12',
            'tahun'          => 'required|integer|min:2000',
        ]);

        $pesanan = Pesanan::findOrFail($id);

        $pesanan->update($validatedData);
        return redirect()->route('pesanan.index')->with('success', 'Data pesanan berhasil diperbarui dan stok telah disesuaikan!');
    }

    public function destroy($id){
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->delete();

        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil dihapus!');
    }
}
