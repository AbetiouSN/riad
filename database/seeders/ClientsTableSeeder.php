<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        foreach (range(1, 10) as $index) {
            Client::create([
                'prenom' => $faker->firstName,
                'payment' => $faker->randomElement(['cash', 'carte de crédit']),
                'type_payment' => $faker->randomElement(['comptant', 'échelonnement']),
                'id_réservation' => rand(1, 10),
                'id_produit' => rand(1, 10),
            ]);
        }
    }
}

