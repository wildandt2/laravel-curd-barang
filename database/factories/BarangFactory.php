<?php

namespace Database\Factories;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Factories\Factory;

class BarangFactory extends Factory
{
    protected $model = Barang::class;

    public function definition(): array
    {
        return [
            'nama' => $this->faker->word,
            'kategori' => $this->faker->randomElement(['Elektronik', 'Pakaian', 'Alat Tulis']),
            'stok' => $this->faker->numberBetween(10, 100),
            'harga' => $this->faker->randomFloat(2, 1000, 500000),
        ];
    }
}
