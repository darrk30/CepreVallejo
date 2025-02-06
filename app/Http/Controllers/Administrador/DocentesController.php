<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocentesController extends Controller
{
    public function index(){
        return view('administrador.docentes.index');
    }

    public function create(){
        return view('administrador.docentes.create');
    }
}
