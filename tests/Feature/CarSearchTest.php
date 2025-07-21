<?php

namespace Tests\Feature\Livewire;

use App\Livewire\CarSearch;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class CarSearchTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_component_renders_correctly()
    {
        Livewire::test(CarSearch::class)
            ->assertStatus(200);
    }

    /** @test */
    public function it_displays_all_cars_initially()
    {
        Car::factory(5)->create();

        Livewire::test(CarSearch::class)
            ->assertSeeHtmlInOrder(Car::all()->pluck('name')->toArray());
    }

    /** @test */
    public function it_filters_cars_by_name()
    {
        Car::factory()->create(['name' => 'Toyota Camry']);
        Car::factory()->create(['name' => 'Honda Civic']);

        Livewire::test(CarSearch::class)
            ->set('searchName', 'Toyota') 
            ->assertSee('Toyota Camry') 
            ->assertDontSee('Honda Civic');
    }

    /** @test */
    public function it_filters_cars_by_single_category()
    {
        $categoryA = Category::factory()->create(['name' => 'SUV']);
        $categoryB = Category::factory()->create(['name' => 'Sedan']);

        Car::factory()->create(['name' => 'Carro SUV 1', 'category_id' => $categoryA->id]);
        Car::factory()->create(['name' => 'Carro Sedan 1', 'category_id' => $categoryB->id]);

        Livewire::test(CarSearch::class)
            ->set('selectedCategories', [$categoryA->id]) 
            ->assertSee('Carro SUV 1')
            ->assertDontSee('Carro Sedan 1');
    }

    /** @test */
    public function it_filters_cars_by_multiple_categories()
    {
        $categoryA = Category::factory()->create(['name' => 'SUV']);
        $categoryB = Category::factory()->create(['name' => 'Sedan']);
        $categoryC = Category::factory()->create(['name' => 'Hatchback']);

        Car::factory()->create(['name' => 'Carro SUV 1', 'category_id' => $categoryA->id]);
        Car::factory()->create(['name' => 'Carro Sedan 1', 'category_id' => $categoryB->id]);
        Car::factory()->create(['name' => 'Carro Hatch 1', 'category_id' => $categoryC->id]);

        Livewire::test(CarSearch::class)
            ->set('selectedCategories', [$categoryA->id, $categoryB->id]) 
            ->assertSee('Carro SUV 1')
            ->assertSee('Carro Sedan 1')
            ->assertDontSee('Carro Hatch 1');
    }

    /** @test */
    public function it_filters_cars_by_single_brand()
    {
        $brandA = Brand::factory()->create(['name' => 'Mercedes-Benz']);
        $brandB = Brand::factory()->create(['name' => 'BMW']);

        Car::factory()->create(['name' => 'Mercedes C-Class', 'brand_id' => $brandA->id]);
        Car::factory()->create(['name' => 'BMW 3 Series', 'brand_id' => $brandB->id]);

        Livewire::test(CarSearch::class)
            ->set('selectedBrands', [$brandA->id]) 
            ->assertSee('Mercedes C-Class')
            ->assertDontSee('BMW 3 Series');
    }

    /** @test */
    public function it_filters_cars_by_multiple_brands()
    {
        $brandA = Brand::factory()->create(['name' => 'Mercedes-Benz']);
        $brandB = Brand::factory()->create(['name' => 'BMW']);
        $brandC = Brand::factory()->create(['name' => 'Audi']);

        Car::factory()->create(['name' => 'Mercedes C-Class', 'brand_id' => $brandA->id]);
        Car::factory()->create(['name' => 'BMW 3 Series', 'brand_id' => $brandB->id]);
        Car::factory()->create(['name' => 'Audi A4', 'brand_id' => $brandC->id]);

        Livewire::test(CarSearch::class)
            ->set('selectedBrands', [$brandA->id, $brandB->id]) 
            ->assertSee('Mercedes C-Class')
            ->assertSee('BMW 3 Series')
            ->assertDontSee('Audi A4');
    }

    /** @test */
    public function it_filters_cars_by_combined_filters()
    {
        $categorySUV = Category::factory()->create(['name' => 'SUV']);
        $brandMercedes = Brand::factory()->create(['name' => 'Mercedes-Benz']);
        $brandBMW = Brand::factory()->create(['name' => 'BMW']);

        Car::factory()->create(['name' => 'Mercedes GLC', 'category_id' => $categorySUV->id, 'brand_id' => $brandMercedes->id]);
        Car::factory()->create(['name' => 'BMW X5', 'category_id' => $categorySUV->id, 'brand_id' => $brandBMW->id]);
        Car::factory()->create(['name' => 'Mercedes Sedan', 'category_id' => Category::factory()->create(['name' => 'Sedan'])->id, 'brand_id' => $brandMercedes->id]);

        Livewire::test(CarSearch::class)
            ->set('searchName', 'Mercedes')
            ->set('selectedCategories', [$categorySUV->id])
            ->assertSee('Mercedes GLC')
            ->assertDontSee('BMW X5')
            ->assertDontSee('Mercedes Sedan');
    }

    /** @test */
    public function it_clears_filters()
    {
        Car::factory()->create(['name' => 'Carro Teste 1']);
        Car::factory()->create(['name' => 'Carro Teste 2']);

        Livewire::test(CarSearch::class)
            ->set('searchName', 'Teste')
            ->set('selectedCategories', [Category::factory()->create()->id])
            ->set('selectedBrands', [Brand::factory()->create()->id])
            ->call('clearFilters') 
            ->assertSet('searchName', '') 
            ->assertSet('selectedCategories', []) 
            ->assertSet('selectedBrands', []) 
            ->assertSee('Carro Teste 1') 
            ->assertSee('Carro Teste 2');
    }
}