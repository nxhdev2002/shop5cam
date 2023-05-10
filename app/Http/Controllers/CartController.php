<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function index()
    {
    }

    public function addToCart(Request $request)
    {
        $cart = new Cart();
        $cart->user_id = auth()->user()->id;
        $cart->product_id = $request['product_id'];
        $cart->quantity = $request['quantity'];
        $cart->save();

        $data = array(
            "success" => true,
            "message" => "Thêm vào giỏ hàng thành công!"
        );
        return response()->json($data);

        // echo json_encode($data);
    }
}
