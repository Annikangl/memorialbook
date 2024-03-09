<?php

use App\Http\Controllers\Api\v1\Shop\CategoryController;
use App\Http\Controllers\Api\v1\Shop\ProductController;
use App\Http\Controllers\Api\v1\Shop\ShopController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'shop', 'as' => 'shop.'], function () {

    Route::get('/{shop}', [ShopController::class, 'show']);
    Route::post('/', [ShopController::class, 'store']);

    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index']);
    });

    Route::prefix('product')->group(function () {
        Route::post('/', [ProductController::class, 'store']);
    });
});
