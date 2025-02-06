<div class="container mx-auto mt-8 px-4">
    @if ($errors->any())
        <div class="mb-4">
            <ul class="bg-red-500 text-white p-4 rounded-lg">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Éxito!</strong>
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @endif

    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-lg font-semibold mb-4">Crear Curso</h2>

        <div class="flex items-center mb-4">
            <input type="text" id="nombreCurso" placeholder="Nombre del Curso" class="border border-gray-300 rounded-lg p-2 flex-grow"
                wire:model="nombreCurso" required>

            <label class="ml-4">
                <span class="block text-sm text-gray-600">Imagen del Curso</span>
                <input type="file" class="mt-1 block text-sm text-gray-600" wire:model="imagenCurso"
                    accept="image/*">
            </label>
        </div>

        <div class="mb-4">
            <ul class="flex border-b">
                <li class="-mb-px mr-1">
                    <button wire:click="$set('pestañaActiva', 'detalles')"
                        class="inline-block py-2 px-4 rounded-l text-gray-700 font-semibold focus:outline-none {{ $pestañaActiva === 'detalles' ? 'bg-gray-200' : '' }}">
                        Detalles
                    </button>
                </li>
                <li class="mr-1">
                    <button wire:click="$set('pestañaActiva', 'contenido')"
                        class="inline-block py-2 px-4 rounded-r text-gray-700 hover:bg-gray-200 focus:outline-none {{ $pestañaActiva === 'contenido' ? 'bg-gray-200' : '' }}">
                        Contenido
                    </button>
                </li>
                <li class="mr-1">
                    <button wire:click="$set('pestañaActiva', 'ciclos')"
                        class="inline-block py-2 px-4 rounded-r text-gray-700 hover:bg-gray-200 focus:outline-none {{ $pestañaActiva === 'ciclos' ? 'bg-gray-200' : '' }}">
                        Ciclos
                    </button>
                </li>
            </ul>
        </div>

        <!-- Detalles -->
        <div class="{{ $pestañaActiva === 'detalles' ? '' : 'hidden' }} mb-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold mb-1">Código</label>
                    <input type="text" class="border border-gray-300 rounded-lg p-2 w-full" wire:model="codigo"
                        readonly>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Descripción</label>
                    <textarea class="border border-gray-300 rounded-lg p-2 w-full" rows="3" wire:model="descripcionCurso" required></textarea>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Slug</label>
                    <input type="text" id="slug" class="border border-gray-300 rounded-lg p-2 w-full" wire:model="slug"
                        required>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Horario</label>
                    <input type="text" id="horario" class="border border-gray-300 rounded-lg p-2 w-full" wire:model="horario"
                        required>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Duracion</label>
                    <input type="text" id="duracion" class="border border-gray-300 rounded-lg p-2 w-full" wire:model="duracion"
                        required>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Estado</label>
                    <select class="border border-gray-300 rounded-lg p-2 w-full" wire:model="estadoCurso">
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Categoría</label>
                    <select class="border border-gray-300 rounded-lg p-2 w-full" wire:model="categoriaCurso">
                        <option value="" selected>Seleccionar Categoría</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->titulo }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <!-- Contenido -->
        <div class="{{ $pestañaActiva === 'contenido' ? '' : 'hidden' }} mb-4">
            <h3 class="text-lg font-semibold mb-2">Contenido del Curso</h3>

            <div class="mb-4">
                <input type="text" placeholder="Título del Contenido" wire:model="tituloContenido"
                    class="border border-gray-300 rounded-lg p-2 w-full mb-2" required>
                <textarea placeholder="Descripción del Contenido" wire:model="descripcionContenido"
                    class="border border-gray-300 rounded-lg p-2 w-full mb-2" rows="3" required></textarea>
                <button wire:click="agregarContenido" type="button"
                    class="bg-blue-500 text-white rounded-lg px-4 py-2">Agregar Contenido</button>
            </div>

            <table class="min-w-full border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th class="border border-gray-300 p-2">Título</th>
                        <th class="border border-gray-300 p-2">Descripción</th>
                        <th class="border border-gray-300 p-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contenidos as $index => $contenido)
                        <tr>
                            <td class="border border-gray-300 p-2">{{ $contenido['titulo'] }}</td>
                            <td class="border border-gray-300 p-2">{{ $contenido['descripcion'] }}</td>
                            <td class="border border-gray-300 p-2">
                                <button wire:click="eliminarContenido({{ $index }})"
                                    class="bg-red-500 text-white rounded-lg px-4 py-2">Eliminar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Ciclos -->
        <div class="{{ $pestañaActiva === 'ciclos' ? '' : 'hidden' }} mb-4">
            <h3 class="text-lg font-semibold mb-2">Agregar Ciclo Académico</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-semibold mb-1">Ciclo Académico</label>
                    <select class="border border-gray-300 rounded-lg p-2 w-full" wire:model="cicloAcademico" required>
                        <option value="">Selecciona un ciclo académico</option>
                        @foreach ($ciclosAcademicos as $ciclo)
                            <option value="{{ $ciclo->id }}">{{ $ciclo->titulo }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">DNI del Docente</label>
                    <input type="text" class="border border-gray-300 rounded-lg p-2 w-full" wire:model="dniDocente">
                    <button wire:click="buscarDocente" type="button"
                        class="bg-blue-500 text-white rounded-lg px-4 py-2 mt-2">Buscar</button>
                </div>
            </div>

            @if ($docenteEncontrado)
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                    <strong class="font-bold">Docente Encontrado!</strong>
                    <span class="block sm:inline">{{ $docenteEncontrado->name }}</span>
                </div>
            @endif

            <div class="flex justify-end">
                <button wire:click="agregarCiclo" class="bg-green-600 text-white rounded-lg px-4 py-2">
                    Agregar Ciclo
                </button>
            </div>
        </div>


        <!-- Botón de guardar -->
        <div class="flex justify-end">
            <button wire:click="guardarCurso" class="bg-green-600 text-white rounded-lg px-4 py-2">
                Guardar
            </button>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="{{ asset('jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#nombreCurso").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug', // Esto actualizará el input con id "slug"
                space: '-' // Esto convierte los espacios en guiones
            });
        });
    </script>
</div>
