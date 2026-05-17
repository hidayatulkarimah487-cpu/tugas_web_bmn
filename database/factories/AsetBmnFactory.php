<?php

namespace Database\Factories;

use App\Models\AsetBmn;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<AsetBmn>
 */
class AsetBmnFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
    return [
        'kode_aset' => $this->faker->unique()->bothify('BMN-###'),
        'nama_barang' => $this->faker->word(),
        'kategori' => $this->faker->randomElement(['Mebel', 'Elektronik', 'Kendaraan']),
        'lokasi' => $this->faker->city(),
        'tahun_perolehan' => $this->faker->year(),
        'kondisi' => $this->faker->randomElement(['Baik', 'Rusak Ringan', 'Rusak Berat']),
    ];
    }
}
