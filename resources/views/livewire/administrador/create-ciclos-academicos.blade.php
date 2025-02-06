<div class="mt-4 p-4 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-2 rounded-lg mb-4">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="submit" class="space-y-4">
        <!-- Nombre del Ciclo -->
        <div>
            <label for="nombreCiclo" class="block text-sm font-medium text-gray-700">Nombre del Ciclo</label>
            <input type="text" id="nombreCiclo" wire:model="nombreCiclo" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('nombreCiclo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Fecha Inicio -->
        <div>
            <label for="fechaInicio" class="block text-sm font-medium text-gray-700">Fecha de Inicio</label>
            <input type="date" id="fechaInicio" wire:model="fechaInicio" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('fechaInicio') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Fecha Fin -->
        <div>
            <label for="fechaFin" class="block text-sm font-medium text-gray-700">Fecha de Fin</label>
            <input type="date" id="fechaFin" wire:model="fechaFin" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('fechaFin') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Slug -->
        <div>
            <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
            <input type="text" id="slug" wire:model="slug" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('slug') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Estado -->
        <div>
            <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
            <select id="estado" wire:model="estado" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="1">En Curso</option>
                <option value="0">Finalizado</option>
            </select>
            @error('estado') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Botón de Enviar -->
        <div>
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Guardar Ciclo
            </button>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="{{ asset('jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#nombreCiclo").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug', // Esto actualizará el input con id "slug"
                space: '-' // Esto convierte los espacios en guiones
            });
        });
    </script>
</div>
