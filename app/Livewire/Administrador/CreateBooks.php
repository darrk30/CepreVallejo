<?php

namespace App\Livewire\Administrador;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads; // Importa esto

class CreateBooks extends Component
{
    use WithFileUploads; // Añade esto

    // Propiedades para el formulario
    public $titulo;
    public $autor;
    public $descripcion;
    public $url;
    public $slug;
    public $category_id;
    public $status = 1; // Valor predeterminado para "Activo"
    public $image; // Nueva propiedad para la imagen

    // Reglas de validación
    protected $rules = [
        'titulo' => 'required|string|max:255',
        'autor' => 'required|string|max:255',
        'descripcion' => 'nullable|string',
        'url' => 'nullable|url',
        'slug' => 'required|string|max:255|unique:books,slug',
        'category_id' => 'required|exists:categories,id',
        'status' => 'required|boolean',
        'image' => 'nullable|image|max:4024', // Asegúrate de ajustar el tamaño máximo según lo necesario
    ];

    
    public function render()
    {
        $categorias = Category::all(); // Obtener todas las categorías
        return view('livewire.administrador.create-books', compact('categorias'));
    }

    public function submit()
    {
        // Validar los datos
        $this->validate();

        // Desglocar la URL para obtener el ID del archivo
        $fileId = $this->extractGoogleDriveId($this->url);        


        // Crear el libro
        $book = Book::create([
            'titulo' => $this->titulo,
            'autor' => $this->autor,
            'descripcion' => $this->descripcion,
            'url' => $fileId, // Guardar solo el ID del archivo
            'slug' => Str::slug($this->slug), // Convertir el slug a un formato adecuado
            'category_id' => $this->category_id,
            'status' => $this->status,            
        ]);


        if ($this->image) {
            $url = Storage::disk('s3')->put('imagesBooks', $this->image);
            $book->image()->create([
                'url' => $url,
            ]);
        }

        // Limpiar los campos
        $this->reset();

        // Mensaje de éxito
        session()->flash('message', 'Libro agregado exitosamente.');
    }

    // Función para extraer el ID de Google Drive de la URL
    protected function extractGoogleDriveId($url)
    {
        // Verificar si la URL contiene el patrón esperado
        if (preg_match('/\/d\/([a-zA-Z0-9_-]+)\//', $url, $matches)) {
            return $matches[1]; // Devolver el ID del archivo
        }

        // Si la URL no coincide, devolver null o manejarlo como prefieras
        return null;
    }
}
