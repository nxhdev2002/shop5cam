<?php

use App\Http\Controllers\Admin\AdminSiteController;
use App\Http\Middleware\VerifyCsrfToken;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\UserController as UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SiteController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Models\Cart;
use Faker\Provider\ar_EG\Payment;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdsController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\DepositController;
use App\Http\Controllers\Admin\WebConfigController;
use App\Http\Controllers\Admin\GatewayController;
use App\Http\Controllers\Admin\GiftCodeController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\WithdrawController as AdminWithdrawController;
use App\Http\Controllers\Seller\SellerAdsController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\Seller\SellerProductController;
use App\Http\Controllers\Seller\SellerStatController;
use App\Http\Controllers\Seller\WithDrawController;

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
    Route::get('/search', [ProductController::class, 'search'])->name('search');
    Route::get('/filter', [ProductController::class, 'filter'])->name('filter');
    Route::get('/{id}/share', [ProductController::class, 'share'])->name('share');
    Route::get('/{id}-{name}.html', [ProductController::class, 'showByName'])->name('showByName');
    Route::get('/{id}', [ProductController::class, 'showById'])->name('show');
    Route::put('/{id}', [ProductController::class, 'update']);
});

Route::name('categories.')->prefix('categories')->group(function () {
    Route::get('/{id}-{name}.html', [CategoryController::class, 'showByName'])->name('showByName');
    Route::get('/{id}', [CategoryController::class, 'showById'])->name('show');
});


Route::name('user.')->prefix('user')->middleware('auth', 'BannedMiddleware')->group(function () {

    /// CART
    Route::prefix('cart')->name('cart.')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('index');
        Route::get('/load', [CartController::class, 'loadCart'])->name('load');
        Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');
        Route::post('/confirm', [CartController::class, 'confirm'])->name('confirm');
        Route::delete('/remove', [CartController::class, 'remove'])->withoutMiddleware([VerifyCsrfToken::class])->name('remove');
        Route::post('/add-to-cart', [CartController::class, 'addToCart'])->withoutMiddleware([VerifyCsrfToken::class])->name('add');
    });


    /// DEPOSIT
    Route::prefix('deposit')->name('deposit.')->group(function () {
        Route::get('/', [PaymentController::class, 'deposit'])->name("index");
        Route::get('/{id}', [PaymentController::class, 'depositDetails'])->name("details");
        Route::post('/preview', [PaymentController::class, 'depositPreview'])->name("preview");
        Route::post('/confirm', [PaymentController::class, 'depositConfirm'])->name("confirm");
    });


    /// ORDER
    Route::prefix('orders')->name('order.')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name("index");
        Route::get('/details/{id}', [OrderController::class, 'details'])->name("details");
        Route::get('/report/{id}', [OrderController::class, 'report'])->name("report");
        Route::delete('/report/{id}', [OrderController::class, 'delete'])->name("delete");
        Route::post('/report/{id}', [OrderController::class, 'storeReport'])->name("reportSend");
    });


    /// SETTINGS
    Route::get('/setting', [UserController::class, 'setting'])->name('setting');
    Route::post('/setting/update', [UserController::class, 'settinglord'])->name('setting.update');


    /// UPGRADE
    Route::get('/upgrade', [UserController::class, 'upgrade'])->name('upgrade');
    Route::post('/upgrade/confirm', [UserController::class, 'confirmUpgrade'])->name('confirmUpgrade');


    /// OTHERS
    Route::get('/trans', [PaymentController::class, 'history'])->name('trans');

    Route::post('/giftcode/apply', [UserController::class, 'applyGiftCode'])->name('applyGiftCode');
});

// route admin
Route::name('admin.')->prefix('admin')->middleware('auth', 'checkLogin', 'BannedMiddleware')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });
    Route::get('/dashboard', [AdminController::class, 'Dashboard'])->name('dashboard');


    /// CATEGORIES
    Route::get('/categories', [CategoriesController::class, 'Categories'])->name('categories.index');
    Route::get('/categories/create', [CategoriesController::class, 'createCategories']);
    Route::post('/categories/create', [CategoriesController::class, 'storeCategories'])->name('storeCategory');
    Route::get('/categories/{id}/edit', [CategoriesController::class, 'editCategories']);
    Route::put('/categories/{id}/update', [CategoriesController::class, 'updateCategories']);
    Route::delete('/categories/{id}/delete', [CategoriesController::class, 'destroyCategories']);


    /// GATEWAYS
    Route::get('/gateways', [GatewayController::class, 'index'])->name('gateway.index');
    Route::get('/gateways/add', [GatewayController::class, 'add'])->name('gateway.add');
    Route::get('/gateway/{id}', [GatewayController::class, 'show'])->name('gateway.show');
    Route::post('/gateway/{id}/update', [GatewayController::class, 'update'])->name('gateway.update');
    Route::post('/gateway/store', [GatewayController::class, 'store'])->name('gateway.store');

    /// PRODUCTS
    Route::get('/products', [AdminProductController::class, 'index'])->name('product.index');
    Route::get('/products/{id}', [AdminProductController::class, 'show'])->name('product.show');
    Route::post('/products/{id}/remove', [AdminProductController::class, 'remove'])->name('product.remove');
    Route::post('/products/{id}/stop', [AdminProductController::class, 'stop'])->name('product.stop');


    /// ORDERS
    Route::get('/order-reports', [AdminOrderController::class, 'index'])->name('orders.index');
    Route::get('/order-reports/{id}', [AdminOrderController::class, 'show'])->name('orders.show');
    Route::get('/order-reports/{id}/contact', [AdminOrderController::class, 'contact'])->name('orders.contact');
    Route::post('/order-reports/{id}/approved', [AdminOrderController::class, 'approve'])->name('orders.approve');
    Route::post('/order-reports/{id}/rejected', [AdminOrderController::class, 'reject'])->name('orders.reject');

    /// DEPOSITS
    Route::get('/deposit', [DepositController::class, 'Deposit'])->name('deposit.index');
    Route::get('/deposit/{id}/edit', [DepositController::class, 'editDeposit']);
    Route::put('/deposit/{id}/accept', [DepositController::class, 'updateAcceptDeposit']);
    Route::put('/deposit/{id}/deny', [DepositController::class, 'updateDenyDeposit']);


    /// WITHDRAWS
    Route::get('/withdraw', [AdminWithdrawController::class, 'index'])->name('withdraw.index');
    Route::get('/deposit/{id}/edit', [AdminWithdrawController::class, 'editWithdraw']);
    Route::put('/deposit/{id}/accept', [AdminWithdrawController::class, 'updateAcceptWithdraw']);
    Route::put('/deposit/{id}/deny', [AdminWithdrawController::class, 'updateDenyWithdraw']);


    /// USERS
    Route::get('/users', [AdminUserController::class, 'User'])->name('user.index');
    Route::get('/users/admins', [AdminUserController::class, 'showAdmin'])->name('user.admin');
    Route::get('/users/sellers', [AdminUserController::class, 'showSeller'])->name('user.seller');
    Route::get('/users/upgrade_requests', [AdminUserController::class, 'upgradeRequests'])->name('user.upgrade_request');
    Route::post('/users/upgrade_requests/{id}/approve', [AdminUserController::class, 'upgradeRequestsApprove'])->name('user.upgrade_request.approve');
    Route::post('/users/upgrade_requests/{id}/reject', [AdminUserController::class, 'upgradeRequestsReject'])->name('user.upgrade_request.reject');
    Route::put('/user/ban/{id}', [AdminUserController::class, 'banUser']);
    Route::get('/user/edit/{id}', [AdminUserController::class, 'editUser']);
    Route::post('/user/update/{id}', [AdminUserController::class, 'updateUser'])->name('confirmUpdateUser');


    /// GIFTCODES
    Route::get('/giftcodes', [GiftCodeController::class, 'index'])->name('giftcode.index');
    Route::post('/giftcodes/store', [GiftCodeController::class, 'store'])->name('giftcode.store');
    Route::delete('/giftcode/{id}/remove', [GiftCodeController::class, 'remove'])->name('giftcode.remove');


    /// ADS
    Route::get('/ads', [AdsController::class, 'index'])->name('ads.index');
    Route::get('/ads/{id}', [AdsController::class, 'show'])->name('ads.detail');
    Route::post('/ads/{id}/delete', [AdsController::class, 'delete'])->name('ads.delete');
    Route::get('/ads/{id}/statistic', [AdsController::class, 'statistic'])->name('ads.statistic');


    /// OTHERS
    Route::get('/activities', [AdminController::class, 'activities'])->name('activities');
    Route::get('/transactions', [AdminController::class, 'transactions'])->name('transactions');

    Route::get('/search', [AdminUserController::class, 'searchUser']);
    Route::get('/web-config', [WebConfigController::class, 'index'])->name('webconfig.index');
    Route::put('/web-config/update', [WebConfigController::class, 'updateWebConfig'])->name('updateWebConfig');
});

// route seller
Route::name('seller.')->prefix('seller')->middleware('auth', 'BannedMiddleware')->group(function () {
    Route::get('/dashboard', [SellerController::class, 'Dashboard'])->name('index');

    Route::get('/products/my-product/edit/{id}', [SellerProductController::class, 'editProduct'])->name('myProduct.edit');
    Route::get('/products/create', [SellerProductController::class, 'createProduct'])->name('createProduct');
    Route::post('/products/store', [SellerProductController::class, 'storeProduct'])->name('storeProduct');
    Route::get('/products/history', [SellerProductController::class, 'history'])->name('products.history');
    Route::get('/products/my-product', [SellerProductController::class, 'myProduct'])->name('products.myProduct');
    Route::get('/products/my-product/update-ads/{id}', [SellerProductController::class, 'updateAds'])->name('products.updateAds');
    
    Route::post('/products/my-product/update/{id}', [SellerProductController::class, 'updateProduct'])->name('myProduct.update');

    Route::get('/withdraw', [WithDrawController::class, 'index'])->name('withdraw');
    Route::post('/withdraw/update', [WithDrawController::class, 'withdraw'])->name('withdraw.update');

    
    Route::get('/ads', [SellerAdsController::class, 'index'])->name('ads.index');
    Route::get('/ads/{id}', [SellerAdsController::class, 'show'])->name('ads.detail');
    Route::post('/ads/{id}/delete', [SellerAdsController::class, 'delete'])->name('ads.delete');
    Route::get('/ads/{id}/statistic', [SellerAdsController::class, 'statistic'])->name('ads.statistic');

    Route::get('/statistical', [SellerStatController::class, 'statistical'])->name('statistical');
});

Route::get('/f', function () {
    return view('test');
});

require __DIR__ . '/auth.php';
