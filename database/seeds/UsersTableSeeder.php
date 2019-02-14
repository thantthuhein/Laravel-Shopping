<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'admin';
        $user->email = 'admin@gmail.com';
        $user->password = bcrypt('admin123');
        $user->is_admin = true;
        $user->save();

        $user = new User();
        $user->name = str_random(10);
        $user->email = str_random(10).'@gmail.com';
        $user->password = bcrypt('user123');
        $user->is_admin = false;
        $user->save();

        $user = new User();
        $user->name = str_random(10);
        $user->email = str_random(10).'@gmail.com';
        $user->password = bcrypt('secret');
        $user->is_admin = false;
        $user->save();

        $user = new User();
        $user->name = str_random(10);
        $user->email = str_random(10).'@gmail.com';
        $user->password = bcrypt('user123');
        $user->is_admin = false;
        $user->save();

        $user = new User();
        $user->name = str_random(10);
        $user->email = str_random(10).'@gmail.com';
        $user->password = bcrypt('user123');
        $user->is_admin = false;
        $user->save();

        $user = new User();
        $user->name = str_random(10);
        $user->email = str_random(10).'@gmail.com';
        $user->password = bcrypt('user123');
        $user->is_admin = false;
        $user->save();

        $user = new User();
        $user->name = str_random(10);
        $user->email = str_random(10).'@gmail.com';
        $user->password = bcrypt('user123');
        $user->is_admin = false;
        $user->save();

        $user = new User();
        $user->name = str_random(10);
        $user->email = str_random(10).'@gmail.com';
        $user->password = bcrypt('user123');
        $user->is_admin = false;
        $user->save();

    }
}
