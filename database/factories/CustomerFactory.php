<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'firstname' => $faker->name,
        'lastname' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'phone_1' => $faker->phoneNumber,
        'phone_2' => $faker->phoneNumber,
        'address' => $faker->address,
        'company' => $faker->name(),
        'CIF' => rand(500000001, 590000001),
        'date_add' => Carbon::parse('2000-01-01'),
    ];
});
