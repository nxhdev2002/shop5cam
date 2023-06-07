<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Gateway;
use App\Models\GatewayCurrency;
use App\Models\GiftCode;
use App\Models\OrderReport;
use App\Models\ProductDetail;
use App\Models\Transaction;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminOrderController extends Controller
{
    public function index()
    {
        $reports = OrderReport::all();
        return view('admin.frontend.orders.index', compact(
            'reports'
        ));
    }

    public function show($id)
    {
        $report = OrderReport::find($id);
        if (!$report) abort(404);
        $order = $report->order;
        $success = true;
        $productDetails = array();
        $productDetailIds = json_decode($order->product_details_id);
        foreach ($productDetailIds as $productDetailId) {
            $productDt = ProductDetail::find($productDetailId);
            if (!$productDt) {
                $success = false;
            }
            array_push($productDetails, $productDt);
        }

        return view('admin.frontend.orders.show', compact(
            'order',
            'report',
            'productDetails',
            'success'
        ));
    }

    public function contact($id)
    {
        $report = OrderReport::find($id);
        if (!$report) abort(404);
        $report->status = 1;
        $report->save();

        return redirect("mailto:{{$report->user->email}}?subject=Reply for order report #{{$report->id}}");
    }

    public function approve(Request $request, $id)
    {
        $report = OrderReport::find($id);
        if (!$report) abort(404);
        DB::beginTransaction();
        try {
            $report->status = 2;
            $report->save();

            $report->order->status = -1;
            $report->order->save();

            $report->user->balance += $report->order->price;
            $report->user->save();

            $trans = new Transaction();
            $trans->user_id = $report->user->id;
            $trans->amount = $report->order->price;
            $trans->balance = $report->user->balance;
            $trans->note = "Hoàn tiền từ giao dịch #" . $report->order->id;
            $trans->type = "+";
            $trans->status = 1;
            $trans->save();

            $log = new ActivityLog();
            $log->user_id = auth()->user()->id;
            $log->detail = "Report #" . $report->id . " đã được hoàn tiền bởi " . auth()->user()->name;
            $log->save();

            DB::commit();
            return redirect()->back()->with('success', 'Hoàn tiền thành công');
        } catch (Exception $e) {
            DB::rollback();
            var_dump($e);
        }
    }

    public function reject(Request $request, $id)
    {
        $report = OrderReport::find($id);
        if (!$report) abort(404);
        DB::beginTransaction();
        try {
            $report->status = -1;
            $report->save();

            $trans = new Transaction();
            $trans->user_id = $report->user->id;
            $trans->amount = 0;
            $trans->balance = $report->user->balance;
            $trans->note = "Từ chối hoàn tiền từ giao dịch #" . $report->order->id;
            $trans->type = "+";
            $trans->status = 2;
            $trans->save();

            $log = new ActivityLog();
            $log->user_id = auth()->user()->id;
            $log->detail = "Report #" . $report->id . " đã bị từ chối bởi " . auth()->user()->name;
            $log->save();

            DB::commit();
            return redirect()->back()->with('success', 'Từ chối hoàn tiền thành công');
        } catch (Exception $e) {
            DB::rollback();
            var_dump($e);
        }
    }
}
