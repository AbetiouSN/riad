<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\ProduitVent;

class ProduitVentsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        foreach (range(1, 10) as $index) {
            ProduitVent::create([
                'quantité' => rand(1, 10),
                'prix_produit' => $faker->randomFloat(2, 10, 100),
                'prix_total' => $faker->randomFloat(2, 100, 1000),
                'somme_jour' => $faker->randomFloat(2, 10, 100),
                'type_vent' => $faker->randomElement(['vente en ligne', 'vente en magasin']),
                'id_produit' => $faker->numberBetween(1, 10),
            ]);
        }
    }
}

