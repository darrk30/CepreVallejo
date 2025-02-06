<div class="container mt-4 p-4 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between mb-4">
        <!-- Barra de búsqueda -->
        <div class="flex-grow">
            <input type="text" wire:model.live="search" placeholder="Buscar cursos..."
                class="border border-gray-300 rounded-lg p-2 w-full md:w-1/2 lg:w-1/3 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <!-- Botón NUEVO -->
        <div class="ml-4">
            <a href="{{ route('admin.videos.create') }}"
                class="bg-blue-500 text-white rounded-lg px-4 py-2 transition duration-200 hover:bg-blue-600">
                Nuevo Video
            </a>
        </div>
    </div>

    <!-- Cuadrícula de cursos -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
        @foreach ($videos as $video)
            <a href="{{ route('video.show', $video) }}"
                class="bg-white rounded-lg shadow-md p-4 transition-shadow duration-200 hover:shadow-lg">
                <div class="flex">
                    <div class="w-1/4">
                        <div class="relative">
                            @php
                                // Verificar si el campo iframe tiene un valor y extraer el ID del video
                                $youtube_id = null;
                                if (!empty($video->iframe)) {
                                    // Usar expresión regular para extraer el ID del video de YouTube del link (v=VIDEO_ID)
                                    preg_match('/v=([^\&]+)/', $video->iframe, $matches);
                                    $youtube_id = $matches[1] ?? null; // Si no hay coincidencia, $youtube_id será null
                                }
                            @endphp

                            @if ($youtube_id)
                                <!-- Usa la miniatura del video de YouTube si se encontró el ID -->
                                <img src="https://img.youtube.com/vi/{{ $youtube_id }}/hqdefault.jpg"
                                    alt="{{ $video->titulo }}" class="fixed-size-img" />
                            @else
                                <!-- Si no se encuentra el ID, mostrar una imagen de reserva -->
                                <img src="https://www.deperu.com/diccionario/imagenes/palabra-examen.jpg"
                                    alt="Imagen no disponible" class="w-full h-auto mx-auto object-cover"
                                    style="height: 180px;" />
                            @endif
                        </div>
                    </div>
                    <div class="w-3/4 pl-2">
                        <h6 class="text-sm">{{ $video->titulo }}</h6>
                        <p class="text-xs">
                            <strong>Descripcion:</strong> {{ $video->descripcion }}<br>
                            <strong>Estado:</strong> {{ $video->status }}<br>
                            <strong>Categoria:</strong> {{ $video->category->titulo }}<br>
                        </p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    <!-- Paginación -->
    <div class="mt-4">
        {{ $videos->links() }} <!-- Esto generará los enlaces de paginación -->
    </div>
</div>
