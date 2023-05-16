<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
    }

    public function loadCart()
    {
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        $data = array();
        $temp = array();
        foreach ($carts as $value) {
            $temp['quantity'] = $value->quantity;
            $temp['id'] = $value->product_id;
            $temp['name'] = $value->product->name;
            $temp['picture_url'] = $value->product->picture_url;
            array_push($data, $temp);
        }
        $data = array(
            "success" => true,
            "message" => "Lấy thông tin giỏ hàng thành công!",
            "data" => $data
        );
        return response()->json($data);
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'bail|required|integer|gt:0',
            'quantity' => 'required|integer|gt:0'
        ]);

        $product_id = $request['product_id'];
        $quantity = $request['quantity'];

        $cart = Cart::where('user_id', auth()->user()->id)->where('product_id', $product_id)->first();
        $data = array();
        if ($cart) {
            $cart->quantity += $quantity;
            $cart->save();
            $data['append'] = 1;
        } else {
            $cart = new Cart();
            $cart->user_id = auth()->user()->id;
            $cart->product_id = $request['product_id'];
            $cart->quantity = $request['quantity'];
            $data['append'] = 0;
            $cart->save();
        }
        $data['success'] = true;
        $data['message'] = "Thêm vào giỏ hàng thành công!";
        return response()->json($data);
    }


    public function remove(Request $request)
    {
        $request->validate([
            'product_id' => 'bail|gte:0|integer'
        ]);

        $data = array();

        // check xem mat hang ton tai trong cart k.
        $cart = Cart::where('user_id', auth()->user()->id)
            ->where('product_id', $request['product_id'])
            ->first();
        if (!$cart) {
            $data['success'] = false;
            $data['message'] = "Mặt hàng không tồn tại trong giỏ hàng";
        } else {
            $cart->delete();
            $data['success'] = true;
            $data['message'] = "Xoá khỏi giỏ hàng thành công";
        }

        return response()->json($data);
    }
}
