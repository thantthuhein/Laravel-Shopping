<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1
        $category = new \App\Category();
        $category->name = 'Laptops';
        $category->description = 'Lorem ipsum dolor, sit amet consectetur adipisicing';
        $category->save();
        // 2
        $category = new \App\Category();
        $category->name = 'Phones';
        $category->description = 'Lorem ipsum dolor, sit amet consectetur adipisicing';
        $category->save();
        // 3
        $category = new \App\Category();
        $category->name = 'Accessories';
        $category->description = 'Lorem ipsum dolor, sit amet consectetur adipisicing';
        $category->save();
        // 4
        $category = new \App\Category();
        $category->name = 'Cables';
        $category->description = 'Lorem ipsum dolor, sit amet consectetur adipisicing';
        $category->save();
    }
}
