<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CiclosCurso;
use App\Models\ContenidoSemana;
use App\Models\Curso;
use App\Models\Matricula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MisCursosController extends Controller
{
   
    public function index()
    {
        return view('dashboard.misCursos');
    }

    public function show(Curso $curso, $ciclo_curso_id)
    {
        return view('dashboard.showCurso', compact('curso', 'ciclo_curso_id'));
    }
}
