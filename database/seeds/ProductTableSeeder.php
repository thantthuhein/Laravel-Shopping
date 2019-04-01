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
        $product->name = 'Macbook Pro 2018 13-inch';
        $product->description = 'Touch Bar and Touch ID 2.3GHz Quad-Core Processor 256GB Storage';
        $product->colors = 'Space Gray, Silver'; 
        $product->imagePath = 'https://res.cloudinary.com/dcs3zcs3v/image/upload/v1554105741/macbookpro2018.jpg';
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
        $product->name = 'Titan';
        $product->description = 'Good for gaming';
        $product->colors = 'Black'; 
        $product->imagePath = 'https://res.cloudinary.com/dcs3zcs3v/image/upload/v1554105734/10700547_10153320241958084_2846664711908707633_o.0.0.jpg';
        $product->processor = '2.3GHz quad-core 8th-generation Intel Core i5 processor';
        $product->ghz = 'Turbo Boost up to 3.8GHz';
        $product->graphics = 'Intel Iris Plus Graphics 655';
        $product->memory = '8GB 2133MHz LPDDR3 memory';
        $product->storage = '256GB SSD storage1';
        $product->display = 'Display display';
        $product->ports = 'Four Thunderbolt 3 ports';
        $product->price = 2000;
        $product->quantity = 10;
        $product->save();
        // 3
        $product = new \App\Product();
        $product->name = 'Macbook Pro 2018 13-inch';
        $product->description = 'Touch Bar and Touch ID 2.3GHz Quad-Core Processor 256GB Storage';
        $product->colors = 'Space Gray, Silver'; 
        $product->imagePath = 'https://res.cloudinary.com/dcs3zcs3v/image/upload/v1554105741/macbookpro2018.jpg';
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
        
    }
}
