<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'business_name' => $this->faker->company(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone1' => $this->faker->phoneNumber(),
            'phone2' => $this->faker->optional()->phoneNumber(),
            'nif' => $this->faker->unique()->numerify('#########X'),
            'vat_number' => $this->faker->optional()->bothify('??########'),
        ];
    }
}
