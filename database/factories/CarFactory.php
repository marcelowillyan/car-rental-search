<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    protected $model = Car::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word() . ' ' . $this->faker->numberBetween(100, 999),
            'description' => $this->faker->paragraph(),
            'price_per_day' => $this->faker->randomFloat(2, 50, 500),
            'category_id' => Category::factory(),
            'brand_id' => Brand::factory(),
        ];
    }
}