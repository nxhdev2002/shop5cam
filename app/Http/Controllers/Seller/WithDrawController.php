<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\WithDraw;
class WithDrawController extends Controller
{
    public function index(){
        $title = "Rút tiền";
        $user = Auth::user();
        $users = User::where('id', $user->id)->first();
        $balance = $users->balance;
        $withDraw= WithDraw::where('user_id',$user->id)->get();
        return view('seller.frontend.withdraw',compact('balance','withDraw','title'));
    }
    public function withdraw(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
            'payment'=>'required|numeric|min:0',

        ]);
        $user = Auth::user();
        $amount = $request->input('amount');
        if ($user->balance < $amount) {
            return redirect()->route('seller.withdraw')->withErrors(['message' => 'Số dư không đủ']);
        }
        // Tạo đối tượng WithDraw và lưu thông tin rút tiền
        $withdraw = new WithDraw();
        $withdraw->user_id = $user->id;
        $withdraw->amount = $amount;
        $withdraw->note = "Rút " . number_format($amount) . " VNĐ.";
        $withdraw->status = 0;
        $withdraw->save();
        
        $transaction = new Transaction();
        $transaction->amount = 0;
        $transaction->user_id = auth()->user()->id;
        $transaction->balance = auth()->user()->balance;
        $transaction->note = "Yêu cầu rút " . number_format($amount) . " VNĐ.";
        $transaction->type = "-";
        $transaction->status = 0;
        $transaction->save();

        // Trừ số tiền từ tài khoản
        // $user->balance -= $amount;
        // $user->payment = $request->input('payment');
        // $user->save();
        // return redirect()->route('seller.withdraw')->with('success', 'Rút tiền thành công');
        return redirect()->route('seller.withdraw')->with(
            'success',
            'Gửi yêu cầu rút lên hệ thống thành công. Kiểm tra tại lịch sử giao dịch nhé'
        );
    }
}