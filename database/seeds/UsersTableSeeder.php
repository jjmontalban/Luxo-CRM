<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrator',
            'email' => 'a@a.com',
            'password' => Hash::make('a'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        factory(\App\User::class,2)->create();
    }
}
