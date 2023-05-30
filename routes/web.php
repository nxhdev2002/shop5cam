<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminSiteController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\DepositController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\WebConfigController;

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController as UserController;

use App\Http\Middleware\VerifyCsrfToken;
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

/// Site route
Route::get('/', [SiteController::class, 'index'])->name('site.index');

/// upload image
Route::get('image-upload-preview', [ImageUploadController::class, 'index']);
Route::post('upload-image', [ImageUploadController::class, 'store']);

/// product route
Route::name('products.')->prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/{id}', [ProductController::class, 'show'])->name('show');
    Route::get('/create', [ProductController::class, 'create']);
    Route::post('/create', [ProductController::class, 'store']);
    Route::get('/{id}/edit', [ProductController::class, 'edit']);
    Route::put('/{id}', [ProductController::class, 'update']);
    Route::delete('/{id}', [ProductController::class, 'destroy']);
    Route::get('/search', [ProductController::class, 'search']);
    Route::get('/filter', [ProductController::class, 'filter']);
});

Route::name('categories.')->prefix('categories')->group(function () {
    Route::get('/{id}', [CategoryController::class, 'show'])->name('show');
});

Route::name('user.')->prefix('user')->middleware('auth')->group(function () {
    Route::prefix('cart')->name('cart.')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('index');
        Route::get('/load', [CartController::class, 'loadCart'])->name('load');
        Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');
        Route::post('/confirm', [CartController::class, 'confirm'])->name('confirm');
        Route::delete('/remove', [CartController::class, 'remove'])->withoutMiddleware([VerifyCsrfToken::class])->name('remove');
        Route::post('/add-to-cart', [CartController::class, 'addToCart'])->withoutMiddleware([VerifyCsrfToken::class])->name('add');
    });

    Route::prefix('deposit')->name('deposit.')->group(function () {
        Route::get('/', [PaymentController::class, 'deposit'])->name("index");
        Route::get('/{id}', [PaymentController::class, 'depositDetails'])->name("details");
        Route::post('/preview', [PaymentController::class, 'depositPreview'])->name("preview");
        Route::post('/confirm', [PaymentController::class, 'depositConfirm'])->name("confirm");
    });

    Route::prefix('orders')->name('order.')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name("index");
        Route::get('/details/{id}', [OrderController::class, 'details'])->name("details");
        Route::get('/report/{id}', [OrderController::class, 'report'])->name("report");
        Route::delete('/report/{id}', [OrderController::class, 'delete'])->name("delete");
        Route::post('/report/{id}', [OrderController::class, 'storeReport'])->name("reportSend");
    });

    Route::get('/trans', [PaymentController::class, 'history'])->name('trans');

    Route::post('/giftcode/apply', [UserController::class, 'applyGiftCode'])->name('applyGiftCode');

    Route::get('/upgrade', [UserController::class, 'upgrade'])->name('upgrade');
    Route::post('/upgrade/confirm', [UserController::class, 'confirmUpgrade'])->name('confirmUpgrade');
});

// route admin
Route::name('admin.')->prefix('admin')->middleware('auth')->middleware('checkLogin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'Dashboard']);
    Route::get('/categories', [CategoriesController::class, 'Categories']);
    Route::get('/categories/create', [CategoriesController::class, 'createCategories']);
    Route::post('/categories/create', [CategoriesController::class, 'storeCategories']);
    Route::get('/categories/{id}/edit', [CategoriesController::class, 'editCategories']);
    Route::put('/categories/{id}/update', [CategoriesController::class, 'updateCategories']);
    Route::delete('/categories/{id}/delete', [CategoriesController::class, 'destroyCategories']);
    Route::get('/deposit', [DepositController::class, 'Deposit']);
    Route::get('/deposit/{id}/edit', [DepositController::class, 'editDeposit']);
    Route::put('/deposit/{id}/accept', [DepositController::class, 'updateAcceptDeposit']);
    Route::put('/deposit/{id}/deny', [DepositController::class, 'updateDenyDeposit']);
    Route::get('/user', [AdminUserController::class, 'User']);
    Route::delete('/user/{id}/delete', [AdminUserController::class, 'destroyUser']);
    Route::get('/user/{id}/edit', [AdminUserController::class, 'editUser']);
    Route::put('/user/{id}/update', [AdminUserController::class, 'updateUser']);
    Route::get('/search', [AdminUserController::class, 'searchUser']);
    Route::get('/web-config', [WebConfigController::class, 'index']);
    Route::put('/web-config/update', [WebConfigController::class, 'updateWebConfig']);
});
require __DIR__ . '/auth.php';
