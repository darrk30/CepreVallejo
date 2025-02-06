<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CiclosController extends Controller
{
    public function __invoke()
    {
        return view('ciclos');
    }
}
