<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConveniosController extends Controller
{
    public function __invoke()
    {
        return view('convenios');
    }
}
