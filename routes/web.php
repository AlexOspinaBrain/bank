<?php

use App\Http\Controllers\AdminController;
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
    return redirect('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('trans-propias',
        [AdminController::class, 'transaccionPropias']
        )->name('propias');

    Route::post('transaccion-crea', 
        [AdminController::class, 'storeTransaccion']
        )->name('transaccion');

    Route::get('trans-terceros', 
        [AdminController::class, 'transaccionTerceros']
        )->name('terceros');
    
    Route::get('getTransacciones', function () {
        return view('dashboard');
    })->name('tus-transacciones');    
});
