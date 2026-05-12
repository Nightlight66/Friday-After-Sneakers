<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sepatu;
use App\Models\KategoriSepatu;

class HomeController extends Controller
{
    public function home(){
        $sepatu   = Sepatu::with(['kategori'])->take(8)->get();
        $kategori = KategoriSepatu::orderBy('nama_kategori')->get();
        $heroimg = Sepatu::inRandomOrder()->first();

        return view('user.home', compact('sepatu', 'kategori', 'heroimg'));
    }

    public function detail($id){
        $sepatu = Sepatu::findOrFail($id);
        return view('user.detail', compact('sepatu'));
    }

    public function katalog(Request $request){
        $query = Sepatu::with(['kategori']);

        if ($request->filled('q'))
            $query->where('nama_sepatu', 'like', '%'.$request->q.'%');

        if ($request->filled('kategori') && $request->kategori > 0)
            $query->where('kategori_id', $request->kategori);

        if ($request->filled('harga_min'))
            $query->where('harga_sepatu', '>=', $request->harga_min);

        if ($request->filled('harga_max'))
            $query->where('harga_sepatu', '<=', $request->harga_max);

        $sort = $request->input('sort', 'terbaru');
        $query->orderBy(
            match($sort) {
                'harga_asc', 'harga_desc' => 'harga_sepatu',
                'nama_asc',  'nama_desc'  => 'nama_sepatu',
                default                   => 'sepatu_id',   // ← ganti created_at
            },
            in_array($sort, ['harga_desc', 'nama_desc']) ? 'desc' : 'asc'
        );

    return view('user.katalog', [
        'sepatu'   => $query->get(),
        'kategori' => KategoriSepatu::orderBy('nama_kategori')->get(),
        'hargaMax' => Sepatu::max('harga_sepatu'),
    ]);
}
}
