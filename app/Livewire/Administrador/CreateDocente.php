<?php

namespace App\Livewire\Administrador;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateDocente extends Component
{
    use WithFileUploads;
    public $name;
    public $apellidos;
    public $descripcion;
    public $numero;
    public $email;
    public $password;
    public $status;
    public $image;

    protected $rules = [
        'name' => 'required|string|max:255',
        'apellidos' => 'required|string|max:255',
        'descripcion' => 'nullable|string|max:255',
        'numero' => 'nullable|digits:8', // DNI opcional
        'email' => 'required|email|max:255|unique:users,email',
        'password' => 'required|string|min:6',
        'status' => 'nullable|string|max:255',
        'image' => 'nullable|image|max:4024'
    ];

    public function saveDocente()
    {
        // Validar los datos del formulario
        $this->validate();

        // Registrar al usuario en la tabla 'users'
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        if ($this->image) {
            $url = Storage::disk('s3')->put('FotosDocentes', $this->image);
            $user->image()->create([
                'url' => $url,
            ]);
        }

        // Asignar rol de 'Profesor' al usuario
        $role = Role::where('name', 'Profesor')->firstOrCreate(['name' => 'Profesor']);
        $user->assignRole($role);

        // Registrar el perfil en la tabla 'profile'
        Profile::create([
            'user_id' => $user->id, // Relacionar con el usuario
            'apellido' => $this->apellidos,
            'descripcion' => $this->descripcion,
            'numero' => $this->numero,
            'status' => $this->status,
        ]);

        // Limpiar el formulario
        $this->reset();

        // Mensaje de éxito
        session()->flash('message', 'Docente registrado con éxito.');
    }

    public function render()
    {
        return view('livewire.administrador.create-docente');
    }
}
