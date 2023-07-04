<?php

use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::post('/cart/add-to-cart', function (Request $request) {
    // $request->validate();
    var_dump($request->user());
    // $cart = new Cart();
    // $cart->user_id = ;
    // $cart->product_id = $request['product_id'];
    // $cart->quantity = $request['quantity'];
    // $cart->save();

    // die("ok");
    // $data = array(
    //     "success" => true,
    //     "message" => "Thanh cong"
    // );

    // echo json_encode($data);
});


Route::post('/seller/product/store', function (Request $request) {

    $prods = json_decode(base64_decode($request->detail));

    $product = new Product();
    $product->description = $request->description;
    $product->name = $request->name;
    $product->content = $request->content;
    $product->seller_id = 1;
    $product->category_id = 4;
    $product->picture_url = $request->picture_url;
    $product->price = $request->price;
    $product->amount = count($prods);
    $product->status = 1;
    $product->save();

    foreach ($prods as $prod) {
        $productDetail = new ProductDetail();
        $productDetail->product_id = $product->id;
        $productDetail->detail = $prod;
        $productDetail->status = 0;
        $productDetail->save();
    }
});

Route::get('/user', function (Request $request) {
    var_dump($request->user());
    return $request->user();
});
