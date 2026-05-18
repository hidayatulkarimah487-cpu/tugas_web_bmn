<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AsetBmnFactory extends Factory
{
    public function definition(): array
    {
        return [
            'kode_aset' => 'BMN-' . fake()->unique()->numberBetween(10000, 99999),
            'nama_barang' => fake()->randomElement([
                'Meja Dosen',
                'Kursi Kuliah',
                'Lemari Arsip',
                'Laptop Inventaris',
                'Proyektor',
                'Printer',
                'AC Ruangan',
                'Motor Operasional',
                'Mobil Operasional',
                'Rak Buku',
            ]),
            'kategori_barang' => fake()->randomElement(['Mebel', 'Elektronik', 'Kendaraan']),
            'lokasi_ruangan' => fake()->randomElement([
                'Ruang Dosen TI',
                'Laboratorium Komputer',
                'Ruang Administrasi',
                'Ruang Dekanat',
                'Ruang Kelas A',
                'Ruang Kelas B',
            ]),
            'tahun_perolehan' => fake()->numberBetween(2018, 2025),
            'kondisi' => fake()->randomElement(['Baik', 'Rusak Ringan', 'Rusak Berat']),
        ];
    }
}