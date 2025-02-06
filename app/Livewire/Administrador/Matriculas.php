<?php

namespace App\Livewire\Administrador;

use App\Models\Matricula;
use App\Models\Profile;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;


class Matriculas extends Component
{

    use WithPagination;

    public $search = '';


    

    
    public function render()
    {
        $matriculas = Matricula::where('codigo', 'like', '%' . $this->search . '%')
                    ->orderBy('id', 'desc') // Ordenar por el campo 'id' de forma descendente
                    ->paginate(10);
        return view('livewire.administrador.matriculas', compact('matriculas'));
    }

}
