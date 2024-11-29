<?php

use App\Http\Controllers\PrincipalController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PrincipalController::class, 'index']) -> name('index');

Route::get('/pelicula{pelicula}',[PrincipalController::class, 'verPelicula']) -> name('pelicula');

Route::get('/pelis',[PrincipalController::class, 'pelis']) -> name('pelis');

Route::get('/acts',[PrincipalController::class, 'acts']) -> name('acts');

Route::get('/agregarpelis',[PrincipalController::class, 'agregarpelis']) -> name('agregarpelis');

Route::get('/agregaracts',[PrincipalController::class, 'agregaracts']) -> name('agregaracts');

Route::post('/guardarpelis',[PrincipalController::class, 'guardarpelis']) -> name('guardarpelis');

Route::get('/editarpelis/{pelicula}',[PrincipalController::class, 'editarpelis']) -> name('editarpelis');

Route::delete('/borrarpelis/{pelicula}',[PrincipalController::class, 'borrarpelis']) -> name('borrarpelis');

Route::put('/actpelis/{pelicula}',[PrincipalController::class, 'actpelis'])->name('actpelis');

Route::post('/guardaracts',[PrincipalController::class, 'guardaracts']) -> name('guardaracts');

Route::get('/editaracts/{actor}',[PrincipalController::class, 'editaracts']) -> name('editaracts');

Route::delete('/borraracts/{actor}',[PrincipalController::class, 'borraracts']) -> name('borraracts');

Route::put('/actacts/{actor}',[PrincipalController::class, 'actacts'])->name('actacts');

Route::get('/buscar', [PrincipalController::class, 'buscar'])->name('buscar');

Route::get('/busqueda', [PrincipalController::class, 'busqueda'])->name('busqueda');