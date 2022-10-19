<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\NetworkController;
use App\Http\Controllers\Cemetery\CemeteryController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [LoginController::class, 'showLoginForm'])->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/tree', [App\Http\Controllers\ProfileController::class, 'index'])->name('tree');
    Route::get('/tree-list', [App\Http\Controllers\ProfileController::class, 'list'])->name('tree.list');

    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('/create', [ProfileController::class, 'create'])->name('create');
        Route::post('/store', [ProfileController::class, 'store'])->name('store');
        Route::get('/create_step2', [ProfileController::class, 'create_step2'])->name('create.step2');
        Route::get('/create_step3', [ProfileController::class, 'create_step3'])->name('create.step3');
        Route::get('/card/{slug}', [ProfileController::class, 'show'])->name('show');
        Route::get('/map', [ProfileController::class, 'map'])->name('search.map');
    });

    Route::group(['prefix' => 'cemetery', 'as' => 'cemetery.'], function () {
        Route::get('map', [CemeteryController::class, 'map'])->name('search.map');
        Route::get('list', [CemeteryController::class, 'list'])->name('search.list');
    });


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('/create', [App\Http\Controllers\ProfileController::class, 'create'])->name('create');
    });
});

