<?php

namespace App\Livewire\Dashboard;

use App\Models\Category;
use App\Models\Video;
use Livewire\Component;
use Livewire\WithPagination;

class Videos extends Component
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
        // Consulta para filtrar los libros según los parámetros de búsqueda, categoría y paginación
        $videos = Video::query()
            ->when($this->search, function ($query) {
                $query->where('titulo', 'like', '%' . $this->search . '%');
            })
            ->when($this->category_id, function ($query) {
                $query->where('category_id', $this->category_id);
            })
            ->paginate($this->perPage);

        $categorias = Category::all();
        return view('livewire.dashboard.videos', compact('videos', 'categorias'));
    }
}
