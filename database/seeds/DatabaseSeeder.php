<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        DB::table('users')->insert([
            'name' => 'admin',
            'isAdmin' => 1,
            'email' => 'testadmin@gmail.com',
            'password' => bcrypt('admin123'),
        ]);
    }
}
