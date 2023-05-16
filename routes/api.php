<?php

use App\Models\Cart;
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

Route::get('/user', function (Request $request) {
    var_dump($request->user());
    return $request->user();
});
