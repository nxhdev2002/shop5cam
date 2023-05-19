<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Cart;
use App\Models\ProductDetail;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $data = array();
        $data['orders'] = Order::where('customer_id', auth()->user()->id)->get();
        return view('order.index', $data);
    }

    public function details($id)
    {
        $title = "Chi tiết giao dịch #" . $id;
        $success = true;
        $order = Order::find($id);
        if (!$order) {
            return redirect()->back()->withErrors('message', 'Đơn hàng không tồn tại.');
        }

        $productDetails = array();
        $productDetailIds = json_decode($order->product_details_id);
        foreach ($productDetailIds as $productDetailId) {
            $productDt = ProductDetail::find($productDetailId);
            if (!$productDt) {
                $success = false;
            }
            array_push($productDetails, $productDt);
        }

        return view('order.detail', compact(
            'order',
            'title',
            'productDetails',
            'success'
        ));
    }
}
