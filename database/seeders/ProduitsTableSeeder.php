<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Produit;

class ProduitsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        foreach (range(1, 10) as $index) {
            Produit::create([
                'nom' => $faker->word,
                'quantité' => rand(10, 100),
                'catégorie' => $faker->word,
                'id_stock' => $faker->numberBetween(1, 10),
            ]);
        }
    }
}

