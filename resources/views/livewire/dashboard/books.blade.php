<div>
    <section
        class="h-screen text-center text-white bg-cover bg-center bg-no-repeat banner flex items-center justify-center"
        style="height: 25vh; background-image: url(https://c8.alamy.com/compit/2byjd6d/banner-libreria-online-orizzontale-giovane-uomo-in-notebook-alla-ricerca-di-e-book-sullo-sfondo-della-sala-della-biblioteca-con-armadi-di-libri-vettore-il-2byjd6d.jpg); background-size: cover; background-position: center;">
    </section>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div
            class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-4 sm:space-y-0 sm:space-x-4">

            <!-- Search Input (Ocupará más espacio que los demás elementos) -->
            <div class="flex-grow sm:w-2/3 lg:w-1/2">
                <input type="text" wire:model.live.debounce.300ms="search" placeholder="Buscar libro..."
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
        <!-- Cuadrícula de libros -->
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4 mt-4">
            <!-- Cambiado a grid con 5 columnas en pantallas grandes -->
            @foreach ($books as $book)
                <div class="bg-white border border-gray-300 rounded-lg shadow-md overflow-hidden" style="width: 192px;">
                    <!-- Establece el ancho fijo aquí -->
                    <img src="{{ isset($book->image->url) ? Storage::disk('s3')->url($book->image->url) : 'https://www.deperu.com/diccionario/imagenes/palabra-examen.jpg' }}"
                        alt="{{ $book->titulo }}" class="w-full h-auto mx-auto" />
                    <!-- La imagen ocupa todo el ancho del contenedor -->
                    <div class="p-2">
                        <h5 class="text-sm font-semibold text-gray-800">{{ $book->titulo }}</h5>
                        <p class="mt-1 text-sm text-gray-600">Autor: {{ $book->autor }}</p>
                        <a href="{{ route('biblioteca.show', $book) }}"
                            class="mt-2 inline-block bg-blue-600 text-white font-semibold px-3 py-1 rounded-lg hover:bg-blue-500 transition duration-200 text-sm">Ver
                            Libro</a>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Paginación -->
        <div class="mt-4">
            {{ $books->links() }} <!-- Esto generará los enlaces de paginación -->
        </div>
    </div>
</div>
