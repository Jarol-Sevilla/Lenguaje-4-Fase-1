<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\NotaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contacto', [ContactoController::class, 'Contacto']);
Route::get('/evento', [EventoController::class, 'Enevento']);
Route::get('/nota', [NotaController::class, 'Nota']);
