<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sepatu extends Model
{
    protected $table = 'sepatu';
    protected $primaryKey = 'sepatu_id';
    public $timestamps = false;

    protected $fillable = [
        'nama_sepatu',
        'merk_sepatu',
        'deskripsi_sepatu',
        'kategori_id',
        'harga_sepatu',
        'gambar_sepatu',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriSepatu::class, 'kategori_id', 'kategori_id');
    }

    public function stok_sepatu()
    {
        return $this->hasMany(StokSepatu::class, 'sepatu_id', 'sepatu_id');
    }
}
