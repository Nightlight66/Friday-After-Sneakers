<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

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
        'ukuran_sepatu',
        'jumlah_stok',
        'harga_sepatu',
        'gambar_sepatu',
    ];

    protected function daftarUkuran(): Attribute
    {
        return Attribute::make(
            get: function () {
                if (empty($this->ukuran_sepatu)) {
                    return [];
                }
                
                return array_map('trim', explode(',', $this->ukuran_sepatu));
            }
        );
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriSepatu::class, 'kategori_id', 'kategori_id');
    }
}
