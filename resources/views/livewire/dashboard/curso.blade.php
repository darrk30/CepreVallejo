<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Filtro de búsqueda -->
    <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-4 sm:space-y-0 sm:space-x-4">

        <!-- Search Input (Ocupará más espacio que los demás elementos) -->
        <div class="flex-grow sm:w-2/3 lg:w-1/2">
            <input type="text" wire:model.live.debounce.300ms="search" placeholder="Buscar cursos..."
                class="border border-gray-300 rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm">
        </div>

        <!-- Per Page Select (Con ajuste de estilo de select) -->
        <div class="flex items-center space-x-2">
            <label for="perPage" class="text-sm font-medium text-gray-700">Mostrar:</label>
            <div class="relative">
                <select wire:model.live.debounce.300ms="perPage" id="perPage"
                    class="appearance-none border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                </select>
            </div>
        </div>

        <!-- Category Select (Con ajuste de estilo de select) -->
        <div class="flex items-center space-x-2">
            <label for="category" class="text-sm font-medium text-gray-700">Categoría:</label>
            <div class="relative">
                <select wire:model.live.debounce.300ms="category_id" id="category"
                    class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Todas las categorías</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->titulo }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>



    <!-- Contenedor de las tarjetas de cursos -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($ciclosCursos as $cicloCurso)
            <div class="bg-white border border-gray-300 rounded-lg shadow-md p-4">
                <div class="h-40 bg-gray-200 rounded-lg flex items-center justify-center">
                    <img src="{{ isset($cicloCurso->curso->image->url) ? Storage::disk('s3')->url($cicloCurso->curso->image->url) : 'https://www.deperu.com/diccionario/imagenes/palabra-examen.jpg' }}"
                        alt="Curso" class="max-w-full max-h-full object-contain">
                </div>

                <div class="mt-4">
                    <h3 class="text-xl font-semibold text-gray-800">{{ $cicloCurso->curso->nombre }}</h3>
                    <p class="text-gray-600 mt-2">
                        <i class="fas fa-user text-blue-800 mr-1"></i> Prof. {{ $cicloCurso->user->name }}
                    </p>
                    <a href="{{ route('misCursos.show', [$cicloCurso->curso, $cicloCurso->id]) }}"
                        class="mt-2 inline-block bg-blue-600 text-white font-semibold px-3 py-2 rounded-lg hover:bg-blue-500 transition duration-200 text-sm">
                        Ir al Curso
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Paginación -->
    <div class="mt-4">
        {{ $ciclosCursos->links() }}
    </div>
</div>
