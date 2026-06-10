<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('aset_bmns', function (Blueprint $table) {
            $table->foreignId('ruangan_id')
                ->nullable()
                ->constrained('ruangans')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('aset_bmns', function (Blueprint $table) {
            $table->dropForeign(['ruangan_id']);
            $table->dropColumn('ruangan_id');
        });
    }
};