<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->text,
        'price' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 100.00, $max = NULL),
    ];
});
