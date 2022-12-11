<?php

use App\Http\Controllers\Api\v1\Auth\ForgotPasswordController;
use App\Http\Controllers\Api\v1\Auth\LoginController;
use App\Http\Controllers\Api\v1\Auth\RegisterController;
use App\Http\Controllers\Api\v1\Cabinet\CabinetController;
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

Route::group(['prefix' => 'v1', 'as' => 'v1.'], function () {
    Route::post('/register', [RegisterController::class, 'register']);
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/logout', [LoginController::class, 'logout']);

        Route::prefix('cabinet')->group(function () {
            Route::get('/users/{id}', [CabinetController::class, 'show']);
            Route::put('/users/{id}', [CabinetController::class, 'update']);
            Route::delete('/users/{id}', [CabinetController::class, 'delete']);
        });
    });
});

Route::fallback(function () {
   return response()->json(['status' => false, 'error' => 'Page not found'], 404);
});



