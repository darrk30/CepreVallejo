<?php

namespace App\Livewire\Administrador;

use App\Models\Category;
use App\Models\CiclosAcademico;
use App\Models\CiclosCurso;
use App\Models\ContenidoCurso;
use App\Models\Curso;
use App\Models\User;
use App\Models\UserCurso;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class CreateCurso extends Component
{
    use WithFileUploads;

    public $horario;
    public $duracion;
    public $nombreCurso;
    public $descripcionCurso;
    public $slug;
    public $estadoCurso;
    public $categoriaCurso;
    public $tituloContenido;
    public $descripcionContenido;
    public $contenidos = [];
    public $imagenCurso;
    public $pestañaActiva = 'detalles';
    public $codigo;


    public $curosId;


    public $cicloAcademico;
    public $dniDocente; // Asegúrate de que esta propiedad esté definida en tu componente
    public $docenteEncontrado; // Esta propiedad almacenará el docente encontrado
    public $docenteId; // Nueva propiedad para almacenar el ID del docente


    public function buscarDocente()
    {
        // Validar que se haya ingresado un DNI
        $this->validate([
            'dniDocente' => 'required|string|max:8', // Ajusta la validación según tu necesidad
        ]);

        // Buscar el docente por su DNI dentro de la relación profile
        $this->docenteEncontrado = User::whereHas('profile', function ($query) {
            $query->where('numero', $this->dniDocente);
        })->first();

        // Manejar los resultados
        if (!$this->docenteEncontrado) {
            session()->flash('error_message', 'Docente no encontrado con ese DNI.');
            $this->docenteId = null; // Resetear ID si no se encuentra
        } else {
            $this->docenteId = $this->docenteEncontrado->id; // Guardar el ID del docente encontrado
            //dd($this->docenteId);
            session()->flash('success_message', 'Docente encontrado: ' . $this->docenteEncontrado->name);
        }
    }

    public function agregarCiclo()
    {
        //dd($this->docenteId);
        // Validar que el docente y el ciclo académico estén establecidos
        $this->validate([
            'cicloAcademico' => 'required|exists:ciclos_academicos,id', // Asume que 'ciclos' es la tabla de ciclos académicos
            //'docenteId' => 'required|exists:users,id', // Asegúrate de que el ID del docente esté presente
        ]);

        // Agregar el ciclo académico a la tabla ciclos_cursos
        CiclosCurso::create([
            'curso_id' => $this->curosId,
            'ciclo_academico_id' => $this->cicloAcademico,
            'user_id' => $this->docenteId, // Asegúrate de que esto tenga un valor válido
        ]);
        

        // // Agregar a la tabla user_curso
        // UserCurso::create([
        //     'user_id' => $this->docenteId, // ID del docente encontrado
        //     'ciclo_curso_id' => $cicloCurso->id, // ID del ciclo curso recién creado
        // ]);

        // Mensaje de éxito
        session()->flash('success_message', 'Ciclo académico agregado exitosamente.');

        // Resetear los campos si es necesario
        $this->cicloAcademico = null; // Restablecer la selección del ciclo académico
        $this->dniDocente = ''; // Limpiar el DNI del docente
        $this->docenteEncontrado = null; // Limpiar el docente encontrado
        $this->docenteId = null; // Limpiar el ID del docente

        // Puedes agregar más lógica si es necesario
    }



    public function mount()
    {
        $this->estadoCurso = 1;
        // Obtener el último curso
        $ultimoCurso = Curso::latest('id')->first();

        // Si hay un curso, aumentar el código; si no, comenzar desde CUR_001
        if ($ultimoCurso && $ultimoCurso->codigo) {
            // Extraer el número del código CUR_001 -> 001
            $numeroActual = (int) str_replace('CUR_', '', $ultimoCurso->codigo);
            $nuevoNumero = str_pad($numeroActual + 1, 3, '0', STR_PAD_LEFT);
            $this->codigo = 'CUR_' . $nuevoNumero;
        } else {
            // No hay cursos, comenzamos en CUR_001
            $this->codigo = 'CUR_001';
        }
    }

    public function render()
    {
        $categorias = Category::all();
        $ciclosAcademicos = CiclosAcademico::all();
        return view('livewire.administrador.create-curso', compact('categorias', 'ciclosAcademicos'));
    }

    public function agregarContenido()
    {

        $this->contenidos[] = [
            'titulo' => $this->tituloContenido,
            'descripcion' => $this->descripcionContenido,
        ];

        $this->tituloContenido = '';
        $this->descripcionContenido = '';
        $this->pestañaActiva = 'contenido';
    }

    public function eliminarContenido($index)
    {
        unset($this->contenidos[$index]);
        $this->contenidos = array_values($this->contenidos);
        $this->pestañaActiva = 'contenido';
    }


    public function guardarCurso()
    {
        // Validar los datos
        $this->validate([
            'nombreCurso' => 'required|string|max:255',
            'descripcionCurso' => 'required|string',
            'slug' => 'required|unique:cursos',
            'estadoCurso' => 'required|in:0,1', // Verifica que el estado sea 0 o 1
            'categoriaCurso' => 'required|exists:categories,id',
            'imagenCurso' => 'nullable|image|max:5048',
        ]);

        // Debugging
        session()->flash('validation_message', 'Validación completada con éxito.');

        // Guardar el curso
        $curso = Curso::create([
            'codigo' => $this->codigo,
            'nombre' => $this->nombreCurso,
            'descripcion' => $this->descripcionCurso,
            'slug' => $this->slug,
            'horario' => $this->horario,
            'duracion' => $this->duracion,
            'status' => $this->estadoCurso,
            'category_id' => $this->categoriaCurso,
        ]);

        $this->curosId = $curso->id;

        // Si hay una imagen, guardarla en S3 y en la tabla polimórfica
        if ($this->imagenCurso) {
            $url = Storage::disk('s3')->put('imagenesCursos', $this->imagenCurso);
            $curso->image()->create([
                'url' => $url,
            ]);
        }

        // Guardar el contenido relacionado
        foreach ($this->contenidos as $contenido) {
            ContenidoCurso::create([
                'curso_id' => $curso->id,
                'titulo' => $contenido['titulo'],
                'descripcion' => $contenido['descripcion'],
            ]);
        }
        $this->agregarCiclo();

        $this->curosId = '';
        // Redirigir a la vista de actualización del curso
        return redirect()->route('admin.cursos.update', ['cursoId' => $curso->id]); // Asegúrate de que la ruta esté definida
    }
}
