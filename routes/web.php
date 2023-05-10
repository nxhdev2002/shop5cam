<?php

use App\Http\Controllers\HelloController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SiteController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageUploadController;

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

Route::get('/home', function () {
    return view('index');
});

Route::get('/f', function () {
    return view('test');
});

Route::get('/a',[SiteController::class, 'index'] );

require __DIR__ . '/auth.php';
