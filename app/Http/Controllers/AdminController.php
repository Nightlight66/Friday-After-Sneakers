<?php

namespace App\Http\Controllers;

use App\Models\Sepatu;

class AdminController extends Controller
{
    public function dashboard(){
        $sepatu = Sepatu::with(['stok_sepatu'])->get();
        return view('admin.dashboard', compact('sepatu'));
    }

    public function createSepatu(){
        return view('admin.sepatu.create-sepatu');
    }

    public function editSepatu($id){
        $sepatu = Sepatu::findOrFail($id);
        $sepatu->load('stok_sepatu');
        return view('admin.sepatu.edit-sepatu', compact('sepatu'));
    }
}