<div>
    <div class="max-w-7xl mx-auto mt-5 p-6 bg-white rounded-lg shadow-lg">
        @if (session()->has('message'))
            <div class="bg-green-500 text-white p-2 rounded">
                {{ session('message') }}
            </div>
        @endif
        <h2 class="text-2xl font-semibold">{{ $curso->nombre }}</h2>

        <p class="text-gray-500 italic mb-4">Profesor:
            @foreach ($curso->ciclos as $ciclo)
                {{ $ciclo->user->name }}
            @endforeach
        </p>

        <!-- Mensaje de éxito -->
        <div x-data="{ show: false }" x-show="show"
            class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
            style="display: none;" x-cloak>
            <strong>¡Éxito!</strong> Semana agregada.
            <button @click="show = false" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Botón de agregar semana -->
        <div class="mb-4 flex space-x-2">
            <div x-data="{ open: false }">
                @can('crearsemana')
                    <button @click="open = true"
                        class="bg-blue-600 text-white text-sm px-3 py-2 rounded-lg hover:bg-blue-500 transition duration-200">
                        AGREGAR SEMANA
                    </button>
                @endcan
                <div x-show="open" x-cloak class="fixed inset-0 bg-black opacity-50 z-40" style="display: none;"></div>
                @can('crearsemana')
                    <div x-show="open" x-cloak class="fixed inset-0 flex items-start justify-center z-50"
                        style="display: none;">
                        <div class="bg-white rounded-lg shadow-lg p-5 w-96 mt-20 transition-opacity duration-300 ease-in-out"
                            @click.away="open = false" @keydown.escape.window="open = false">
                            <h3 class="text-lg font-semibold mb-4">Agregar Semana</h3>
                            <input type="text" wire:model="titulo" class="border border-gray-300 p-2 rounded w-full"
                                placeholder="Título de la semana">
                            <div class="mt-4 flex justify-end">
                                <button @click="open = false"
                                    class="bg-gray-300 text-gray-700 px-4 py-2 rounded mr-2">Cancelar</button>
                                <button @click="open = false; show = true; setTimeout(() => show = false, 3000);"
                                    wire:click="guardarSemana"
                                    class="bg-blue-600 text-white px-4 py-2 rounded">Guardar</button>
                            </div>
                        </div>
                    </div>
                @endcan
            </div>

            <a href="#"
                class="bg-green-600 text-white text-sm px-3 py-2 rounded-lg hover:bg-green-500 transition duration-200">IR
                A CLASE</a>
        </div>
        <!-- Mostrar las semanas agregadas -->
        @foreach ($semanas as $semana)
            <div x-data="{ open: false }" class="bg-gray-100 border border-gray-300 rounded-lg shadow-md p-4 mb-4">
                <div class="flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-gray-800">{{ $semana->titulo }}</h3>

                    <div class="flex space-x-3">
                        {{-- <button class="text-blue-600 hover:text-blue-800">
                            <i class="fas fa-edit"></i>
                        </button> --}}
                        @can('crearsemana')
                            <button class="text-red-600 hover:text-red-800"
                                onclick="confirm('¿Estás seguro de que deseas eliminar esta semana y su contenido?') ? @this.eliminarSemana({{ $semana->id }}) : null;">
                                <i class="fas fa-trash"></i>
                            </button>


                            <!-- Botón para agregar contenido -->
                            <div x-data="{ contentOpen: false }">
                                <button @click="contentOpen = true; $wire.set('semana_id', {{ $semana->id }})"
                                    class="text-green-600 hover:text-green-800">
                                    <i class="fas fa-plus-circle"></i>
                                </button>


                                <!-- Agregar Contenido Modal -->
                                <div x-show="contentOpen" x-cloak
                                    class="fixed inset-0 flex items-start justify-center z-50 bg-black bg-opacity-50"
                                    style="display: none;">
                                    <div class="bg-white rounded-lg shadow-lg p-5 w-96 mt-20 transition-opacity duration-300 ease-in-out"
                                        @click.away="contentOpen = false" @keydown.escape.window="contentOpen = false">

                                        <h3 class="text-lg font-semibold mb-4">Agregar Contenido</h3>

                                        <!-- Formulario que envía el contenido -->
                                        <form wire:submit.prevent="guardarContenido" enctype="multipart/form-data">
                                            <!-- Campo para el título del contenido -->
                                            <input type="text" wire:model="titulo"
                                                class="border border-gray-300 p-2 rounded w-full"
                                                placeholder="Título del contenido" required>

                                            <!-- Campo para la subida de archivo -->
                                            <input type="file" wire:model="archivo"
                                                class="border border-gray-300 p-2 rounded w-full mt-4" required>

                                            <!-- Campo oculto para la semana_id -->
                                            <input type="hidden" wire:model="semana_id">

                                            <div class="mt-4 flex justify-end">
                                                <button type="button" @click="contentOpen = false"
                                                    class="bg-gray-300 text-gray-700 px-4 py-2 rounded mr-2">Cancelar</button>
                                                <!-- Botón para guardar contenido y cerrar el modal -->
                                                <button
                                                    @click="contentOpen = false; guardandoContenido = true; setTimeout(() => guardandoContenido = false, 3000);"
                                                    wire:click="guardarContenido"
                                                    class="bg-blue-600 text-white px-4 py-2 rounded">
                                                    Guardar Contenido
                                                </button>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endcan
                    </div>
                </div>

                <!-- Botón para mostrar/ocultar los recursos de la semana -->
                <button @click="open = !open"
                    class="w-full bg-gray-300 text-left p-2 mt-2 rounded-lg flex justify-between items-center">
                    <h3 class="text-md font-semibold">Recursos de la semana</h3>
                    <span>
                        <i :class="open ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"></i>
                    </span>
                </button>

                <!-- Sección colapsable con los recursos de la semana -->
                <div x-show="open" x-cloak x-transition.duration.200ms class="mt-2 bg-white p-4 rounded-lg shadow-md">
                    @if ($semana->contenidosSemana->isEmpty())
                        <p class="text-gray-600">No hay recursos añadidos todavía.</p>
                    @else
                        <!-- Iterar sobre los contenidos de la semana -->
                        <ul class="list-disc list-inside">
                            @foreach ($semana->contenidosSemana as $contenido)
                                <div class="bg-white border border-gray-300 rounded-lg shadow-md p-2 mb-3 w-full">
                                    <!-- Título del contenido -->
                                    <h3 class="text-gray-700 font-semibold text-base mb-2">
                                        {{ $contenido->titulo ?? 'Sin título disponible' }}
                                    </h3>

                                    <!-- Botones de editar y eliminar en la parte superior derecha -->
                                    <div class="flex justify-between items-center mb-2">
                                        <!-- Enlace de descarga del archivo -->
                                        <a href="#" wire:click.prevent="descargar({{ $contenido->id }})"
                                            class="text-blue-600 hover:underline text-sm font-semibold">
                                            {{ $contenido->path }}
                                        </a>
                                        @can('crearsemana')
                                            <div class="flex space-x-2">
                                                {{-- <button class="text-blue-600 hover:text-blue-800"
                                                wire:click="editarContenido({{ $contenido->id }})">
                                                <i class="fas fa-edit"></i>
                                            </button> --}}
                                                {{-- <button class="text-red-600 hover:text-red-800"
                                                wire:click="eliminarContenido({{ $contenido->id }})">
                                                <i class="fas fa-trash"></i>
                                            </button> --}}
                                                <button class="text-red-600 hover:text-red-800"
                                                    onclick="confirm('¿Estás seguro de que deseas eliminar este archivo?') ? @this.eliminarContenido({{ $contenido->id }}) : null;">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        @endcan
                                    </div>

                                </div>
                            @endforeach
                        </ul>
                    @endif

                </div>

            </div>
        @endforeach


    </div>



</div>
