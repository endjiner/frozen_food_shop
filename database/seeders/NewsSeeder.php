<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\User;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $owner = User::where('role', 'owner')->first();

        $newsItems = [
            [
                'title' => 'Diskon 10% untuk Pembelian di Atas 100rb!',
                'content' => 'Promo berlaku sampai akhir bulan ini. Yuk borong sekarang!',
            ],
            [
                'title' => 'Gratis Ongkir Khusus Wilayah Jakarta',
                'content' => 'Belanja minimal Rp50.000 dan nikmati gratis ongkir ke seluruh Jakarta!',
            ],
            [
                'title' => 'Produk Baru: Dimsum Ayam Udang!',
                'content' => 'Rasakan sensasi baru dengan dimsum beku isi ayam dan udang, praktis dan enak.',
            ],
            [
                'title' => 'Rekomendasi Makanan Sahur Beku',
                'content' => 'Butuh makanan cepat saji saat sahur? Cek rekomendasi produk frozen food kami!',
            ],
            [
                'title' => 'Paket Hemat Bulanan Kembali Hadir!',
                'content' => 'Berbagai pilihan paket hemat mulai dari Rp99.000. Cocok untuk stok sebulan!',
            ],
            [
                'title' => 'Flash Sale Akhir Pekan - Diskon 20%',
                'content' => 'Hanya hari Sabtu dan Minggu, semua produk potongan hingga 20%.',
            ],
            [
                'title' => 'Produk Terlaris Minggu Ini',
                'content' => 'Cek produk frozen paling laris minggu ini. Banyak yang repeat order!',
            ],
            [
                'title' => 'Kiat Menyimpan Frozen Food yang Benar',
                'content' => 'Baca tips menyimpan makanan beku agar tahan lama dan tetap segar.',
            ],
        ];

        foreach ($newsItems as $item) {
            News::create([
                'user_id' => $owner->id,
                'title' => $item['title'],
                'content' => $item['content'],
                'published_at' => now()->subDays(rand(0, 10)),
            ]);
        }
    }
}
