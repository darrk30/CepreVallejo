<?php

use App\Http\Controllers\CiclosController;
use App\Http\Controllers\ContactanosController;
use App\Http\Controllers\ConveniosController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NosotrosController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', HomeController::class)->name('Home');
Route::get('conocenos', NosotrosController::class)->name('conocenos');
Route::get('contactanos', ContactanosController::class)->name('contactanos');
Route::get('convenios', ConveniosController::class)->name('convenios');
Route::get('ciclos', CiclosController::class)->name('ciclos');
Route::prefix('cursos')->group(function () {
    Route::get('/', [CursosController::class, 'index'])->name('cursos.index'); // Para listar cursos
    Route::get('/{curso}', [CursosController::class, 'show'])->name('cursos.show'); // Para mostrar un curso específico
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/inicio', function () {
        return view('dashboard');
    })->name('dashboard');
});
