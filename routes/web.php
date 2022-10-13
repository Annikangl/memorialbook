<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\NetworkController;
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
Route::get('login/{driver}/callback', [NetworkController::class, 'callback']);

Route::get('/', [LoginController::class, 'showLoginForm'])->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/tree', function () {
        return view('tree.index');
    })->name('family-tree');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('/create', [App\Http\Controllers\ProfileController::class, 'create'])->name('create');
    });
});


