<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use App\Models\CiclosAcademico;
use Illuminate\Http\Request;

class CiclosController extends Controller
{
    public function index(){
        //$ciclosAcademicos = CiclosAcademico::all();
        return view('administrador.ciclos.index');
    }

    public function create(){
        return view('administrador.ciclos.create');
    }
}
