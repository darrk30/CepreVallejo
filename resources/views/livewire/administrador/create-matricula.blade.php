<div class="max-w-lg mx-auto p-5">
    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-2 rounded">
            {{ session('message') }}
        </div>
    @endif

    <h2 class="text-xl font-bold mb-4">Registro de Usuario</h2>
    
    <form wire:submit.prevent="registrar">
        <div class="mb-4">
            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
            <input type="text" id="nombre" wire:model="nombre" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            @error('nombre') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="apellidos" class="block text-sm font-medium text-gray-700">Apellidos</label>
            <input type="text" id="apellidos" wire:model="apellidos" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            @error('apellidos') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="dni" class="block text-sm font-medium text-gray-700">DNI</label>
            <input type="text" id="dni" wire:model="dni" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            @error('dni') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" wire:model="email" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
            <input type="password" id="password" wire:model="password" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <h2 class="text-xl font-bold mb-4">Registro de Matrícula</h2>

        <div class="mb-4">
            <label for="codigo" class="block text-sm font-medium text-gray-700">Código de Matrícula</label>
            <input type="text" id="codigo" wire:model="codigo" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            @error('codigo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="fechaMatricula" class="block text-sm font-medium text-gray-700">Fecha de Matrícula</label>
            <input type="date" id="fechaMatricula" wire:model="fechaMatricula" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            @error('fechaMatricula') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-700">Estado</label>
            <input type="text" id="status" wire:model="status" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            @error('status') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="cicloAcademicoId" class="block text-sm font-medium text-gray-700">Ciclo Académico</label>
            <select id="cicloAcademicoId" wire:model="cicloAcademicoId" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                <option value="">Seleccione un ciclo académico</option>
                @foreach ($ciclosAcademicos as $ciclo)
                    <option value="{{ $ciclo->id }}">{{ $ciclo->titulo }}</option>
                @endforeach
            </select>
            @error('cicloAcademicoId') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Registrar Matrícula</button>
    </form>
</div>
