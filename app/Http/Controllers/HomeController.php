<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Sepatu;

class HomeController extends Controller
{
    public function home(){
        $sepatu = Sepatu::all();
        return view('user.home', compact('sepatu'));
    }

    public function detail($id){
        $sepatu = Sepatu::findOrFail($id);
        return view('user.detail', compact('sepatu'));
    }
}
