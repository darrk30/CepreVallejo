<div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg">
    <h1 class="text-2xl font-semibold mb-4">Crear Nuevo Video</h1>

    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save">
        <!-- Campo de Título -->
        <div class="mb-4">
            <label for="titulo" class="block text-sm font-medium text-gray-700">Título</label>
            <input type="text" wire:model="titulo" id="titulo"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
            @error('titulo')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Campo de Descripción (Opcional) -->
        <div class="mb-4">
            <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción (Opcional)</label>
            <textarea wire:model="descripcion" id="descripcion" rows="3"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"></textarea>
            @error('descripcion')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Campo de Iframe (Link de YouTube) -->
        <div class="mb-4">
            <label for="iframe" class="block text-sm font-medium text-gray-700">Link de YouTube (Iframe)</label>
            <input type="text" wire:model="iframe" id="iframe"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
            @error('iframe')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Campo de Slug (Generado automáticamente a partir del Título) -->
        <div class="mb-4">
            <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
            <input type="text" wire:model="slug" id="slug"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
            @error('slug')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Campo de Status (1: Activo, 0: Inactivo) -->
        <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-700">Estado</label>
            <select wire:model="status" id="status"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
            </select>
            @error('status')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Campo de Categoría (Select) -->
        <div class="mb-4">
            <label for="category_id" class="block text-sm font-medium text-gray-700">Categoría</label>
            <select wire:model="category_id" id="category_id"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                <option value="">Seleccione una categoría</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->titulo }}</option>
                @endforeach
            </select>
            @error('category_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Botón de Enviar -->
        <div class="flex justify-end">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700 transition">
                Guardar Video
            </button>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="{{ asset('jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#titulo").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug', // Esto actualizará el input con id "slug"
                space: '-' // Esto convierte los espacios en guiones
            });
        });
    </script>
</div>
