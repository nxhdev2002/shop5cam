<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->back()->withErrors('Bạn phải đăng nhập để tiếp tục');
        }
        $data = array();
        $data['orders'] = Order::where('customer_id', auth()->user()->id)->get();
        return view('order.index', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|integer',
            'quantity' => 'required|integer',
        ]);

        if (!$validated) {
            return;
        }
        // lay user hien tai
        $user = User::find(auth()->user()->id);
        if (!$user) {
            return;
        }

        // lay product tu db
        $product = Product::find($request['product_id']);

        $dt = Carbon::now();
        $order = new Order();

        $fee = $product->price * $order->quantity;

        if ($user->balance < $fee) {
            return;
        }

        $order->paydate = $dt->addDays(7);
        $order->quantity = $request['quantity'];
        $order->status = 1;
        $order->price = $product->price * $order->quantity;
        $order->product_id = $product->id;
        $order->customer_id = $user->id;
        $order->save();

        // tru tien user
        $user->balance -= $fee;
        $user->save();

        // tru so luong product
        $product->quantity -= $order->quantity;
        $product->save();

        return view('order.index');
    }

    public function report(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|integer',
        ]);

        if (!$validated) {
            return;
        }
    }
}
