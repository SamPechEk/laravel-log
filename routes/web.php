<?php

use App\Http\Controllers\EstadoController;
use App\Http\Controllers\ConfirmadosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TotalController;

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
Route::get('/estados/getEstados', [EstadoController::class,'getEstados']);
Route::resource('/estados', EstadoController::class);
Route::resource('/confirmados',ConfirmadosController::class);
Route::get('/total',[TotalController::class, 'index'])->name('total');
Route::get('filter/{id}', [TotalController::class, 'filter'])
->name('filterR');

Route::get('/totalMonth',[TotalController::class, 'indexMonth'])->name('totalMonth');
Route::get('filterM/{mes}', [TotalController::class, 'filterMonth'])
->name('filterM');
