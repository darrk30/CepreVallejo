<?php

use App\Http\Controllers\Dashboard\BibliotecaController;
use App\Http\Controllers\Dashboard\MisCursosController;
use App\Http\Controllers\Dashboard\PaginaInicioController;
use App\Http\Controllers\Dashboard\VideosController;
use Illuminate\Support\Facades\Route;



Route::get('paginaInicio', PaginaInicioController::class)->middleware('can:paginaInicio')->name('paginaInicio');

Route::prefix('Biblioteca')->group(function () {
    Route::get('/', [BibliotecaController::class, 'index'])->middleware('can:biblioteca')->name('biblioteca');
    Route::get('/{book}', [BibliotecaController::class, 'show'])->middleware('can:biblioteca.show')->name('biblioteca.show'); 
});

Route::prefix('misCursos')->group(function () {
    Route::get('/', [MisCursosController::class, 'index'])->middleware('can:misCursos')->name('misCursos');
    Route::get('/{curso}/{id}', [MisCursosController::class, 'show'])->middleware('can:misCursos.show')->name('misCursos.show'); 
});

Route::prefix('videos')->group(function () {
    Route::get('/', [VideosController::class, 'index'])->middleware('can:videos')->name('videos');
    Route::get('/{video}', [VideosController::class, 'show'])->middleware('can:video.show')->name('video.show'); 
});