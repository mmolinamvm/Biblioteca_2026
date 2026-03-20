<?php
use App\Http\Controllers\LlibreController;
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
