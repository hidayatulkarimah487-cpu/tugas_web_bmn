<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('aset_bmns', function (Blueprint $table) {
            $table->id();
            $table->string('kode_aset')->unique();
            $table->string('nama_barang');
            $table->enum('kategori_barang', ['Mebel', 'Elektronik', 'Kendaraan']);
            $table->string('lokasi_ruangan');
            $table->integer('tahun_perolehan')->unsigned();
            $table->enum('kondisi', ['Baik', 'Rusak Ringan', 'Rusak Berat']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aset_bmns');
    }
};