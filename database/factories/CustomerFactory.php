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
        'company' => $faker->name(),
        'CIF' => rand(100000001, 990000001),
        'created_at' => $faker->dateTimeInInterval($startDate = '-30 years', $endDate = '-3 years', $interval = '+ 5 days'),
        'updated_at' => $faker->dateTimeThisYear($max = 'now')
    ];
});
