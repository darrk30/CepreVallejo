<?php

namespace App\Livewire\Administrador;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class Books extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        // Filtrar cursos según el término de búsqueda y paginar los resultados
        $books = Book::where('titulo', 'like', '%' . $this->search . '%')
               ->orderBy('id', 'desc') // Ordenar por el campo 'id' de forma descendente
               ->paginate(10); // Mostrar 10 registros por página
               
        return view('livewire.administrador.books', compact('books'));
    }
}
