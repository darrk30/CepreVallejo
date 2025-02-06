<x-app-layout>
    <div class="flex flex-wrap py-4 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Columna Izquierda -->
        <div class="w-full md:w-2/3 p-4 order-2 lg:order-1">
            <h1 class="text-3xl font-semibold">{{ $curso->nombre }}</h1>
            <h2 class="text-lg text-gray-600 mt-2">{{ $curso->subtitulo }}</h2>

            <div class="mt-4">
                <img src="{{ isset($curso->image->url) ? Storage::disk('s3')->url($curso->image->url) : 'https://www.deperu.com/diccionario/imagenes/palabra-examen.jpg' }}"
                    alt="{{ $curso->nombre }}" class="rounded-lg max-w-full h-auto">
            </div>

            <!-- Carta Desplegable para el Temario -->
            <div class="mt-4 border border-gray-300 rounded-lg shadow-md">
                <button
                    class="w-full text-left p-4 focus:outline-none flex items-center justify-between bg-gray-100 hover:bg-gray-200"
                    onclick="toggleTemario()">
                    <h3 class="font-semibold">TEMARIO ({{ $curso->clases_count }} clases)</h3>
                    <i id="temarioIcon" class="fas fa-chevron-up ml-2"></i> <!-- Indicador de flecha -->
                </button>
                <div id="temarioContent" class="p-4"> <!-- Sin 'hidden' para estar desplegado inicialmente -->
                    <ul class="space-y-1">
                        @foreach ($curso->contenidosCurso as $contenido)
                            <li class="border-b pb-1">
                                <h3 class="text-lg font-semibold text-gray-700 mb-1">{{ $contenido->titulo }}</h3>
                                <p class="text-gray-600 text-sm">{{ $contenido->descripcion }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>


            <!-- Descripción del Curso -->
            <div class="mt-4 text-gray-600">
                <h3 class="font-semibold">Descripción del Curso</h3>
                <p>{{ $curso->descripcion }}</p>
            </div>
        </div>

        <!-- Columna Derecha -->
        <div class="w-full md:w-1/3 p-4  order-1 lg:order-2"> <!-- Cambié el orden aquí -->
            <div class="border border-gray-300 rounded-lg shadow-md p-4 bg-white">
                <h5 class="font-semibold text-lg mb-4">Detalles del Curso</h5>
                <div class="mt-4 flex items-center">
                    <i class="fas fa-video text-blue-800"></i>
                    <span class="ml-2 text-gray-700">Clases Online</span>
                </div>
                <div class="flex items-center mt-2">
                    <i class="fas fa-clock text-blue-800"></i>
                    <span class="ml-2 text-gray-700">Horario: {{ $curso->horario }}</span>
                </div>
                <div class="flex items-center mt-2">
                    <i class="fas fa-hourglass-half text-blue-800"></i>
                    <span class="ml-2 text-gray-700">Duración: {{ $curso->duracion }}</span>
                </div>
                <div class="flex items-center mt-2">
                    <i class="fas fa-user text-blue-800"></i>
                    <span class="ml-2 text-gray-700">Prof.
                        @foreach ($curso->ciclos as $ciclo)
                            {{ $ciclo->user->name }}
                        @endforeach
                    </span>

                </div>
                <div class="flex items-center mt-2">
                    <i class="fas fa-calendar text-blue-800"></i>
                    <span class="ml-2 text-gray-700">Última actualización:
                        {{ $curso->updated_at->format('d/m/Y') }}</span>
                </div>
                <button
                    class="bg-blue-800 text-white font-semibold px-4 py-2 rounded-lg w-full mt-4 hover:bg-blue-600 transition duration-200">INSCRÍBETE
                    AHORA</button>
            </div>
        </div>
    </div>

    <!-- Script para desplegar el temario -->
    <script>
        function toggleTemario() {
            const content = document.getElementById('temarioContent');
            content.classList.toggle('hidden');

            // Cambiamos el icono dependiendo de si está desplegado o no
            if (temarioContent.classList.contains('hidden')) {
                temarioIcon.classList.remove('fa-chevron-up');
                temarioIcon.classList.add('fa-chevron-down'); // Flecha hacia abajo (colapsado)
            } else {
                temarioIcon.classList.remove('fa-chevron-down');
                temarioIcon.classList.add('fa-chevron-up'); // Flecha hacia arriba (desplegado)
            }
        }
    </script>
</x-app-layout>
