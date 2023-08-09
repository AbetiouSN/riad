<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Stock;

class StocksTableSeeder extends Seeder
{
    public function run()
    {
        foreach (range(1, 10) as $index) {
            Stock::create([
                'quantité_initiale' => rand(100, 1000),
                'quantité_finale' => rand(0, 100),
            ]);
        }
    }
}

