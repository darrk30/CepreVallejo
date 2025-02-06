<?php

use App\Http\Controllers\Administrador\BooksController;
use App\Http\Controllers\Administrador\CiclosController;
use App\Http\Controllers\Administrador\CursosController;
use App\Http\Controllers\Administrador\DocentesController;
use App\Http\Controllers\Administrador\Matriculas;
use App\Http\Controllers\Administrador\MatriculasController;
use App\Http\Controllers\Administrador\VideosController;
use App\Livewire\Administrador\CiclosAcademicos;
use App\Models\CiclosCurso;
use Illuminate\Support\Facades\Route;


Route::prefix('cursos')->group(function () {
    Route::get('/', [CursosController::class, 'index'])->middleware('can:admin.cursos')->name('admin.cursos');
    Route::get('/crearcurso', [CursosController::class, 'create'])->middleware('can:admin.cursos.create')->name('admin.cursos.create'); 
    Route::get('/editarcurso/{cursoId}', [CursosController::class, 'update'])->middleware('can:admin.cursos.update')->name('admin.cursos.update'); 
});


Route::prefix('ciclos')->group(function () {
    Route::get('/', [CiclosController::class, 'index'])->middleware('can:admin.ciclos')->name('admin.ciclos');
    Route::get('/crearcicloacademico', [CiclosController::class, 'create'])->middleware('can:admin.ciclos.create')->name('admin.ciclos.create'); 
    //Route::get('/editarcurso/{cursoId}', [CursosController::class, 'update'])->name('admin.cursos.update'); 
});

Route::prefix('matriculas')->group(function () {
    Route::get('/', [MatriculasController::class, 'index'])->middleware('can:admin.matriculas')->name('admin.matriculas');
    Route::get('/crearmatricula', [MatriculasController::class, 'create'])->middleware('can:admin.matriculas.create')->name('admin.matriculas.create'); 
    //Route::get('/editarcurso/{cursoId}', [CursosController::class, 'update'])->name('admin.cursos.update'); 
});

Route::prefix('docentes')->group(function () {
    Route::get('/', [DocentesController::class, 'index'])->middleware('can:admin.docentes')->name('admin.docentes');
    Route::get('/creardocente', [DocentesController::class, 'create'])->middleware('can:admin.docentes.create')->name('admin.docentes.create'); 
    //Route::get('/editarcurso/{cursoId}', [CursosController::class, 'update'])->name('admin.cursos.update'); 
});

Route::prefix('books')->group(function () {
    Route::get('/', [BooksController::class, 'index'])->middleware('can:admin.books')->name('admin.books');
    Route::get('/crearlibro', [BooksController::class, 'create'])->middleware('can:admin.books.create')->name('admin.books.create'); 
    //Route::get('/editarcurso/{cursoId}', [CursosController::class, 'update'])->name('admin.cursos.update'); 
});

Route::prefix('videos')->group(function () {
    Route::get('/', [VideosController::class, 'index'])->middleware('can:admin.videos')->name('admin.videos');
    Route::get('/crearvideo', [VideosController::class, 'create'])->middleware('can:admin.videos.create')->name('admin.videos.create'); 
    //Route::get('/editarcurso/{cursoId}', [CursosController::class, 'update'])->name('admin.cursos.update'); 
});
