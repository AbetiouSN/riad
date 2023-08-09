<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Agence;

class AgencesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        foreach (range(1, 10) as $index) {
            Agence::create([
                'nom_activité' => $faker->word,
                'nom_réceptionniste' => $faker->name,
                'nbr_nuit' => rand(1, 10),
                'id_client' => rand(1, 10),
            ]);
        }
    }
}

