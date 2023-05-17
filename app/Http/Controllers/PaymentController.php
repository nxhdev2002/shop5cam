<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\Gateway;
use App\Models\GatewayCurrency;
use App\Models\Transaction;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function history()
    {
        $title = "Lịch sử giao dịch";
        $trans = Transaction::where("customer_id", auth()->user()->id)->orderBy('created_at', 'DESC')->paginate(10);
        return view("transaction.index", compact(
            'trans',
            'title'
        ));
    }

    public function deposit()
    {
        $gateways = Gateway::all();
        $title = "Nạp tiền";
        return view('deposit.index', compact(
            'title',
            'gateways'
        ));
    }

    public function depositDetails($id)
    {
        $gateway = Gateway::find($id);
        if (!$gateway) {
            return redirect()->back()->withErrors(['Không tồn tại gateway']);
        }
        $gatewayCurrency = GatewayCurrency::where("gateway_id", $gateway->id)->first();

        $title = $gateway->name;

        return view('deposit.detail', compact(
            'title',
            'gateway',
            'gatewayCurrency'
        ));
    }

    public function depositPreview(Request $request)
    {
        $title = "Preview";
        $gateway = Gateway::find($request['gateway']);
        $amount = $request['amount'];
        $gatewayCurrency = GatewayCurrency::where("gateway_id", 1)->first();

        $request->validate([
            'amount' => 'bail|integer|required|gte:' . $gatewayCurrency->min_amount . '|lte:' . $gatewayCurrency->max_amount,
            'gateway' => 'bail|required|gte:0'
        ]);

        $total_charge = $gatewayCurrency->fixed_fee + ($amount * $gatewayCurrency->percent_fee / 100);
        $total = $amount - $total_charge;
        return view('deposit.preview', compact(
            'gateway',
            'gatewayCurrency',
            'amount',
            'total',
            'title'
        ));
    }

    public function depositConfirm(Request $request)
    {

        $amount = $request['amount'];
        $gatewayCurrency = GatewayCurrency::where("gateway_id", 1)->first();

        $request->validate([
            'amount' => 'bail|integer|required|gte:' . $gatewayCurrency->min_amount . '|lte:' . $gatewayCurrency->max_amount,
            'gateway' => 'bail|integer|gte:0|required'
        ]);

        $total_charge = $gatewayCurrency->fixed_fee + ($amount * $gatewayCurrency->percent_fee / 100);

        $deposit = new Deposit();
        $deposit->user_id = auth()->user()->id;
        $deposit->gateway_id = $request['gateway'];
        $deposit->amount = $amount;
        $deposit->fee = $total_charge;
        $deposit->status = 0;
        $deposit->save();

        $transaction = new Transaction();
        $transaction->amount = 0;
        $transaction->user_id = auth()->user()->id;
        $transaction->balance = auth()->user()->balance;
        $transaction->note = "Yêu cầu nạp " . number_format($amount) . " VNĐ.";
        $transaction->type = "+";
        $transaction->status = 0;
        $transaction->save();

        return redirect()->route('user.deposit.index')->with(
            'success',
            'Gửi yêu cầu nạp lên hệ thống thành công. Kiểm tra tại lịch sử giao dịch nhé'
        );
    }
}
