<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriSepatu extends Model
{
    protected $table = 'kategori_sepatu';
    protected $primaryKey = 'kategori_id';

    protected $fillable = [
        'nama_kategori',
    ];

    public function sepatu()
    {
        return $this->hasMany(Sepatu::class, 'kategori_id', 'kategori_id');
    }
}
