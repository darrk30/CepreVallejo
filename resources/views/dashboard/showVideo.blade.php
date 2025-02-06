<x-app-layout>
    <div class="max-w-7xl px-4 sm:px-6 lg:px-8 mx-auto py-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- Columna izquierda con el video y su título -->
            <div class="col-span-2">
                
                    <!-- Título del video -->
                    <h1 class="text-2xl font-bold text-gray-800 mb-4">{{ $video->titulo }}</h1>

                    <div class="relative w-full" style="padding-bottom: 56.25%">
                        <!-- El iframe del video -->
                        @php
                            // Convertir la URL del video para ser compatible con un iframe de YouTube
                            $iframeSrc = str_replace('watch?v=', 'embed/', $video->iframe);
                        @endphp

                        <!-- Mostrar el video embebido -->
                        <iframe src="{{ $iframeSrc }}" class="absolute top-0 left-0 w-full h-full rounded-lg"
                            frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>

                    <!-- Descripción del video -->
                    <p class="text-gray-700 mt-4">{{ $video->descripcion }}</p>
                
            </div>

            <!-- Columna derecha con videos recomendados -->
            <div class="bg-white p-4 rounded-lg shadow-md">
                <h2 class="text-lg font-bold text-gray-800 mb-4">Videos Recomendados</h2>
            
                @foreach ($relatedVideos as $relatedVideo)
                    <div class="mb-4">
                        <a href="{{ route('video.show', $relatedVideo) }}" class="flex flex-col sm:flex-row items-start space-y-2 sm:space-y-0 sm:space-x-4">
                            <!-- Miniatura del video -->
                            @php
                                $youtube_id = null;
                                if (!empty($relatedVideo->iframe)) {
                                    preg_match('/v=([^\&]+)/', $relatedVideo->iframe, $matches);
                                    $youtube_id = $matches[1] ?? null;
                                }
                            @endphp
            
                            @if ($youtube_id)
                                <!-- Miniatura de YouTube del video relacionado -->
                                <img src="https://img.youtube.com/vi/{{ $youtube_id }}/hqdefault.jpg"
                                    alt="{{ $relatedVideo->titulo }}" class="w-full sm:w-32 h-auto object-cover rounded-lg">
                            @else
                                <!-- Imagen de reserva si no hay miniatura disponible -->
                                <img src="https://www.deperu.com/diccionario/imagenes/palabra-examen.jpg"
                                    alt="{{ $relatedVideo->titulo }}" class="w-full sm:w-32 h-auto object-cover rounded-lg">
                            @endif
            
                            <!-- Título del video recomendado -->
                            <div class="flex-1 mt-2 sm:mt-0">
                                <h5 class="text-sm font-semibold text-gray-800">{{ $relatedVideo->titulo }}</h5>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            
    </div>
</x-app-layout>
