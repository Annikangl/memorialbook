<?php

use App\Http\Controllers\Api\v1\Auth\LoginController;
use App\Http\Controllers\Api\v1\Auth\NetworkController;
use App\Http\Controllers\Api\v1\Auth\RegisterController;
use App\Http\Controllers\Api\v1\Community\CommunityController;
use App\Http\Controllers\Api\v1\Community\Post\PostController;
use App\Http\Controllers\Api\v1\Profile\CemeteryController;
use App\Http\Controllers\Api\v1\Profile\HumanController;
use App\Http\Controllers\Api\v1\Profile\PetController;
use App\Http\Controllers\Api\v1\User\Cabinet\CabinetController;
use App\Http\Controllers\Api\v1\User\Feed\FeedController;
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

    Route::prefix('profile')->group(function () {
        Route::prefix('human')->group(function () {
            Route::get('/search', [HumanController::class, 'search']);
            Route::get('/search/count', [HumanController::class, 'searchCount']);
            Route::get('/{human}', [HumanController::class, 'show']);
        });

        Route::prefix('pet')->group(function () {
            Route::get('/{pet}', [PetController::class, 'show']);
        });

        Route::prefix('cemeteries')->group(function () {
            Route::get('/search', [CemeteryController::class, 'search']);
            Route::get('/search/count', [CemeteryController::class, 'searchCount']);
            Route::get('/{cemetery}', [CemeteryController::class, 'show']);
        });
    });

    Route::prefix('communities')->group(function () {
        Route::get('/', [CommunityController::class, 'index']);
        Route::get('/search', [CommunityController::class, 'search']);
        Route::get('/{community}', [CommunityController::class, 'show']);
        Route::get('/{community}/memorials/search', [CommunityController::class, 'searchMemorials']);
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

        Route::group(['prefix' => 'profile'], function () {
            Route::prefix('humans')->group(function () {
                Route::get('/', [HumanController::class, 'index']);
                Route::post('/', [HumanController::class, 'store']);
            });

            Route::prefix('pets')->group(function () {
                Route::post('/', [PetController::class, 'store']);
            });

            Route::prefix('cemeteries')->group(function () {
                Route::get('/', [CemeteryController::class, 'index']);
                Route::post('/{cemetery}/subscribe', [CemeteryController::class, 'subscribe']);
                Route::post('/{cemetery}/unsubscribe', [CemeteryController::class, 'unsubscribe']);
            });
        });

        Route::prefix('communities')->group(function () {
            Route::post('/', [CommunityController::class, 'store']);
            Route::put('/{community}', [CommunityController::class, 'update']);
            Route::post('/{community}/subscribe', [CommunityController::class, 'subscribe']);
            Route::post('/{community}/unsubscribe', [CommunityController::class, 'unsubscribe']);

            Route::post('/{community}/memorials/add', [CommunityController::class, 'addMemorial']);
            Route::delete('/{community}/memorials/remove', [CommunityController::class, 'removeMemorial']);

            Route::prefix('posts')->group(function () {
                Route::post('/', [PostController::class, 'store']);
                Route::delete('/{post}', [PostController::class, 'delete']);
            });
        });
    });

});

Route::fallback(function () {
    return response()->json(['status' => false, 'error' => 'Page not found'], 404);
});



