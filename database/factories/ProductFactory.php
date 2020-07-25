<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
       'name' => $faker->word, 
    ];
});

$factory->define(App\Description::class, function (Faker $faker) {
    return [
       'body' => $faker->text, 
    ];
});
