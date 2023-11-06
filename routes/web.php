<?php

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

Route::get('/', function () {
    return view('estado_actual');
});

Route::controller(ServicioController::class)->group(function () {
    Route::get('servicios', 'show')->name('servicios.show');
    Route::get('servicios/create', 'create')->name('servicios.create');
    Route::post('servicios/create', 'store')->name('servicios.store');
});
