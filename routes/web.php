<?php

use App\Http\Controllers\EstadoController;
use App\Http\Controllers\ConfirmadosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::get('/offline', function(){
    return view('vendor.laravelpwa.offline');
});
require __DIR__.'/auth.php';
Route::resource('/estados',EstadoController::class);
Route::resource('/confirmados',ConfirmadosController::class);
