<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StokSepatu extends Model
{
    protected $table = 'stok_sepatu';
    protected $primaryKey = 'stok_id';
    protected $fillable = ['sepatu_id', 'ukuran_sepatu', 'jumlah_stok'];

    public function sepatu(){
        return $this->belongsTo(Sepatu::class, 'sepatu_id', 'sepatu_id');
    }
}
