<?php

use Faker\Generator as Faker;

$factory->define(App\Inventory::class, function (Faker $faker) {
    return [
        'in_quantity' => $faker->numberBetween(0, 100),
        'product_id' => $faker->numberBetween(1, 10),
    ];
});
