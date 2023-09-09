<?php

use App\Http\Controllers\Api\v1\Attributes\ReligionController;
use App\Http\Controllers\Api\v1\Auth\ForgotPasswordController;
use App\Http\Controllers\Api\v1\Auth\LoginController;
use App\Http\Controllers\Api\v1\Auth\NetworkController;
use App\Http\Controllers\Api\v1\Auth\RegisterController;
use App\Http\Controllers\Api\v1\Cabinet\CabinetController;
use App\Http\Controllers\Api\v1\Feed\FeedController;
use App\Http\Controllers\Api\v1\Profile\HumanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------

*/

Route::group(['prefix' => 'v1', 'as' => 'v1.'], function () {

    Route::prefix('auth')->group(function () {
        Route::post('/register', [RegisterController::class, 'register']);
        Route::post('/login', [LoginController::class, 'login']);
        Route::post('/login/network/{network}', [NetworkController::class, 'redirect']);
        Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth:sanctum');
    });

    Route::prefix('guest')->group(function () {
        Route::prefix('feed')->group(function () {
            Route::get('/', [\App\Http\Controllers\Api\v1\Guest\FeedController::class, 'index']);
        });
    });



//    Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::prefix('/feed')->group(function () {
            Route::get('/', [FeedController::class, 'index']);
        });

        Route::prefix('cabinet')->group(function () {
            Route::get('/user', [CabinetController::class, 'show']);
            Route::put('/user', [CabinetController::class, 'update']);
        });

        Route::prefix('attributes')->group(function () {
            Route::get('religion', [ReligionController::class, 'index']);
        });

        Route::group(['prefix' => 'profile'], function () {
            Route::prefix('human')->group(function () {
                Route::get('/', [HumanController::class, 'index']);
                Route::post('/', [HumanController::class, 'store']);
            });

            Route::prefix('pet')->group(function () {

            });
        });
    });

});

Route::fallback(function () {
    return response()->json(['status' => false, 'error' => 'Page not found'], 404);
});



