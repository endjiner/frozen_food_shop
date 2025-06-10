<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['name' => 'Nugget Ayam 500g', 'description' => 'Nugget renyah siap goreng', 'price' => 32000, 'stock' => 50],
            ['name' => 'Sosis Sapi 1kg', 'description' => 'Sosis sapi premium', 'price' => 45000, 'stock' => 30],
            ['name' => 'Bakso Ikan 500g', 'description' => 'Bakso ikan segar', 'price' => 28000, 'stock' => 40],
            ['name' => 'Kentang Goreng 1kg', 'description' => 'Kentang beku siap saji', 'price' => 35000, 'stock' => 60],
            ['name' => 'Dimsum Ayam Udang 500g', 'description' => 'Dimsum isi ayam & udang', 'price' => 38000, 'stock' => 25],
            ['name' => 'Ebi Furai 250g', 'description' => 'Udang roti goreng khas Jepang', 'price' => 42000, 'stock' => 20],
            ['name' => 'Otak-Otak Ikan 500g', 'description' => 'Camilan ikan tradisional', 'price' => 29000, 'stock' => 35],
            ['name' => 'Tempura Udang 400g', 'description' => 'Udang tempura siap goreng', 'price' => 47000, 'stock' => 18],
            ['name' => 'Chicken Wings 1kg', 'description' => 'Sayap ayam beku berbumbu', 'price' => 55000, 'stock' => 22],
            ['name' => 'Bakso Sapi Jumbo 10pcs', 'description' => 'Bakso sapi ukuran besar', 'price' => 36000, 'stock' => 45],
            ['name' => 'Kaki Naga Ayam 250g', 'description' => 'Kaki naga isi ayam & sayur', 'price' => 25000, 'stock' => 40],
            ['name' => 'Stick Ikan 250g', 'description' => 'Ikan stik beku praktis', 'price' => 27000, 'stock' => 28],
            ['name' => 'Risoles Ragout 6pcs', 'description' => 'Risoles isi ayam ragout beku', 'price' => 24000, 'stock' => 36],
            ['name' => 'Pastel Abon 5pcs', 'description' => 'Pastel isi abon gurih', 'price' => 23000, 'stock' => 38],
            ['name' => 'Tahu Bakso Ayam 500g', 'description' => 'Tahu isi bakso ayam', 'price' => 30000, 'stock' => 26],
        ];

        foreach ($products as $p) {
            Product::create($p);
        }
    }
}
