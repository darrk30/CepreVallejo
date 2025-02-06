<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MatriculasController extends Controller
{
    public function index(){
        return view('administrador.matriculas.index');
    }

    public function create(){
        return view('administrador.matriculas.create');
    }
}
