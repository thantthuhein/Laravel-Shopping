<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\CreditpointsCard;

class CreditpointsCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $card = new CreditpointsCard();
        $card->pin = $faker->creditCardNumber;
        $card->value = 1000; 
        $card->save();

        $card = new CreditpointsCard();
        $card->pin = $faker->creditCardNumber;
        $card->value = 3000; 
        $card->save();

        $card = new CreditpointsCard();
        $card->pin = $faker->creditCardNumber;
        $card->value = 5000; 
        $card->save();
    }
}
