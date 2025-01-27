<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
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

Route::controller(Controller::class)->group(function(){
    Route::get('/', 'index');
    Route::get('/logs', 'logs')->name('logs');
});

Auth::routes([
    'register' => false
]);

Route::middleware(['auth'])->group(function(){
    Route::controller(HomeController::class)->group(function(){
        Route::get('/home', 'home')->name('home');
        Route::get('/password', 'password')->name('password');
    });
});

