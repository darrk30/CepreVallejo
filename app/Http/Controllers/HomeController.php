<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $cursos = Curso::orderBy('id', 'desc')->take(10)->get();
        return view('welcome', compact('cursos'));
    }
}
