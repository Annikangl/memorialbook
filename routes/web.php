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

Route::get('/tree', function () {
    return view('tree.index');
});
Route::group(['prefix'=>'profile','as'=>'profile.'],function(){
    Route::get('/create',[App\Http\Controllers\ProfileController::class,'create'])->name('create');
});
