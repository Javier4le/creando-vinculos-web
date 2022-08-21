<?php

use App\Http\Controllers\ClubAdultosController;
use App\Http\Controllers\ClubDeportivoController;
use App\Http\Controllers\JuntaVecinosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/juntas_vecinos', [JuntaVecinosController::class, 'apiIndex']);
Route::get('/clubes_deportivos', [ClubDeportivoController::class, 'apiIndex']);
Route::get('/clubes_adultos', [ClubAdultosController::class, 'apiIndex']);
