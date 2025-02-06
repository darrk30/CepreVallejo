<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Curso;
use Livewire\Component;
use Livewire\WithPagination;

class CatalogoCursos extends Component
{
    use WithPagination;

    public $search = '';
    public $selectedCategories = [];

    public function render()
    {
        // Filtrar cursos según la búsqueda y las categorías seleccionadas
        $cursos = Curso::query()
            ->when($this->search, function ($query) {
                $query->where('nombre', 'like', '%' . $this->search . '%');
            })
            ->when($this->selectedCategories, function ($query) {
                $query->whereIn('category_id', $this->selectedCategories);
            })
            ->orderBy('created_at', 'desc') // Ordenar del último al primero
            ->paginate(5);


        // Cargar categorías
        $categorias = Category::all();

        return view('livewire.catalogo-cursos', [
            'cursos' => $cursos,
            'categorias' => $categorias,
        ]);
    }

    public function applyFilters()
    {
        $this->resetPage(); // Reiniciar la paginación al aplicar filtros
    }
}
