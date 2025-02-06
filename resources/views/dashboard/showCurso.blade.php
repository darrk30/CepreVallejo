<x-app-layout>
    <!-- Contenedor del curso -->    
    @livewire('dashboard.show-curso', ['curso' => $curso, 'ciclos_curso_id' => $ciclo_curso_id])
</x-app-layout>
