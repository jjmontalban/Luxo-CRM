<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        // Generar 10 registros de prueba
        Customer::factory()->count(10)->create();
    }
}
