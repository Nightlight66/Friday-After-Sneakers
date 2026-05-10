<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanPenjualanBulanan extends Model
{
    protected $table = 'laporan_penjualan_bulanan';
    protected $primaryKey = 'laporan_id';
    public $timestamps = true;

    protected $fillable = [
        'bulan',
        'tahun',
        'total_sepatu_terjual',
        'total_omset',
    ];

    protected $casts = [
        'bulan' => 'integer',
        'tahun' => 'integer',
        'total_sepatu_terjual' => 'integer',
        'total_omset' => 'decimal:2',
    ];

    // Format bulan ke nama bulan Indonesia
    public function getNamaBulanAttribute()
    {
        $bulan = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];
        return $bulan[$this->bulan] ?? 'Unknown';
    }

    // Periode (Januari 2026, Februari 2026, etc)
    public function getPeriodeAttribute()
    {
        return $this->nama_bulan . ' ' . $this->tahun;
    }
}
