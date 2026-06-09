<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsetBmn extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_aset',
        'nama_barang',
        'kategori_barang',
        'ruangan_id',
        'tahun_perolehan',
        'kondisi',
        'foto_aset',
    ];

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class);
    }
}