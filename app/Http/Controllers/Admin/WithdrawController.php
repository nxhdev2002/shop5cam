<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Deposit;
use App\Models\Gateway;
use App\Models\GatewayCurrency;
use App\Models\Transaction;
use App\Models\Withdraw;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    public function index()
    {
        $withdraws = Withdraw::where('status', 0)->paginate(5);
        return view('admin.frontend.withdraw', compact('withdraws'));
    }
    public function editWithdraw($id)
    {
        $withdraw = Withdraw::find($id);
        return view('admin.frontend.deposit', ['withdraw' => $withdraw]);
    }
    public function updateAcceptWithdraw($id)
    {
        $deposit = Deposit::find($id);
        $deposit->status = 1;
        $deposit->update();
        $gateway = GatewayCurrency::find($deposit->gateway->id);
        $fee = $gateway->fixed_fee + ($deposit->amount * $gateway->percent_fee / 100);

        $amount = $deposit->amount - $fee;

        $user = $deposit->user;
        $user->balance += $amount;
        $user->save();

        $transaction = new Transaction();
        $transaction->amount = $amount;
        $transaction->user_id = $user->id;
        $transaction->balance =  $user->balance;
        $transaction->note = "Duyệt yêu cầu nạp " . number_format($deposit->amount) . " VNĐ ";
        $transaction->type = "+";
        $transaction->status = 1;
        $transaction->save();

        $log = new ActivityLog();
        $log->user_id = auth()->user()->id;
        $log->detail = "Yêu cầu nạp #" . $deposit->id . " đã được accepted bởi " . auth()->user()->name;
        $log->save();

        return redirect()->back()->with('success', 'Yêu cầu nạp tiền được cập nhật thành công');
    }
    public function updateDenyWithdraw(Request $request, $id)
    {
        $deposit = Deposit::find($id);
        $deposit->status = 2;
        $deposit->save();

        $user = $deposit->user;

        $transaction = new Transaction();
        $transaction->amount = 0;
        $transaction->user_id = $user->id;
        $transaction->balance = $user->balance;
        $transaction->note = "Từ chối yêu cầu nạp " . number_format($deposit->amount) . " VNĐ ";
        $transaction->type = "+";
        $transaction->status = 2;
        $transaction->save();

        $log = new ActivityLog();
        $log->user_id = auth()->user()->id;
        $log->detail = "Yêu cầu nạp #" . $deposit->id . " đã bị rejected bởi " . auth()->user()->name;
        $log->save();

        return redirect()->back()->with('success', 'Yêu cầu nạp tiền được cập nhật thành công');
    }
}
