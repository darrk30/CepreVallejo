@if ($errors->any())
<div {{ $attributes->merge(['class' => 'bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative']) }} role="alert">
    <div class="flex items-center">
        <svg class="w-6 h-6 text-red-500 mr-2 animate-bounce" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m2 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
        <span class="font-semibold">{{ __('¡Vaya! Algo salió mal.') }}</span>
    </div>

    <ul class="mt-3 list-disc list-inside text-sm text-red-600">
        @foreach ($errors->all() as $error)
            <li class="transition duration-300 ease-in-out transform hover:scale-105">{{ $error }}</li>
        @endforeach
    </ul>
</div>

@endif
