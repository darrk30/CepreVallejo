<?php

namespace App\Livewire\Dashboard;

use App\Models\Book;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Books extends Component
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

    // Reset page when search or filters change
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingCategoryId()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function render()
    {
        // Consulta para filtrar los libros según los parámetros de búsqueda, categoría y paginación
        $books = Book::query()
            ->when($this->search, function ($query) {
                $query->where('titulo', 'like', '%' . $this->search . '%')
                      ->orWhere('autor', 'like', '%' . $this->search . '%');
            })
            ->when($this->category_id, function ($query) {
                $query->where('category_id', $this->category_id);
            })
            ->paginate($this->perPage);

        $categorias = Category::all();

        return view('livewire.dashboard.books', compact('books', 'categorias'));
    }
}
