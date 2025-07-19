<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Barang;

class BarangSeeder extends Seeder
{
    public function run(): void
    {
        $barangs = [
            ['nama' => 'Minyak Goreng Bimoli 1L', 'kategori' => 'Sembako', 'stok' => 100, 'harga' => 18000],
            ['nama' => 'Beras Ramos 5kg', 'kategori' => 'Sembako', 'stok' => 50, 'harga' => 68000],
            ['nama' => 'Gula Pasir Gulaku 1kg', 'kategori' => 'Sembako', 'stok' => 80, 'harga' => 14000],
            ['nama' => 'Mie Instan Indomie Goreng', 'kategori' => 'Makanan Instan', 'stok' => 200, 'harga' => 3000],
            ['nama' => 'Susu Kental Manis Indomilk', 'kategori' => 'Susu', 'stok' => 75, 'harga' => 9500],
            ['nama' => 'Sabun Lifebuoy Merah', 'kategori' => 'Kebersihan', 'stok' => 60, 'harga' => 4500],
            ['nama' => 'Shampo Sunsilk Hitam 170ml', 'kategori' => 'Kebersihan', 'stok' => 40, 'harga' => 17000],
            ['nama' => 'Deterjen Rinso Anti Noda 1kg', 'kategori' => 'Kebersihan', 'stok' => 90, 'harga' => 16000],
            ['nama' => 'Telur Ayam 1kg', 'kategori' => 'Sembako', 'stok' => 100, 'harga' => 28000],
            ['nama' => 'Air Mineral Aqua 600ml', 'kategori' => 'Minuman', 'stok' => 120, 'harga' => 3500],
            // Tambahkan 90 lainnya secara otomatis
        ];

        // Tambahkan 90 data tambahan secara acak dari list di atas
        for ($i = 0; $i < 90; $i++) {
            $sample = $barangs[array_rand($barangs)];
            Barang::create([
                'nama' => $sample['nama'] . ' (variasi ' . ($i + 1) . ')',
                'kategori' => $sample['kategori'],
                'stok' => rand(10, 200),
                'harga' => rand(3000, 80000),
            ]);
        }

        // Insert data awal juga
        foreach ($barangs as $b) {
            Barang::create($b);
        }
    }
}
