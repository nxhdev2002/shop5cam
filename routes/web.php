<?php

use App\Http\Controllers\Admin\AdminSiteController;
use App\Http\Middleware\VerifyCsrfToken;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SiteController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\PaymentController;
use App\Models\Cart;
use Faker\Provider\ar_EG\Payment;
use App\Http\Controllers\AdminController;

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

Route::name('user.')->prefix('user')->middleware('auth')->group(function () {
    Route::prefix('cart')->name('cart.')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('index');
        Route::get('/load', [CartController::class, 'loadCart'])->name('load');
        Route::delete('/remove', [CartController::class, 'remove'])->withoutMiddleware([VerifyCsrfToken::class])->name('remove');
        Route::post('/add-to-cart', [CartController::class, 'addToCart'])->withoutMiddleware([VerifyCsrfToken::class]);
    });

    Route::prefix('deposit')->name('deposit.')->group(function () {
        Route::get('/', [PaymentController::class, 'deposit'])->name("index");
        Route::get('/{id}', [PaymentController::class, 'depositDetails'])->name("details");
        Route::post('/preview', [PaymentController::class, 'depositPreview'])->name("preview");
        Route::post('/confirm', [PaymentController::class, 'depositConfirm'])->name("confirm");
    });

    Route::get('/trans', [PaymentController::class, 'history'])->name('trans');
});

// route admin
Route::group(['prefix' => 'admin', 'middleware'=>'checkLogin'],function () {
    Route::get('/dashboard', [AdminController::class, 'Dashboard']);
    Route::get('/categories', [AdminController::class, 'Categories']);
    Route::get('/categories/create', [AdminController::class, 'createCategories']);
    Route::post('/categories/create', [AdminController::class, 'storeCategories']);
    Route::get('/categories/{id}/edit', [AdminController::class, 'editCategories']);
    Route::put('/categories/{id}', [AdminController::class, 'updateCategories']);
    Route::delete('/categories/{id}', [AdminController::class, 'destroyCategories']);
    Route::get('/deposit', [AdminController::class, 'Deposit']);
    Route::put('/deposit/{id}/accept', [AdminController::class, 'updateAcceptDeposit']);
    Route::put('/deposit/{id}/deny', [AdminController::class, 'updateDenyDeposit']);
    Route::get('/user', [AdminController::class, 'User']);
    Route::delete('/user/{id}', [AdminController::class, 'destroyUser']);
    Route::get('/user/{id}/edit', [AdminController::class, 'editUser']);
    Route::put('/user/{id}', [AdminController::class, 'updateUser']);
    Route::get('/search', [AdminController::class, 'searchUser']);
});
require __DIR__ . '/auth.php';
