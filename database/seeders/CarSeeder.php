<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;
use App\Models\Brand;
use App\Models\Category;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Brand::count() === 0) {
            (new BrandSeeder())->run();
        }
        if (Category::count() === 0) {
            (new CategorySeeder())->run();
        }

        $toyota = Brand::where('name', 'Toyota')->first();
        $volkswagen = Brand::where('name', 'Volkswagen')->first();
        $bmw = Brand::where('name', 'BMW')->first();
        $mercedes = Brand::where('name', 'Mercedes-Benz')->first();
        $honda = Brand::where('name', 'Honda')->first();
        $ford = Brand::where('name', 'Ford')->first();
        $audi = Brand::where('name', 'Audi')->first();
        $nissan = Brand::where('name', 'Nissan')->first();

        $sedan = Category::where('name', 'Sedan')->first();
        $suv = Category::where('name', 'SUV')->first();
        $hatchback = Category::where('name', 'Hatchback')->first();
        $esportivo = Category::where('name', 'Esportivo')->first();
        $picape = Category::where('name', 'Picape')->first();
        $eletrico = Category::where('name', 'Elétrico')->first();
        $compacto = Category::where('name', 'Compacto')->first();


        if ($toyota && $sedan) {
            Car::firstOrCreate(
                ['name' => 'Toyota Corolla Altis'],
                [
                    'description' => 'Sedan executivo, luxuoso e eficiente.',
                    'price_per_day' => 150.00,
                    'category_id' => $sedan->id,
                    'brand_id' => $toyota->id,
                ]
            );
        }

        if ($volkswagen && $suv) {
            Car::firstOrCreate(
                ['name' => 'Volkswagen T-Cross Highline'],
                [
                    'description' => 'SUV completo, com espaço interno e tecnologia.',
                    'price_per_day' => 180.00,
                    'category_id' => $suv->id,
                    'brand_id' => $volkswagen->id,
                ]
            );
        }

        if ($bmw && $esportivo) {
            Car::firstOrCreate(
                ['name' => 'BMW M2 Coupé'],
                [
                    'description' => 'Carro esportivo de alta performance, para quem busca adrenalina.',
                    'price_per_day' => 500.00,
                    'category_id' => $esportivo->id,
                    'brand_id' => $bmw->id,
                ]
            );
        }

        if ($mercedes && $sedan) {
            Car::firstOrCreate(
                ['name' => 'Mercedes-Benz C200'],
                [
                    'description' => 'Sedan premium, sinônimo de elegância e conforto.',
                    'price_per_day' => 350.00,
                    'category_id' => $sedan->id,
                    'brand_id' => $mercedes->id,
                ]
            );
        }

        if ($honda && $hatchback) {
            Car::firstOrCreate(
                ['name' => 'Honda Fit EXL'],
                [
                    'description' => 'Hatchback versátil, com espaço interno surpreendente.',
                    'price_per_day' => 110.00,
                    'category_id' => $hatchback->id,
                    'brand_id' => $honda->id,
                ]
            );
        }

        if ($ford && $picape) {
            Car::firstOrCreate(
                ['name' => 'Ford Ranger XLT'],
                [
                    'description' => 'Picape robusta e potente, ideal para qualquer terreno.',
                    'price_per_day' => 250.00,
                    'category_id' => $picape->id,
                    'brand_id' => $ford->id,
                ]
            );
        }

        if ($audi && $suv) {
            Car::firstOrCreate(
                ['name' => 'Audi Q5 Quattro'],
                [
                    'description' => 'SUV de luxo com tração integral e alta performance.',
                    'price_per_day' => 380.00,
                    'category_id' => $suv->id,
                    'brand_id' => $audi->id,
                ]
            );
        }

        if ($nissan && $eletrico) {
            Car::firstOrCreate(
                ['name' => 'Nissan Leaf'],
                [
                    'description' => 'Carro elétrico, silencioso e sustentável para o dia a dia.',
                    'price_per_day' => 160.00,
                    'category_id' => $eletrico->id,
                    'brand_id' => $nissan->id,
                ]
            );
        }

        if ($volkswagen && $compacto) {
            Car::firstOrCreate(
                ['name' => 'Volkswagen Polo Comfortline'],
                [
                    'description' => 'Compacto ágil e confortável, excelente para a cidade.',
                    'price_per_day' => 100.00,
                    'category_id' => $compacto->id,
                    'brand_id' => $volkswagen->id,
                ]
            );
        }

        if ($toyota && $suv) {
            Car::firstOrCreate(
                ['name' => 'Toyota RAV4 Hybrid'],
                [
                    'description' => 'SUV híbrido, combinando performance e economia de combustível.',
                    'price_per_day' => 200.00,
                    'category_id' => $suv->id,
                    'brand_id' => $toyota->id,
                ]
            );
        }

        if ($ford && $hatchback) {
            Car::firstOrCreate(
                ['name' => 'Ford Ka Freestyle'],
                [
                    'description' => 'Hatchback compacto com estilo aventureiro.',
                    'price_per_day' => 90.00,
                    'category_id' => $hatchback->id,
                    'brand_id' => $ford->id,
                ]
            );
        }
        if ($honda && $suv) {
            Car::firstOrCreate(
                ['name' => 'Honda HR-V Touring'],
                [
                    'description' => 'SUV sofisticado com interior espaçoso e acabamento premium.',
                    'price_per_day' => 170.00,
                    'category_id' => $suv->id,
                    'brand_id' => $honda->id,
                ]
            );
        }
        if ($bmw && $suv) {
            Car::firstOrCreate(
                ['name' => 'BMW X1 sDrive20i'],
                [
                    'description' => 'SUV compacto da BMW, com dinamismo e conforto.',
                    'price_per_day' => 280.00,
                    'category_id' => $suv->id,
                    'brand_id' => $bmw->id,
                ]
            );
        }
        if ($mercedes && $suv) {
            Car::firstOrCreate(
                ['name' => 'Mercedes-Benz GLC 300'],
                [
                    'description' => 'SUV médio de luxo, com design elegante e performance.',
                    'price_per_day' => 400.00,
                    'category_id' => $suv->id,
                    'brand_id' => $mercedes->id,
                ]
            );
        }
        if ($audi && $sedan) {
            Car::firstOrCreate(
                ['name' => 'Audi A4 Ambiente'],
                [
                    'description' => 'Sedan esportivo e refinado, com alta tecnologia.',
                    'price_per_day' => 320.00,
                    'category_id' => $sedan->id,
                    'brand_id' => $audi->id,
                ]
            );
        }
    }
}