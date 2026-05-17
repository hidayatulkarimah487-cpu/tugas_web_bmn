<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('aset_bmns', function (Blueprint $table) {
            $table->id();
            $table->string('kode_aset');
            $table->string('nama_barang');
            $table->string('kategori');
            $table->string('lokasi');
            $table->year('tahun_perolehan');
            $table->string('kondisi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aset_bmns');
    }
};
