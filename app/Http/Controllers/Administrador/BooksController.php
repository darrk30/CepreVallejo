<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index(){
        return view('administrador.books.index');
    }

    public function create(){
        return view('administrador.books.create');
    }
}
