<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PetitDej;

class PetitDejsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        foreach (range(1, 10) as $index) {
            PetitDej::create([
                'numéro_bon' => $faker->unique()->randomNumber(),
                'prix_restau' => $faker->randomFloat(2, 5, 20),
                'prix_riad' => $faker->randomFloat(2, 3, 15),
            ]);
        }
    }
}

