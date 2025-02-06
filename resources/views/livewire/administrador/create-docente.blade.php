<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h2 class="text-2xl font-semibold text-gray-700 mb-4">Registro de Docente</h2>

    <form wire:submit.prevent="saveDocente">
        @csrf

        <!-- Nombre -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
            <input type="text" id="name" wire:model="name"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            @error('name')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Apellidos -->
        <div class="mb-4">
            <label for="apellidos" class="block text-sm font-medium text-gray-700">Apellidos</label>
            <input type="text" id="apellidos" wire:model="apellidos"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            @error('apellidos')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="descripcion" class="block text-sm font-medium text-gray-700">Apellidos</label>
            <input type="text" id="descripcion" wire:model="descripcion"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            @error('descripcion')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- DNI (Número) -->
        <div class="mb-4">
            <label for="numero" class="block text-sm font-medium text-gray-700">DNI (Número)</label>
            <input type="text" id="numero" wire:model="numero"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            @error('numero')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Correo Electrónico -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
            <input type="email" id="email" wire:model="email"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            @error('email')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Contraseña -->
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
            <input type="password" id="password" wire:model="password"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            @error('password')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Estado -->
        <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-700">Estado</label>
            <input type="text" id="status" wire:model="status"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            @error('status')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Imagen</label>
            <input type="file"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                wire:model="image">
            @error('image')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <!-- Botón de guardar -->
        <div class="mb-4">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Registrar Docente</button>
        </div>
    </form>

    @if (session()->has('message'))
        <div class="mt-4 text-green-500">
            {{ session('message') }}
        </div>
    @endif
</div>
