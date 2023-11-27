<?php

use App\Http\Controllers\EstadoController;
use App\Http\Controllers\IncidenciaController;
use App\Http\Controllers\ServicioController;
use Illuminate\Support\Facades\Route;

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

Route::controller(EstadoController::class)->group(function () {
    Route::get('/', 'dashboard')->name('estados.dashboard');
    Route::get('estado', 'enviarPing')->name('estados.enviar_ping');
});

Route::controller(ServicioController::class)->group(function () {
    Route::get('servicios', 'index')->name('servicios.index');
    Route::get('servicios/create', 'create')->name('servicios.create');
    Route::get('servicios/edit/{servicio}', 'edit')->name('servicios.edit');
    Route::post('servicios/create', 'store')->name('servicios.store');
    Route::put('servicios/{servicio}', 'update')->name('servicios.update');
    Route::delete('servicios/{servicio}', 'destroy')->name('servicios.destroy');
});

Route::controller(IncidenciaController::class)->group(function () {
    Route::get('incidencia/store/{id}', 'store')->name('incidencia.store');
    Route::get('incidencia/solution/{id}', 'solution')->name('incidencia.solution');
    Route::get('incidencia/mail', 'mail')->name('incidencia.mail');
});
