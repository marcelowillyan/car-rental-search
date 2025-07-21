<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Car;
use App\Models\Category;
use App\Models\Brand;
use Livewire\WithPagination;
use Illuminate\Support\Collection;

class CarSearch extends Component
{
    use WithPagination;

    public $searchName = '';
    public $selectedCategories = [];
    public $selectedBrands = [];
    public $page;

    public $categories;
    public $brands;

    protected $queryString = [
        'searchName' => ['except' => ''],
        'selectedCategories' => ['except' => [], 'as' => 'categories'],
        'selectedBrands' => ['except' => [], 'as' => 'brands'],
        'page' => ['except' => 1],
    ];

    public function mount()
    {
        $this->categories = Category::orderBy('name')->get();
        $this->brands = Brand::orderBy('name')->get();
    }

    public function updating($name, $value)
    {
        $this->resetPage();
    }

    public function clearFilters()
    {
        $this->searchName = '';
        $this->selectedCategories = [];
        $this->selectedBrands = [];
        $this->resetPage();
    }

    public function render()
    {
        $cars = Car::query()
            ->when($this->searchName, function ($query) {
                $query->where('name', 'like', '%' . $this->searchName . '%');
            })
            ->when(!empty($this->selectedCategories), function ($query) {
                $query->whereIn('category_id', $this->selectedCategories);
            })
            ->when(!empty($this->selectedBrands), function ($query) {
                $query->whereIn('brand_id', $this->selectedBrands);
            })
            ->with(['category', 'brand'])
            ->paginate(6);

        return view('livewire.car-search', [
            'cars' => $cars,
        ]);
    }
}