<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [

            // TELEFON
            [
                'name' => 'iPhone 15 128GB',
                'category' => 'Telefon',
                'price' => 49999,
                'stock' => 15,
                'description' => 'Apple iPhone 15, A16 Bionic işlemci ve gelişmiş kamera sistemi ile yüksek performans sunar.',
            ],
            [
                'name' => 'Samsung Galaxy S24',
                'category' => 'Telefon',
                'price' => 42999,
                'stock' => 20,
                'description' => 'Samsung Galaxy S24, güçlü batarya ve dinamik AMOLED ekran ile üst düzey deneyim sağlar.',
            ],

            // LAPTOP
            [
                'name' => 'MacBook Air M2',
                'category' => 'Laptop',
                'price' => 34999,
                'stock' => 8,
                'description' => 'Apple MacBook Air M2, hafif tasarımı ve yüksek performansıyla profesyoneller için idealdir.',
            ],
            [
                'name' => 'Lenovo ThinkPad X1 Carbon',
                'category' => 'Laptop',
                'price' => 37999,
                'stock' => 6,
                'description' => 'ThinkPad X1 Carbon, iş dünyası için tasarlanmış dayanıklı ve güçlü bir dizüstü bilgisayardır.',
            ],

            // KULAKLIK
            [
                'name' => 'Sony WH-1000XM5',
                'category' => 'Kulaklık',
                'price' => 8999,
                'stock' => 25,
                'description' => 'Sony WH-1000XM5, gelişmiş aktif gürültü engelleme teknolojisi ile üstün ses deneyimi sunar.',
            ],
            [
                'name' => 'AirPods Pro 2. Nesil',
                'category' => 'Kulaklık',
                'price' => 7999,
                'stock' => 30,
                'description' => 'Apple AirPods Pro, adaptif ses ve şeffaf mod özellikleriyle konforlu kullanım sağlar.',
            ],

            // MONİTÖR
            [
                'name' => 'LG UltraGear 27” 144Hz',
                'category' => 'Monitör',
                'price' => 11999,
                'stock' => 10,
                'description' => 'LG UltraGear 144Hz oyuncu monitörü, akıcı görüntü ve yüksek tepki süresi sunar.',
            ],

            // TABLET
            [
                'name' => 'iPad 10. Nesil',
                'category' => 'Tablet',
                'price' => 17999,
                'stock' => 12,
                'description' => 'iPad 10. Nesil, güçlü performansı ve geniş ekranıyla günlük kullanım için idealdir.',
            ],
        ];

        foreach ($products as $item) {
            Product::create([
                'name' => $item['name'],
                'category' => $item['category'],
                'price' => $item['price'],
                'stock' => $item['stock'],
                'description' => $item['description'],
                'image' => null,
                'views' => rand(50, 500),
                'sales_count' => rand(10, 150),
            ]);
        }
    }
}
