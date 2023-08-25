<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\NotaController;

//Contactos
// INDEX
Route::get('/contactos',[ContactoController::class,'index'])->name('contacto.index');
// SHOW
Route::get('/contactos/{id}/show',[ContactoController::class,'show'])->where('id','[0-9]+')->name('contacto.show');
// CREATE Y STORE
Route::get('/contactos/crear',[ContactoController::class,'create'])->name('contacto.crear');
Route::post('/contactos/crear',[ContactoController::class,'store'])->name('contacto.store');
// EDIT
Route::get('/contactos/{id}/editar',[ContactoController::class,'edit'])->whereNumber('id')->name('contacto.editar');
Route::put('/contactos/{id}/editar',[ContactoController::class,'update'])->whereNumber('id')->name('contacto.update');
//DELETE
Route::delete('/contactos/{id}/borrar',[ContactoController::class,'destroy'])->whereNumber('id')->name('contacto.borrar');



// Eventos
// INDEX
Route::get('/eventos',[EventoController::class,'index'])->name('evento.index');
// SHOW
Route::get('/eventos/{id}/show',[EventoController::class,'show'])->where('id','[0-9]+')->name('evento.show');
// CREATE Y STORE
Route::get('/eventos/crear',[EventoController::class,'create'])->name('evento.crear');
Route::post('/eventos/crear',[EventoController::class,'store'])->name('evento.store');
// EDIT
Route::get('/eventos/{id}/editar',[EventoController::class,'edit'])->whereNumber('id')->name('evento.editar');
Route::put('/eventos/{id}/editar',[EventoController::class,'update'])->whereNumber('id')->name('evento.update');
//DELETE
Route::delete('/eventos/{id}/borrar',[EventoController::class,'destroy'])->whereNumber('id')->name('evento.borrar');



// Notas
// INDEX
Route::get('/notas',[NotaController::class,'index'])->name('nota.index');
// SHOW
Route::get('/notas/{id}/show',[NotaController::class,'show'])->where('id','[0-9]+')->name('nota.show');
// CREATE Y STORE
Route::get('/notas/crear',[NotaController::class,'create'])->name('nota.crear');
Route::post('/notas/crear',[NotaController::class,'store'])->name('nota.store');
// EDIT
Route::get('/notas/{id}/editar',[NotaController::class,'edit'])->whereNumber('id')->name('nota.editar');
Route::put('/notas/{id}/editar',[NotaController::class,'update'])->whereNumber('id')->name('nota.update');
//DELETE
Route::delete('/notas/{id}/borrar',[NotaController::class,'destroy'])->whereNumber('id')->name('nota.borrar');

