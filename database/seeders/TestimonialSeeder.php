<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $buyer = User::where('role', 'buyer')->first();
        $products = Product::take(5)->get();

        $data = [
            [
                'rating' => 5,
                'content' => 'Produknya enak dan pengiriman cepat!',
                'reply' => 'Terima kasih atas ulasannya 😊',
            ],
            [
                'rating' => 4,
                'content' => 'Rasa baksonya gurih, anak-anak suka.',
                'reply' => 'Senang mendengarnya, semoga jadi langganan!',
            ],
            [
                'rating' => 3,
                'content' => 'Pengemasan baik tapi agak lama sampainya.',
                'reply' => 'Kami akan evaluasi layanan ekspedisi, terima kasih masukannya.',
            ],
            [
                'rating' => 5,
                'content' => 'Dimsum udang favorit saya sekarang!',
                'reply' => 'Mantap! Terima kasih sudah mencoba 😊',
            ],
            [
                'rating' => 4,
                'content' => 'Stok produk cepat habis, tapi kualitas oke.',
                'reply' => 'Kami sedang tingkatkan stok, makasih infonya!',
            ],
        ];

        foreach ($products as $i => $product) {
            Testimonial::create([
                'user_id' => $buyer->id,
                'product_id' => $product->id,
                'rating' => $data[$i]['rating'],
                'content' => $data[$i]['content'],
                'reply' => $data[$i]['reply'],
                'status' => 'approved',
            ]);
        }
    }
}
