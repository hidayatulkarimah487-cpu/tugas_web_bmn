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
        'kategori',
        'lokasi',
        'tahun_perolehan',
        'kondisi',
    ];
}