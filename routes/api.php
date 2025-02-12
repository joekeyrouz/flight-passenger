<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FlightController;
use App\Http\Controllers\Api\PassengerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('/', [Controller::class, 'go']);
Route::get('/flights/{flight}/passengers', [PassengerController::class, 'index']);

Route::get('/flights/{flight}/passengers/{passenger}', [PassengerController::class, 'show']);

Route::get('/flights', [FlightController::class, 'index']);

Route::get('/flights/{flight}', [FlightController::class, 'show']);