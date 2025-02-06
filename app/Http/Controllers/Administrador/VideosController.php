<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VideosController extends Controller
{
    public function index(){
        return view('administrador.videos.index');
    }

    public function create(){
        return view('administrador.videos.create');
    }
}
