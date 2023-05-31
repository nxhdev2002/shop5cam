<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\UpgradeRequest;
use App\Models\WebConfig;
use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function upgrade()
    {
        if (auth()->user()->rights != 1) {
            abort(404);
        }
        $generalSettings = WebConfig::first();
        $title = "Nâng cấp thành viên";
        $request = UpgradeRequest::where("user_id", auth()->user()->id)
            ->where("status", 0)
            ->first();

        return view('upgrade.index', compact(
            'title',
            'generalSettings',
            'request'
        ));
    }

    public function confirmUpgrade(Request $request)
    {
        $generalSettings = WebConfig::first();
        if (auth()->user()->balance < $generalSettings->upgrade_fee) {
            return redirect()->back()->withErrors(['Bạn không có đủ tiền để nâng cấp.']);
        }

        $request = UpgradeRequest::where("user_id", auth()->user()->id)
            ->where("status", 0)
            ->first();

        if ($request) {
            return redirect()->back()->withErrors(['Bạn đã gửi yêu cầu nâng cấp rồi.']);
        }
        $upgRequest = new UpgradeRequest();
        $upgRequest->user_id = auth()->user()->id;
        $upgRequest->status = 0;
        $upgRequest->save();

        $user = User::find(auth()->user()->id);
        $user->balance -= $generalSettings->upgrade_fee;
        $user->save();

        $trans = new Transaction();
        $trans->user_id = auth()->user()->id;
        $trans->amount = $generalSettings->upgrade_fee;
        $trans->balance = $user->balance;
        $trans->note = "Yêu cầu nâng cấp lên người bán";
        $trans->type = '-';
        $trans->status = 0;
        $trans->save();

        return redirect()->back()->with('success', 'Gửi yêu cầu thành công. Bạn hãy kiên nhẫn đợi hệ thống xét duyệt nhé.');
    }

    public function setting()
    {
        return view('setting.setting');
    }
    public function settinglord(Request $request)
    {
        // Kiểm tra xác thực, quyền truy cập và xác thực dữ liệu
        $user = User::find(auth()->user()->id);
        // Lấy thông tin người dùng từ cơ sở dữ liệu
        // $user = User::setting($id);
    
        // Cập nhật thông tin người dùng
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        // Các trường thông tin khác
        $user->phone = $request->input('phone');
        $user->payment = $request->input('payment');
        // Lưu lại thông tin người dùng
        $user->save();
    
        // Chuyển hướng người dùng về trang cần thiết (ví dụ: trang thông tin người dùng)
        return redirect()->back()->with('success', 'OK nhé');
    }
}
