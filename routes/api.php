<?php

use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\CategoryProductController;
use App\Http\Controllers\API\ImageController;
use App\Http\Controllers\API\ImageProductController;
use App\Http\Controllers\API\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'prefix' => 'category',
    'controller' => CategoryController::class
], function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::post('/', [CategoryController::class, 'store']);
    Route::patch('/{id}', [CategoryController::class, 'update']);
    Route::delete('/{id}', [CategoryController::class, 'destroy']);
});

Route::group([
    'prefix' => 'product',
    'controller' => ProductController::class
], function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::post('/', [ProductController::class, 'store']);
    Route::patch('/{id}', [ProductController::class, 'update']);
    Route::delete('/{id}', [ProductController::class, 'destroy']);
});

Route::group([
    'prefix' => 'image',
    'controller' => ImageController::class
], function () {
    Route::get('/', [ImageController::class, 'index']);
    Route::post('/', [ImageController::class, 'store']);
    Route::patch('/{id}', [ImageController::class, 'update']);
    Route::delete('/{id}', [ImageController::class, 'destroy']);
});

Route::group([
    'prefix' => 'category-product',
    'controller' => CategoryProductController::class
], function () {
    Route::get('/', [CategoryProductController::class, 'index']);
    Route::post('/', [CategoryProductController::class, 'store']);
    Route::patch('/{id}', [CategoryProductController::class, 'update']);
    Route::delete('/{id}', [CategoryProductController::class, 'destroy']);
});

Route::group([
    'prefix' => 'image-product',
    'controller' => ImageProductController::class
], function () {
    Route::get('/', [ImageProductController::class, 'index']);
    Route::post('/', [ImageProductController::class, 'store']);
    Route::patch('/{id}', [ImageProductController::class, 'update']);
    Route::delete('/{id}', [ImageProductController::class, 'destroy']);
});
