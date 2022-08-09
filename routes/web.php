<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::resource('users', UserController::class);

Route::group(['middleware' => ['auth']], function() {
    Route::resource('users', UserController::class);
    // Route::get('user', UserController::class, 'index')->name('user.index');
    // Route::get('user', UserController::class);
    // Route::resource('user', UserController::class);
});
