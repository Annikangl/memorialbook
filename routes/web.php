<?php

use App\Http\Controllers\Auth\NetworkController;
use App\Http\Controllers\Cabinet\CabinetController;
use App\Http\Controllers\Cemetery\CemeteryController;
use App\Http\Controllers\Community\CommunityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Profile\BurialController;
use App\Http\Controllers\Profile\HumanController;
use App\Http\Controllers\Profile\PetController;
use App\Http\Controllers\User\UserController;
use App\Services\Attributes\ReligionService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('login/{driver}', [NetworkController::class, 'redirect'])->name('social.login');
Route::get('login/{driver}/callback', [NetworkController::class, 'callback'])->name('social.callback');

//Route::get('/', [LoginController::class, 'showLoginForm'])->name('index');

Route::get('/policy', [PageController::class, 'policy'])->name('policy');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');

Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
    Route::get('/map', [HumanController::class, 'map'])->name('search.map');
});

Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
    Route::get('/humans/search/map', [HumanController::class, 'map'])->name('humans.search.map');
});

Route::group(['prefix' => 'cemetery', 'as' => 'cemetery.'], function () {
    Route::get('/map', [CemeteryController::class, 'map'])->name('search.map');
    Route::get('/list', [CemeteryController::class, 'list'])->name('search.list');
});


Route::get('profile/human/card/{slug}', [HumanController::class, 'show'])->name('profile.human.show');


Route::middleware('auth')->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::group(['prefix' => 'cabinet', 'as' => 'cabinet.'], function () {
        Route::get('/{slug}', [CabinetController::class, 'index'])->name('show');
        Route::put('/{user}/update', [CabinetController::class, 'update'])->name('update');
        Route::delete('/delete', [CabinetController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::post('/subscribe/community', [UserController::class, 'subscribe'])
            ->name('community.subscribe');
    });

    Route::get('/tree', [HumanController::class, 'index'])->name('tree');
    Route::get('/tree-list', [HumanController::class, 'list'])->name('tree.list');

    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {

        Route::group(['prefix' => 'human', 'as' => 'human.'], function () {
            Route::get('/create', [HumanController::class, 'create'])->name('create');
            Route::post('/store', [HumanController::class, 'store'])->name('store');
            Route::get('/{human}/edit', [HumanController::class, 'edit'])->name('edit');
            Route::put('/{human}/update', [HumanController::class, 'update'])->name('update');
//            Route::get('/card/{slug}', [HumanController::class, 'show'])->name('show');
        });

        Route::group(['prefix' => 'pet', 'as' => 'pet.'], function () {
            Route::get('/create', [PetController::class, 'create'])->name('create');
            Route::post('/store', [PetController::class, 'store'])->name('store');
            Route::get('/{slug}/show', [PetController::class, 'show'])->name('show');
        });

        Route::group(['prefix' => 'burial', 'as' => 'burial.'], function () {
            Route::get('/create', [BurialController::class, 'create'])->name('create');
            Route::post('/store', [BurialController::class, 'store'])->name('store');
            Route::get('/search/', [BurialController::class, 'searchProfile'])->name('search');
            Route::get('/{burial}/show', [BurialController::class, 'show'])->name('show');
            Route::get('/{burial}/short/show', [BurialController::class, 'showShortPage'])
                ->middleware('agent')
                ->name('short.page');
        });
    });

    Route::group(['prefix' => 'cemetery', 'as' => 'cemetery.'], function () {
        Route::get('show/{slug}', [CemeteryController::class, 'show'])->name('show');

        Route::get('/create', [CemeteryController::class, 'create'])->name('create');
        Route::post('/store', [CemeteryController::class, 'store'])->name('store');
    });

    Route::group(['prefix' => 'community', 'as' => 'community.'], function () {
        Route::get('/index', [CommunityController::class, 'index'])->name('index');
        Route::get('/show/{slug}', [CommunityController::class, 'show'])->name('show');
        Route::get('/create', [CommunityController::class, 'create'])->name('create');
        Route::post('/store', [CommunityController::class, 'store'])->name('store');
    });
});

