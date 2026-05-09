<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Sepatu;
use App\Models\KategoriSepatu;

class HomeController extends Controller
{
    public function home(){
        $sepatu   = Sepatu::with(['kategori', 'stok_sepatu'])
                    ->take(8)->get();
        $kategori = KategoriSepatu::orderBy('nama_kategori')->get();

        return view('user.home', compact('sepatu', 'kategori'));
    }

    public function detail($id){
        $sepatu = Sepatu::findOrFail($id);
        return view('user.detail', compact('sepatu'));
    }

    public function katalog(){
        $sepatu = Sepatu::all();
        return view('user.katalog', compact('sepatu'));
    }
}
