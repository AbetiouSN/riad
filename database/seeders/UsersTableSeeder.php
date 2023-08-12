<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        foreach (range(1, 10) as $index) {
            User::create([
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'),
                'type' => $faker->randomElement(['normal', 'admin']),
            ]);
        }
    }
}





