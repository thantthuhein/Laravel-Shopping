<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1
        $product = new \App\Product();
        $product->name = 'Macbook Pro 2018';
        $product->description = '13-inch, Touch Bar and Touch ID 2.3GHz Quad-Core Processor 256GB Storage';
        $product->colors = 'Space Gray, Silver'; 
        $product->imagePath = 'https://res.cloudinary.com/dcs3zcs3v/image/upload/v1554118065/Macbook2-1.jpg';
        $product->processor = '2.3GHz quad-core 8th-generation Intel Core i5 processor';
        $product->ghz = 'Turbo Boost up to 3.8GHz';
        $product->graphics = 'Intel Iris Plus Graphics 655';
        $product->memory = '8GB 2133MHz LPDDR3 memory';
        $product->storage = '256GB SSD storage1';
        $product->display = 'Retina display with True Tone';
        $product->ports = 'Four Thunderbolt 3 ports';
        $product->price = 2000;
        $product->quantity = 10;
        $product->save();
        // 2
        $product = new \App\Product();
        $product->name = 'GT80 Titan';
        $product->description = "The world's most powerful gaming laptop is more like a foldable desktop";
        $product->colors = 'Black'; 
        $product->imagePath = 'https://res.cloudinary.com/dcs3zcs3v/image/upload/v1554105734/10700547_10153320241958084_2846664711908707633_o.0.0.jpg';
        $product->processor = '2.6GHz Intel Core i7-4720HQ';
        $product->ghz = 'quad-core, 6MB cache, up to 3.6GHz with Turbo Boost';
        $product->graphics = '2 x Nvidia GTX 980M SLI (16 GB GDDR5); Intel HD Graphics 4600';
        $product->memory = '16GB DDR3L (1600MHz)';
        $product->storage = '256GB SSD; 1TB HDD (7,200 RPM)';
        $product->display = '18.4-inch WLED FHD (1920 x 1080) Anti-Glare Display';
        $product->ports = '5 x USB 3.0, HDMI, 2 x mini DisplayPort, Ethernet, headphone jack, microphone jack, SPDIF';
        $product->price = 2000;
        $product->quantity = 10;
        $product->save();
        
    }
}
