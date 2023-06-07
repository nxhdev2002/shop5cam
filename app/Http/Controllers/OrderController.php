<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Cart;
use App\Models\OrderReport;
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
        $data['title'] = "Lịch sử đơn hàng";
        $data['orders'] = Order::where('customer_id', auth()->user()->id)->get();
        return view('order.index', $data);
    }

    public function details(Request $request, $id)
    {
        $title = "Chi tiết giao dịch #" . $id;
        $success = true;
        $order = Order::find($id);
        if (!$order) {
            return redirect()->back()->withErrors('message', 'Đơn hàng không tồn tại.');
        }

        if ($order->customer_id !== auth()->user()->id) {
            if (empty($request->hash)) {
                abort(404);
            }

            if ($request->hash !== $order->hash) {
                abort(404);
            }
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

    public function report(Request $request, $id)
    {
        $order = Order::find($id);
        if (!$order) {
            return redirect()->back()->withErrors(['message', 'Đơn đặt hàng không tồn tại.']);
        }
        if ($order->customer_id !== auth()->user()->id) {
            if (empty($request->hash)) {
                abort(404);
            }

            if ($request->hash !== $order->hash) {
                abort(404);
            }
        }

        $title = "Báo cáo đơn đặt hàng #" . $order->id;

        $report = OrderReport::where('user_id', auth()->user()->id)->where('order_id', $order->id)->first();
        if ($report) {
            $exist = true;
        } else {
            $exist = false;
        }
        return view('order.report', compact(
            'title',
            'order',
            'report',
            'exist'
        ));
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'bail|required|gte:0',
        ]);

        $report = OrderReport::find($request['id']);
        if (!$report) {
            return response()->json(
                [
                    'message' => 'Đơn đặt hàng không tồn tại.',
                    'success' => false
                ],
                400
            );
        }

        $report->delete();
        return response()->json(
            [
                'message' => 'Xoá đơn báo cáo thành công.',
                'success' => true
            ]
        );
    }

    public function storeReport(Request $request)
    {
        $request->validate([
            'id' => 'bail|required|gte:0',
            'message' => 'bail|required|max:255|min:15'
        ]);

        $order = Order::find($request['id']);
        if (!$order) {
            return redirect()->back()->withErrors(['message', 'Đơn đặt hàng không tồn tại.']);
        }

        $report = new OrderReport();
        $report->user_id = auth()->user()->id;
        $report->order_id = $order->id;
        $report->details = $request['message'];
        $report->status = 0;
        $report->save();

        return redirect()->back()->with('success', 'Gửi báo cáo thành công. Hệ thống sẽ xem xét và liên hệ với bạn sớm.');
    }
}
