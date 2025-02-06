<x-app-layout>
    <div class="container max-w-7xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap md:flex-nowrap bg-white p-4 rounded-lg shadow-md">
            <!-- Imagen del libro a la izquierda -->
            <div class="w-full md:w-1/3 flex justify-center mb-4 md:mb-0">
                <img src="{{ isset($book->image->url) ? Storage::disk('s3')->url($book->image->url) : 'https://www.deperu.com/diccionario/imagenes/palabra-examen.jpg' }}"
                    alt="{{ $book->titulo }}" class="w-48 h-auto object-cover rounded-lg shadow-lg">
            </div>

            <!-- Detalles del libro a la derecha -->
            <div class="w-full md:w-2/3 md:pl-6">
                <h2 class="text-3xl font-semibold text-gray-800">{{ $book->titulo }}</h2>
                <p class="text-lg text-gray-600 mt-2"><strong>Autor:</strong> {{ $book->autor }}</p>
                <p class="text-gray-700 mt-4">{{ $book->descripcion }}</p>
            </div>
        </div>

        <!-- Espacio para el libro en Google Drive (iframe) -->
        <div class="mt-8">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Lectura del Libro</h3>
            <!-- Iframe para previsualizar el archivo -->
            <iframe src="https://drive.google.com/file/d/{{ $book->url }}/preview" width="100%" height="800"
                allow="autoplay">
            </iframe>
        </div>

    </div>
</x-app-layout>
