<?php

use Database\Seeders\ProvincesTableSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(ProvincesTableSeeder::class);
        /* factory(App\Category::class,20)->create();
        factory(App\Post::class,2000)->create();
        factory(App\Customer::class,8000)->create();
        factory(App\Address::class,9000)->create(); */
    }
}
