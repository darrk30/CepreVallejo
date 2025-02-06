<?php

namespace App\Livewire\Administrador;

use App\Models\Category;
use App\Models\Video;
use Livewire\Component;
use Illuminate\Support\Str;

class CreateVideos extends Component
{
    public $titulo;
    public $descripcion;
    public $iframe;
    public $slug;
    public $status = 1;
    public $category_id;

    public $categorias = [];

    protected $rules = [
        'titulo' => 'required|string|max:255',
        'descripcion' => 'nullable|string',
        'iframe' => 'required|string|url',
        'slug' => 'required|string|unique:videos,slug',
        'status' => 'required|in:0,1',
        'category_id' => 'required|exists:categories,id',
    ];

    public function mount()
    {
        $this->categorias = Category::all(); // Obtener todas las categorías
    }

    public function updatedTitulo($value)
    {
        $this->slug = Str::slug($value); // Actualiza el slug automáticamente cuando se cambia el título
    }

    public function save()
    {
        $this->validate();

        Video::create([
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
            'iframe' => $this->iframe,
            'slug' => $this->slug,
            'status' => $this->status,
            'category_id' => $this->category_id,
        ]);

        session()->flash('message', 'Video creado exitosamente.');

        return redirect()->route('admin.videos');
    }

    public function render()
    {
        return view('livewire.administrador.create-videos');
    }
}
