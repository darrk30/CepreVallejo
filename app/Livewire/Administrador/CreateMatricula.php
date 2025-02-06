<?php

namespace App\Livewire\Administrador;

use App\Models\CiclosAcademico;
use App\Models\Matricula;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CreateMatricula extends Component
{

    public $nombre, $apellidos, $dni, $email, $password;
    public $codigo, $fechaMatricula, $status, $cicloAcademicoId;

    protected $rules = [
        // Validaciones para el usuario
        'nombre' => 'required|string|max:255',
        'apellidos' => 'required|string|max:255',
        'dni' => 'required|string|max:10', // Ajusta según la longitud permitida
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8',

        // Validaciones para la matrícula
        'codigo' => 'required|string|max:255',
        'fechaMatricula' => 'required|date',
        'status' => 'required|string|max:255',
        'cicloAcademicoId' => 'required|exists:ciclos_academicos,id',
    ];

   
    public function registrar()
    {
        // Validar los datos
        $this->validate();

        // Registrar el usuario
        $user = User::create([
            'name' => $this->nombre,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        // Asignar el rol de "Alumno" al usuario
        $user->assignRole('Alumno'); // Asegúrate de que el rol 'Alumno' exista en tu base de datos

        // Guardar el perfil
        Profile::create([
            'user_id' => $user->id,
            'apellido' => $this->apellidos,
            'numero' => $this->dni,
            'status' => $this->status,
        ]);

        // Guardar la matrícula
        Matricula::create([
            'codigo' => $this->codigo,
            'fecha' => $this->fechaMatricula,
            'status' => $this->status,
            'ciclo_academico_id' => $this->cicloAcademicoId,
            'user_id' => $user->id,
        ]);

        // Limpiar el formulario
        $this->reset();

        // Mensaje de éxito
        session()->flash('message', 'Matrícula registrada con éxito.');
    }


    public function render()
    {
        $ciclosAcademicos = CiclosAcademico::all();
        return view('livewire.administrador.create-matricula', compact('ciclosAcademicos'));
    }
}
