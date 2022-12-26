<?php

use App\Http\Controllers\Api\v1\Auth\ForgotPasswordController;
use App\Http\Controllers\Api\v1\Auth\LoginController;
use App\Http\Controllers\Api\v1\Auth\RegisterController;
use App\Http\Controllers\Api\v1\Cabinet\CabinetController;
use App\Http\Controllers\Api\v1\Profile\HumanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------

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

        Route::prefix('profiles')->group(function () {
            Route::get('/{id}', [HumanController::class, 'show']);
        });

        Route::prefix('search')->group(function () {
            Route::get('/profile', [HumanController::class, 'search']);
        });


    });
});

Route::fallback(function () {
   return response()->json(['status' => false, 'error' => 'Page not found'], 404);
});



