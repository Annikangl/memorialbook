<?php

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


Route::get('/', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm']);


Route::get('/tree',[App\Http\Controllers\ProfileController::class,'index'])->name('tree');

Route::get('/tree-list',[App\Http\Controllers\ProfileController::class,'list'])->name('tree.list');

Route::group(['prefix'=>'profile','as'=>'profile.'],function(){
    Route::get('/create',[App\Http\Controllers\ProfileController::class,'create'])->name('create');
    Route::get('/create_step2',[App\Http\Controllers\ProfileController::class,'create_step2'])->name('create.step2');
    Route::get('/create_step3',[App\Http\Controllers\ProfileController::class,'create_step3'])->name('create.step3');
    Route::post('/store',[App\Http\Controllers\ProfileController::class,'store'])->name('store');
});




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
