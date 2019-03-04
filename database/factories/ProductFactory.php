<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'pr_name' => $faker->randomElement(array('papas','galletas','patacones','arvejas','pescado','carne','cerdo','pollo','lechona','empanadas','atun','sopa','canela','mani','helado')),
        'pr_price' => mt_rand( 1000,50000),
        'user_id' =>  $faker->numberBetween(1, 10)
    ];
});
