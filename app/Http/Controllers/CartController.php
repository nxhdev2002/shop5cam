<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    public function index()
    {
        $title = "Giỏ hàng";
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        $total = 0;
        foreach ($carts as $value) {
            $total += $value->product->price * $value->quantity;
        }
        return view('cart.index', compact(
            'title',
            'carts',
            'total'
        ));
    }

    public function checkout(Request $request)
    {
        $title = "Checkout";
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        $total = 0;
        foreach ($carts as $value) {
            $total += $value->product->price * $value->quantity;
        }

        if ($total > auth()->user()->balance) {
            return redirect()->back()->withErrors('message', 'Bạn không có đủ số dư để thực hiện giao dịch');
        }

        return view('cart.checkout', compact(
            'total',
            'title',
            'carts'
        ));
    }

    public function confirm(Request $request)
    {
        $request->validate([
            'email' => 'bail|email|required',
            'name' => 'bail|required'
        ]);
        $carts = Cart::where('user_id', auth()->user()->id)->orderBy('id', 'ASC')->get();
        $total = 0;
        foreach ($carts as $key => $cart) {
            $total += $cart->product->price * $cart->quantity;
        }

        $user = User::find(auth()->user()->id);

        if ($total > auth()->user()->balance) {
            return redirect()->back()->withErrors('message', 'Bạn không có đủ số dư để thực hiện giao dịch');
        }

        DB::beginTransaction();
        try {
            foreach ($carts as $cart) {
                $current_time = Carbon::now();
                $order = new Order();
                $order->paydate = $current_time->addDays(7);
                $order->quantity = $cart->quantity;
                $order->status = 1;
                $order->price = $cart->product->price * $cart->quantity;
                $order->product_id = $cart->product_id;
                $order->customer_id = $user->id;

                $user->balance -= $cart->product->price * $cart->quantity;
                $user->save();


                $product = Product::find($cart->product->id);

                if ($cart->quantity > $product->amount) {
                    throw new Exception("Không đủ mặt hàng có sẵn trong kho.");
                }
                $product->amount -= $cart->quantity;
                $product->save();

                $productsDetails = ProductDetail::where('product_id', $product->id)
                    ->where('status', 0)
                    ->take($cart->quantity)
                    ->get();

                $productDetailIds = array();
                foreach ($productsDetails as $productDetail) {
                    $productDetail->status = 1;
                    $productDetail->save();
                    array_push($productDetailIds, $productDetail->id);
                }
                $order->product_details_id = json_encode($productDetailIds);
                $order->save();

                $trans = new Transaction();
                $trans->user_id = $user->id;
                $trans->amount = $cart->product->price * $cart->quantity;
                $trans->balance = $user->balance;
                $trans->note = "Thanh toán đơn hàng ID: " . $order->id;
                $trans->type = '-';
                $trans->status = 1;
                $trans->save();

                $cart->delete();

                $mail = new OrderMail($order, $request['email']);
                Mail::send($mail);
            }
        } catch (\Exception $e) {
            return redirect()->route('user.cart.index')->withErrors($e->getMessage());
            DB::rolback();
        }
        DB::commit();
        return redirect()->route('user.cart.index')->with('success', 'Thanh toán thành công');
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

        $data = array();
        $product = Product::find($product_id);

        if (!$product->status) {
            $data['success'] = false;
            $data['message'] = "Sản phẩm hiện đang ngừng bán.";
            return response()->json($data);
        }

        if ($product->amount < $quantity) {
            $data['success'] = false;
            $data['message'] = "Không đủ số lượng có sẵn trong kho.";
            return response()->json($data);
        }

        $cart = Cart::where('user_id', auth()->user()->id)->where('product_id', $product_id)->first();
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
