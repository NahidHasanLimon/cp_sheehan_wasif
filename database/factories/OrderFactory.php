<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use App\User;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\User::class),
        'status' => 'placed',
        'address' => 'mirpur 02',
        'area_id' => factory(App\Area::class),
    ];
});
