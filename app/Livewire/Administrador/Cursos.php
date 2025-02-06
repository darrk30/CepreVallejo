<?php

namespace App\Livewire\Administrador;

use App\Models\Curso;
use Livewire\Component;
use Livewire\WithPagination;

class Cursos extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        // Filtrar cursos según el término de búsqueda y paginar los resultados
        $cursos = Curso::where('nombre', 'like', '%' . $this->search . '%')
               ->orderBy('id', 'desc') // Ordenar por el campo 'id' de forma descendente
               ->paginate(10); // Mostrar 10 registros por página


        return view('livewire.administrador.cursos', compact('cursos'));
    }
}
