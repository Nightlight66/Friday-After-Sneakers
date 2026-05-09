<?php

namespace App\Http\Controllers;

use App\Models\Sepatu;
use App\Models\KategoriSepatu;

class AdminController extends Controller
{
    public function dashboard(){
        $sepatu = Sepatu::with(['stok_sepatu'])->get();
        return view('admin.dashboard', compact('sepatu'));
    }

    public function createSepatu(){
        $kategori_sepatu = KategoriSepatu::all();
        return view('admin.sepatu.create-sepatu', compact('kategori_sepatu'));
    }

    public function editSepatu($id){
        $sepatu = Sepatu::findOrFail($id);
        $sepatu->load('stok_sepatu');
        return view('admin.sepatu.edit-sepatu', compact('sepatu'));
    }
}