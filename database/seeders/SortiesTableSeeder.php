<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Sortie;

class SortiesTableSeeder extends Seeder
{
    public function run()
    {
        foreach (range(1, 10) as $index) {
            Sortie::create([
                'quantité' => rand(1, 10),
                'id_produit' => rand(1, 10),
                'id_client' => rand(1, 10),
            ]);
        }
    }
}

