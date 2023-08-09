<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Personne;

class PersonnesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        foreach (range(1, 10) as $index) {
            Personne::create([
                'nom' => $faker->lastName,
                'prénom' => $faker->firstName,
                'id_user' => $faker->unique()->numberBetween(1, 10),
            ]);
        }
    }
}

