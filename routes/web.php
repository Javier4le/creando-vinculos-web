<?php

use App\Http\Controllers\ClubAdultosController;
use App\Http\Controllers\ClubDeportivoController;
use App\Http\Controllers\JuntaVecinosController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['auth']], function () {
    // Route::resource('users', UserController::class);
    Route::resource('juntas_vecinos', JuntaVecinosController::class, ['parameters' => ['juntas_vecinos' => 'juntaVecinos']]);
    Route::resource('clubes_deportivos', ClubDeportivoController::class, ['parameters' => ['clubes_deportivos' => 'clubDeportivo']]);
    Route::resource('clubes_adultos', ClubAdultosController::class, ['parameters' => ['clubes_adultos' => 'clubAdultos']]);
});
