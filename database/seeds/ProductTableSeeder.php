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
        $product->name = 'Macbook';
        $product->description = 'Lrem ipsum dolor sit, amet consectetur adipisicing';
        $product->price = 2000;
        $product->quantity = 10;
        $product->save();
        // 2
        $product = new \App\Product();
        $product->name = 'Asus Laptop';
        $product->description = 'Lrem ipsum dolor sit, amet consectetur adipisicing';
        $product->price = 1000;
        $product->quantity = 10;
        $product->save();
        // 3
        $product = new \App\Product();
        $product->name = 'Samsung Phone';
        $product->description = 'Lrem ipsum dolor sit, amet consectetur adipisicing';
        $product->price = 800;
        $product->quantity = 10;
        $product->save();
        // 4
        $product = new \App\Product();
        $product->name = 'Acer Laptop';
        $product->description = 'Lrem ipsum dolor sit, amet consectetur adipisicing';
        $product->price = 900;
        $product->quantity = 10;
        $product->save();
        // 5
        $product = new \App\Product();
        $product->name = 'DELL Laptop';
        $product->description = 'Lrem ipsum dolor sit, amet consectetur adipisicing';
        $product->price = 1200;
        $product->quantity = 10;
        $product->save();
        // 6
        $product = new \App\Product();
        $product->name = 'Iphone';
        $product->description = 'Lrem ipsum dolor sit, amet consectetur adipisicing';
        $product->price = 1500;
        $product->quantity = 10;
        $product->save();
        // 7
        $product = new \App\Product();
        $product->name = 'Asus Laptop';
        $product->description = 'Lrem ipsum dolor sit, amet consectetur adipisicing';
        $product->price = 1200;
        $product->quantity = 10;
        $product->save();
        // 8
        $product = new \App\Product();
        $product->name = 'Huawei Phone';
        $product->description = 'Lrem ipsum dolor sit, amet consectetur adipisicing';
        $product->price = 500;
        $product->quantity = 10;
        $product->save();
        // 9
        $product = new \App\Product();
        $product->name = 'Mi Phone';
        $product->description = 'Lrem ipsum dolor sit, amet consectetur adipisicing';
        $product->price = 400;
        $product->quantity = 10;
        $product->save();
        // 10
        $product = new \App\Product();
        $product->name = 'Mi Laptop';
        $product->description = 'Lrem ipsum dolor sit, amet consectetur adipisicing';
        $product->price = 1100;
        $product->quantity = 10;
        $product->save();
    }
}
