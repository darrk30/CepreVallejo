<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use Illuminate\Http\Request;

class CursosController extends Controller
{   
    public function index(){
        $cursos = Curso::all();
        return view('administrador.cursos.index', compact('cursos'));
    }

    public function create(){
        return view('administrador.cursos.create');
    }

    public function update($cursoId){
        return view('administrador.cursos.update', compact('cursoId'));
    }
}
