<div class="flex">
    <!-- Contenedor para los filtros de categoría (visible solo en pantallas medianas y grandes) -->
    <div class="hidden md:w-1/2 md:block mr-4">
        <h3 class="font-semibold text-lg mb-2">Filtrar por categorías:</h3>
        <div class="mt-6">
            @foreach ($categorias as $categoria)
                <div class="flex items-center mb-2">
                    <input type="checkbox" wire:model="selectedCategories" value="{{ $categoria->id }}"
                        id="category-{{ $categoria->id }}"
                        class="mr-2 h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" />
                    <label for="category-{{ $categoria->id }}" class="text-gray-700">{{ $categoria->titulo }}</label>
                </div>
            @endforeach

            <button wire:click="applyFilters"
                class="bg-blue-600 text-white font-semibold px-4 py-2 mt-4 rounded-lg shadow-lg transition duration-200 ease-in-out hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50">
                FILTRAR
            </button>
        </div>
    </div>

    <!-- Contenedor para el buscador y los cursos -->
    <div class="flex-grow">
        <div class="relative mb-4">
            <input type="text" wire:model.live="search" placeholder="Buscar cursos..."
                class="form-input mt-1 block w-full rounded-md pl-10 pr-4 py-2 border border-gray-300 focus:outline-none focus:ring focus:ring-blue-300" />
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <i class="fas fa-search text-gray-400"></i> <!-- Icono de lupa -->
            </span>
        </div>

        <div class="mt-4">
            @forelse($cursos as $curso)
                <a href="{{ route('cursos.show', $curso) }}"
                    class="flex flex-col md:flex-row border p-2 mb-4 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200">
                    <div class="w-full md:w-1/4">
                        <img src="{{ isset($curso->image->url) ? Storage::disk('s3')->url($curso->image->url) : 'https://www.deperu.com/diccionario/imagenes/palabra-examen.jpg' }}"
                            alt="Curso" class="fixed-size-img rounded-lg object-cover max-w-full h-auto">
                    </div>
                    <div class="w-full md:w-2/3 pl-0 md:pl-4 mt-4 md:mt-0">
                        <h4 class="font-semibold text-xl">{{ $curso->nombre }}</h4>
                        <p class="mt-2 text-gray-600 text-justify">{{ Str::limit($curso->descripcion, 200) }}</p>
                    </div>
                </a>
            @empty
                <p class="text-gray-500">No se encontraron cursos.</p>
            @endforelse
        </div>
        {{ $cursos->links() }} <!-- Para la paginación -->
    </div>

</div>
