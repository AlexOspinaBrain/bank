<?php

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
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/transPropias', function () {
        return view('propias');
    })->name('propias');

    Route::get('/transTerceros', function () {
        return view('dashboard');
    })->name('terceros');
    
    Route::get('/getTransacciones', function () {
        return view('dashboard');
    })->name('tus-transacciones');    
});
