<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Entre;

class EntresTableSeeder extends Seeder
{
    public function run()
    {
        foreach (range(1, 10) as $index) {
            Entre::create([
                'quantité' => rand(1, 10),
                'id_produit' => rand(1, 10),
            ]);
        }
    }
}

