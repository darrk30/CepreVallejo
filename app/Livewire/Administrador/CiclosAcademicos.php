<?php

namespace App\Livewire\Administrador;

use App\Models\CiclosAcademico;
use Livewire\Component;
use Livewire\WithPagination;

class CiclosAcademicos extends Component
{
    use WithPagination;

    public $search = '';
    public function render()
    
    {
        $ciclosAcademicos = CiclosAcademico::where('titulo', 'like', '%' . $this->search . '%')
        ->orderBy('id', 'desc') // Ordenar por el campo 'id' de forma descendente
        ->paginate(10);
        return view('livewire.administrador.ciclos-academicos', compact('ciclosAcademicos'));
    }
}
