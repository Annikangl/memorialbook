<?php

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

Route::get('/', function () {
    return view('welcome');
});



Route::get('/tree',[App\Http\Controllers\ProfileController::class,'index'])->name('tree');

Route::get('/tree-list',[App\Http\Controllers\ProfileController::class,'list'])->name('tree.list');

Route::group(['prefix'=>'profile','as'=>'profile.'],function(){
    Route::get('/create',[App\Http\Controllers\ProfileController::class,'create'])->name('create');
    Route::post('/store',[App\Http\Controllers\ProfileController::class,'store'])->name('store');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
