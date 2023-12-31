<?php

use App\Http\Controllers\helper\PelaporanController;
use App\Http\Controllers\helper\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('/', 'App\Http\Controllers\Auth\LoginController@login');
Auth::routes(['login' => false,
    'register' => false,
    'reset' => false,
    'verify' => false,]);

Route::middleware(['auth'])->group(function () {
    Route::middleware(['admin'])->name('admin.')->prefix('admin')->group(function () {
        Route::resource('/user', UserController::class);
        Route::post('/user/{id}/reset', 'App\Http\Controllers\helper\UserController@reset')->name('user.reset');
        Route::resource('/laporan',PelaporanController::class)->except(['create','store', 'destroy']);
        Route::get('/map', 'App\Http\Controllers\Api\MapController@index')->name('map.index');
        Route::get('/maplength', 'App\Http\Controllers\Api\MapController@next')->name('map.next');
    });
    Route::middleware(['kontraktor'])->name('client.')->prefix('client')->group(function () {
        Route::resource('/user', UserController::class);
        Route::resource('/laporan',PelaporanController::class);
        Route::get('/map', 'App\Http\Controllers\Api\MapController@index')->name('map.index');
        Route::get('/maplength', 'App\Http\Controllers\Api\MapController@next')->name('map.next');
    });
});