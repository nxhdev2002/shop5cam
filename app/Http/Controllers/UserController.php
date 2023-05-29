<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\UpgradeRequest;
use App\Models\WebConfig;
use App\Models\User;
use Illuminate\Http\Request;

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
}
