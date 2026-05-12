<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'pesanan';

    // Primary Key kustom
    protected $primaryKey = 'pesanan_id';

    // Kolom yang boleh diisi
    protected $fillable = [
        'sepatu_id',
        'total_harga',
        'jumlah_pesanan',
        'bulan',
        'tahun'
    ];

    /**
     * Relasi ke model Sepatu
     * (Satu pesanan memiliki satu sepatu)
     */
    public function sepatu()
    {
        return $this->belongsTo(Sepatu::class, 'sepatu_id', 'sepatu_id');
    }
}