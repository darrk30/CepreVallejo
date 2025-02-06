<?php

namespace App\Livewire\Administrador;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Docentes extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $docentes = User::where('name', 'like', '%' . $this->search . '%')
        ->orderBy('id', 'desc') // Ordenar por el campo 'id' de forma descendente
        ->paginate(10);
        return view('livewire.administrador.docentes', compact('docentes'));
    }
}
