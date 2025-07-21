<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-6 text-center">Pesquisa de Carros para Aluguel</h1>

    <div class="bg-white shadow-md rounded-lg p-6 mb-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label for="searchName" class="block text-sm font-medium text-gray-700">Nome do Carro:</label>
                <input wire:model.live="searchName" type="text" id="searchName" placeholder="Pesquisar por nome..."
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label for="categories" class="block text-sm font-medium text-gray-700">Categorias:</label>
                <select wire:model.live="selectedCategories" multiple id="categories"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 h-32">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="brands" class="block text-sm font-medium text-gray-700">Marcas:</label>
                <select wire:model.live="selectedBrands" multiple id="brands"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 h-32">
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mt-6 flex justify-end">
            <button wire:click="clearFilters" class="px-4 py-2 bg-red-600 text-white rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                Limpar Filtros
            </button>
        </div>
    </div>

    @if($cars->isEmpty())
        <p class="text-center text-gray-600 text-lg">Nenhum carro encontrado com os filtros aplicados.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($cars as $car)
                <div class="bg-white shadow-md rounded-lg overflow-hidden flex flex-col">
                    <div class="p-6 flex-grow">
                        <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $car->name }}</h2>
                        <p class="text-gray-600 mb-2">{{ $car->description }}</p>
                        <p class="text-gray-700 font-bold mb-2"><span class="text-indigo-600">R$ {{ number_format($car->price_per_day, 2, ',', '.') }}</span></p>
                        <p class="text-gray-700">Categoria: <span class="font-medium">{{ $car->category->name }}</span></p>
                        <p class="text-gray-700">Marca: <span class="font-medium">{{ $car->brand->name }}</span></p>
                    </div>
                    <div class="p-6 bg-gray-50 border-t border-gray-200">
                        <button class="w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Alugar Agora
                        </button>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $cars->links() }}
        </div>
    @endif
</div>