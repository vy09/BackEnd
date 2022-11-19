<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasienController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('pasiens',[PasienController::class, 'index']);
    Route::post('/pasiens', [PasienController::class, 'store']);
    Route::get('/pasiens/{id}', [PasienController::class, 'show']);
    Route::put('/pasiens/{id}', [PasienController::class, 'update']);
    Route::delete('/pasiens/{id}', [PasienController::class, 'destroy']);
    Route::get('/pasiens/search/{name}', [PasienController::class, 'search']);
    Route::get('/pasiens/status/{status}', [PasienController::class, 'status']);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);