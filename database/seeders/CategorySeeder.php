<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Sedan', 'SUV', 'Hatchback', 'Crossover', 'Esportivo', 'Picape', 'Minivan', 'Compacto',
            'Executivo', 'Luxo', 'Utilitário', 'Conversível', 'Coupé', 'Elétrico', 'Híbrido'
        ];

        foreach ($categories as $categoryName) {
            Category::firstOrCreate(['name' => $categoryName]);
        }
    }
}