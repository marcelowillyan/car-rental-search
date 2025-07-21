<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            'Toyota', 'Volkswagen', 'BMW', 'Mercedes-Benz', 'Honda', 'Ford', 'Chevrolet', 'Audi',
            'Hyundai', 'Kia', 'Renault', 'Peugeot', 'Nissan', 'Volvo', 'Fiat', 'Tesla', 'Jeep',
            'Porsche', 'Mitsubishi', 'Subaru', 'Land Rover', 'Mazda', 'Suzuki', 'Citroën', 'Skoda',
            'Lexus', 'Ferrari', 'Lamborghini', 'Maserati', 'Mini', 'Chrysler', 'Dodge', 'GMC'
        ];

        foreach ($brands as $brandName) {
            Brand::firstOrCreate(['name' => $brandName]);
        }
    }
}