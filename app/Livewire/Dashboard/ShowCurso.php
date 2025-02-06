<?php

namespace App\Livewire\Dashboard;

use App\Models\SemanasCiclo;
use App\Models\ContenidoSemana;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ShowCurso extends Component
{
    use WithFileUploads;

    public $curso;
    public $ciclos_curso_id;
    public $titulo;
    public $archivo;
    public $semana_id;
    public $url;
    public function mount($curso, $ciclos_curso_id)
    {
        $this->curso = $curso;
        $this->ciclos_curso_id = $ciclos_curso_id;
    }

    public function guardarSemana()
    {
        $this->validate([
            'titulo' => 'required|string|max:255',
        ]);

        SemanasCiclo::create([
            'titulo' => $this->titulo,
            'ciclos_curso_id' => $this->ciclos_curso_id,
        ]);

        $this->titulo = '';
        session()->flash('message', 'Semana agregada con éxito.');
    }

    protected $rules = [
        'titulo' => 'required|string|max:255',
        'archivo' => 'required|file|max:10240', // Limite de tamaño de archivo: 10MB        
    ];

    public $contentOpen = false;


    public function guardarContenido()
    {
        // Validar los campos
        $this->validate();

        // Obtener el nombre original del archivo
        $nombreArchivoOriginal = $this->archivo->getClientOriginalName();

        // Guardar el archivo en el bucket de S3
        //$rutaArchivo = $this->archivo->storeAs('archivos', $nombreArchivoOriginal, 's3'); // 's3' es el disco de AWS
        $archivoPath = Storage::disk('s3')->put('archivos', $this->archivo);
        // Generar la URL pública del archivo en S3
        //$urlArchivo = Storage::disk('s3')->url($rutaArchivo);

        // Guardar los datos en la base de datos
        ContenidoSemana::create([
            'titulo' => $this->titulo,
            'path' => $nombreArchivoOriginal, // Guardar el nombre original en la base de datos
            'url' => $archivoPath, // Guardar la URL pública en la base de datos
            'semanas_ciclo_id' => $this->semana_id, // Aquí se establece el ID de la semana
        ]);

        // Resetear los campos del formulario
        $this->reset(['titulo', 'archivo', 'semana_id']);

        // Cerrar el modal
        $this->contentOpen = false;

        // Enviar un mensaje de éxito
        session()->flash('message', 'Contenido guardado con éxito.');
    }

    public function descargar($contenidoId)
    {
        // Buscar el contenido por ID
        $contenido = ContenidoSemana::findOrFail($contenidoId);
        // Obtener la ruta del archivo en S3
        //$rutaArchivo = $contenido->url; // Ya tienes la URL en la base de datos
        $urlArchivo = Storage::disk('s3')->url($contenido->url);
        $nombreArchivo = $contenido->path;
        // Verificar si el archivo existe en S3
        return response()->streamDownload(function () use ($urlArchivo) {
            $file = fopen($urlArchivo, 'r');
            fpassthru($file);
            fclose($file);
        }, $nombreArchivo, [
            'Content-Type' => 'application/octet-stream',
        ]);

        // Si no se encuentra el archivo, redirigir con un mensaje de error
        session()->flash('error', 'El archivo no existe en S3.');
    }



    public function eliminarSemana($semanaId)
    {
        // Encuentra la semana por ID
        $semana = SemanasCiclo::findOrFail($semanaId);

        // Elimina el contenido asociado
        foreach ($semana->contenidosSemana as $contenido) {
            // Verifica si el archivo existe y lo elimina
            if ($contenido->url) {
                $archivoPath = $contenido->url; // Ajusta la ruta según tu almacenamiento
                Storage::disk('s3')->delete($archivoPath);
            }
            $contenido->delete();
        }

        $semana->delete();

        // Mensaje de éxito
        session()->flash('message', 'La semana y su contenido han sido eliminados correctamente.');
    }



    public function eliminarContenido($contenidoId)
    {
        // Encuentra la semana por ID
        $contenido = ContenidoSemana::findOrFail($contenidoId);

        // Elimina el contenido asociado
        //foreach ($semana->contenidosSemana as $contenido) {
            // Verifica si el archivo existe y lo elimina
            if ($contenido->url) {
                $archivoPath = $contenido->url; // Ajusta la ruta según tu almacenamiento
                Storage::disk('s3')->delete($archivoPath);
            }
            $contenido->delete();
        //}

        //$semana->delete();

        // Mensaje de éxito
        session()->flash('message', 'El archivo ha sido eliminado correctamente.');
    }





    public function render()
    {
        // Obtiene las semanas asociadas al curso
        $semanas = SemanasCiclo::where('ciclos_curso_id', $this->ciclos_curso_id)
            ->get();
        return view('livewire.dashboard.show-curso', compact('semanas'));
    }
}
