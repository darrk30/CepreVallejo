<?php

namespace App\Livewire\Administrador;

use App\Models\Video;
use Livewire\Component;
use Livewire\WithPagination;

class Videos extends Component
{
    use WithPagination;

    public $search = '';
    
    public function render()
    {
         // Filtrar cursos según el término de búsqueda y paginar los resultados
         $videos = Video::where('titulo', 'like', '%' . $this->search . '%')
         ->orderBy('id', 'desc') // Ordenar por el campo 'id' de forma descendente
         ->paginate(10); // Mostrar 10 registros por página

        return view('livewire.administrador.videos', compact('videos'));
    }
}
