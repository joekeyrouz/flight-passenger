<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\FlightController;
use App\Http\Controllers\Api\PassengerController;
use App\Http\Controllers\Api\ExportUserController;
use App\Http\Controllers\Api\UserImportController;
use App\Http\Controllers\Api\PassengerImageController;

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
Route::post('login', [AuthController::class, 'login'])->middleware('throttle:3,1');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->middleWare('auth:sanctum');

Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::apiResource('flights/{flight}/passengers', PassengerController::class);
    Route::post('passengers/{passenger}/image', [PassengerImageController::class, 'uploadImage']);    
    Route::apiResource('flights', FlightController::class);
    Route::apiResource('users', UserController::class);
    
    Route::get('users/export', [ExportUserController::class, 'export']);

    Route::post('users/import', [UserImportController::class, 'import']);
});