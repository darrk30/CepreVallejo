<div class="container mt-4 p-4 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between mb-4">
        <!-- Barra de búsqueda -->
        <div class="flex-grow">
            <input type="text" wire:model.live="search" placeholder="Buscar cursos..."
                class="border border-gray-300 rounded-lg p-2 w-full md:w-1/2 lg:w-1/3 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <!-- Botón NUEVO -->
        <div class="ml-4">
            <a href="{{ route('admin.books.create') }}"
                class="bg-blue-500 text-white rounded-lg px-4 py-2 transition duration-200 hover:bg-blue-600">
                Nuevo Libro
            </a>
        </div>
    </div>

    <!-- Cuadrícula de cursos -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
        @foreach ($books as $book)
            <a href="{{ route('cursos.show', $book) }}"
                class="bg-white rounded-lg shadow-md p-4 transition-shadow duration-200 hover:shadow-lg">
                <div class="flex">
                    <div class="w-1/4">
                        <img src="{{ isset($book->image->url) ? Storage::disk('s3')->url($book->image->url) : 'https://www.deperu.com/diccionario/imagenes/palabra-examen.jpg' }}"
                            alt="Curso" class="fixed-size-img">
                    </div>
                    <div class="w-3/4 pl-2">
                        <h6 class="text-sm">{{ $book->titulo }}</h6>
                        <p class="text-xs">
                            <strong>Autor:</strong> {{ $book->autor }}<br>
                            <strong>Descripcion:</strong> {{ $book->descripcion }}<br>
                            <strong>Estado:</strong> {{ $book->status }}<br>
                            <strong>Categoria:</strong> {{ $book->category->titulo }}<br>
                        </p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    <!-- Paginación -->
    <div class="mt-4">
        {{ $books->links() }} <!-- Esto generará los enlaces de paginación -->
    </div>
</div>
