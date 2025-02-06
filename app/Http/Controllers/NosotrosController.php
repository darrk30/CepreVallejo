<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class NosotrosController extends Controller
{
    public function __invoke()
    {
        // Obtener los usuarios con el rol de 'Profesor'
        $profesores = User::whereHas('roles', function ($query) {
            $query->where('name', 'Profesor');
        })->whereHas('profile', function ($query) {
            $query->where('status', 1);
        })->with('profile')->get();

        // Retornar la vista y pasar los usuarios 'profesores' a la vista
        return view('conocenos', compact('profesores'));
    }
}
