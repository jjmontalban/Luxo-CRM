<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Address;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'alias' => $faker->randomElement(['entrega', 'facturacion']),
        'address' => $faker->secondaryAddress,
        'postcode' => $faker->numberBetween(11550,48080),
        'city' => $faker->city,
        'customer_id' => rand(1, 8000),
        'province_id' => rand(53, 108),
        'country_id' => 6,
    ];
});
