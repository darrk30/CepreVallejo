<?php

namespace App\Livewire\Administrador;

use App\Models\CiclosAcademico;
use Livewire\Component;
use Illuminate\Support\Str;

class CreateCiclosAcademicos extends Component
{

    public $nombreCiclo;
    public $fechaInicio;
    public $fechaFin;
    public $slug;
    public $estado = 1; // Valor por defecto: 1 (EN CURSO)

    protected $rules = [
        'nombreCiclo' => 'required|string|max:255',
        'fechaInicio' => 'required|date',
        'fechaFin' => 'required|date|after_or_equal:fechaInicio',
        //'slug' => 'required|unique:ciclos,slug',
        'estado' => 'required|in:0,1', // 0 = Finalizado, 1 = En curso
    ];

    public function updatedNombreCiclo()
    {
        // Generar slug automáticamente al actualizar el nombre del ciclo
        $this->slug = Str::slug($this->nombreCiclo);
    }

    public function submit()
    {
        // Validar datos
        $this->validate();

        // Guardar el nuevo ciclo
        CiclosAcademico::create([
            'titulo' => $this->nombreCiclo,
            'fecha_inicio' => $this->fechaInicio,
            'fecha_fin' => $this->fechaFin,
            'slug' => $this->slug,
            'status' => $this->estado,
        ]);

        // Redirigir con mensaje de éxito
        session()->flash('message', 'Ciclo creado exitosamente.');
        return redirect()->route('admin.ciclos'); // Cambiar al nombre de la ruta que liste los ciclos
    }

    public function render()
    {
        return view('livewire.administrador.create-ciclos-academicos');
    }
}
