<?php

namespace App\Livewire\Dashboard;

use App\Models\CiclosCurso;
use App\Models\Matricula;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Curso extends Component
{
    use WithPagination;

    public $search = '';
    public $category_id = null;
    public $perPage = 5;

    protected $updatesQueryString = [
        'search' => ['except' => ''],
        'category_id' => ['except' => null],
        'perPage',
    ];

    public function render()
    {
        $usuario = auth()->user();

        // Verificar si el usuario es Alumno
        if ($usuario->hasRole('Alumno')) {
            // Verificar que el alumno tenga una matrícula con status 1 (activa)
            $matricula = Matricula::where('user_id', $usuario->id)->where('status', 1)->first();

            if (!$matricula) {
                return redirect()->route('dashboard.misCursos')->with('warning', 'Debes matricularte para acceder a tus cursos.');
            }

            // Obtener ID del ciclo académico desde la matrícula del alumno
            $cicloAcademicoId = $matricula->ciclo_academico_id;

            // Obtener los ciclos y cursos para el alumno
            $ciclosCursos = $this->obtenerCiclosCursos($cicloAcademicoId);
        } elseif ($usuario->hasRole('Profesor')) {
            // Verificar si el docente tiene cursos asociados en CicloCurso
            $ciclosCursos = CiclosCurso::where('user_id', $usuario->id)->paginate($this->perPage);

            if ($ciclosCursos->isEmpty()) {
                return redirect()->route('dashboard.misCursos')->with('warning', 'No tienes cursos asociados en este ciclo académico.');
            }
        } else {
            // Si no es alumno ni docente, redirigir con error de acceso no autorizado
            return redirect()->route('Home')->with('error', 'Acceso no autorizado.');
        }

        // Obtener todas las categorías para el select (esto se aplica para ambos roles)
        $categorias = Category::all();

        return view('livewire.dashboard.curso', compact('ciclosCursos', 'categorias'));
    }


    // Función para obtener los cursos del ciclo académico, aplicando búsqueda y filtrado por categoría
    private function obtenerCiclosCursos($cicloAcademicoId)
    {
        return CiclosCurso::where('ciclo_academico_id', $cicloAcademicoId)
            ->when($this->search, function ($query) {
                $this->aplicarFiltroBusqueda($query);
            })
            ->when($this->category_id, function ($query) {
                $this->aplicarFiltroCategoria($query);
            })
            ->paginate($this->perPage);
    }

    // Función para aplicar el filtro de búsqueda
    private function aplicarFiltroBusqueda($query)
    {
        $query->whereHas('curso', function ($query) {
            $query->where('nombre', 'like', '%' . $this->search . '%');
        });
    }

    // Función para aplicar el filtro de categoría
    private function aplicarFiltroCategoria($query)
    {
        if ($this->category_id) {
            $query->whereHas('curso', function ($query) {
                $query->where('category_id', $this->category_id);
            });
        }
    }

    // Función para actualizar la paginación cuando se cambia el número de elementos por página
    public function updatedPerPage()
    {
        $this->resetPage();
    }

    // Función para actualizar la paginación cuando se cambia el término de búsqueda
    public function updatedSearch()
    {
        $this->resetPage();
    }

    // Función para actualizar la paginación cuando se cambia la categoría seleccionada
    public function updatedCategoryId()
    {
        $this->resetPage();
    }
}
