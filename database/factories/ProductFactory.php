<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->numerify("Product ###"),
        'description' => $faker->text( $maxNbChars = 200, $minNbChars = 200) ,
        'price' => $faker->numberBetween(1000, 10000),
        'quantity' => $faker->numberBetween(10, 100)
    ];
});
