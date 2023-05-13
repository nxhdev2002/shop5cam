<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SiteController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageUploadController;
use App\Models\Cart;

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

/// Site route
Route::get('/', [SiteController::class, 'index'])->name('site.index');

/// upload image
Route::get('image-upload-preview', [ImageUploadController::class, 'index']);
Route::post('upload-image', [ImageUploadController::class, 'store']);

/// product route
Route::group(['prefix' => 'products'], function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/{id}', [ProductController::class, 'show']);
    Route::get('/create', [ProductController::class, 'create']);
    Route::post('/create', [ProductController::class, 'store']);
    Route::get('/{id}/edit', [ProductController::class, 'edit']);
    Route::put('/{id}', [ProductController::class, 'update']);
    Route::delete('/{id}', [ProductController::class, 'destroy']);
    Route::get('/search', [ProductController::class, 'search']);
    Route::get('/filter', [ProductController::class, 'filter']);
});

/// cart route

Route::group(['middleware' => 'auth', 'prefix' => 'cart'], function () {
    Route::get('/', [CartController::class, 'index']);
    Route::get('/load', [CartController::class, 'loadCart']);
    Route::delete('/remove', [CartController::class, 'remove'])->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
    Route::post('/add-to-cart', [CartController::class, 'addToCart'])->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
});



require __DIR__ . '/auth.php';
