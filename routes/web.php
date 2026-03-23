<?php
use App\Http\Controllers\LlibreController;
use App\Http\Controllers\AutorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/llibres', [LlibreController::class, 'index']);
// Aquesta ruta serveix per MOSTRAR el formulari
Route::get('/llibres/crear', [LlibreController::class, 'create']);
// Aquesta ruta serveix per REBRE les dades del formulari
Route::post('/llibres/crear', [LlibreController::class, 'store']);

Route::get('/llibres/{id}', [LlibreController::class, 'show']);

Route::get('/llibres/delete/{id}', [LlibreController::class, 'delete']);

// Aquesta ruta serveix per MOSTRAR el formulari
Route::get('/llibres/editar/{id}', [LlibreController::class, 'edit']);
// Aquesta ruta serveix per REBRE les dades del formulari
Route::post('/llibres/editar/{id}', [LlibreController::class, 'update']);

Route::get('/autors', [AutorController::class, 'index']);

Route::get('/autors/crear', [AutorController::class, 'create']);
// Aquesta ruta serveix per REBRE les dades del formulari
Route::post('/autors/crear', [AutorController::class, 'store']);

Route::get('/autors/{id}', [AutorController::class, 'show']);

Route::get('/autors/delete/{id}', [AutorController::class, 'delete']);

// Aquesta ruta serveix per MOSTRAR el formulari
Route::get('/autors/editar/{id}', [AutorController::class, 'edit']);
// Aquesta ruta serveix per REBRE les dades del formulari
Route::post('/autors/editar/{id}', [AutorController::class, 'update']);

Route::get('/llibresxautors', [LlibreController::class, 'llibresxautors']);
Route::get('/autorsxllibres', [AutorController::class, 'autorsxllibres']);
