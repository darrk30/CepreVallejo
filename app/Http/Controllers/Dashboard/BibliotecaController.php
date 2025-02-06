<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BibliotecaController extends Controller
{
    public function index(){
        
        return view('dashboard.biblioteca');
    }

    public function show(Book $book){
        
        return view('dashboard.showLibro', compact('book'));
    }
}
