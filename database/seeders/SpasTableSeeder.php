<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Spa;

class SpasTableSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        foreach (range(1, 10) as $index) {
            Spa::create([
                'id_réservation' => $faker->numberBetween(1, 10),
                'catégorie' => $faker->word,
                'nom_soin' => $faker->word,
                'dépense' => $faker->randomFloat(2, 10, 100),
                'nom_réceptionniste' => $faker->name,
                'prix' => $faker->randomFloat(2, 50, 500),
                'somme' => $faker->randomFloat(2, 10, 100),
                'id_client' => $faker->numberBetween(1, 10),
            ]);
        }
    }
}

