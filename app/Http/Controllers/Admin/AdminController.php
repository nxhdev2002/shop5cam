<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Ads;
use App\Models\User;
use App\Models\Deposit;
use App\Models\Transaction;
use App\Models\UpgradeRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function Dashboard()
    {
        $totalUsers = User::where('rights', '<', 9)->count();

        $userRegisteredByMonth = array(
            User::whereMonth('created_at', '>=', 1)->whereMonth('created_at', '<=', 3)->count(),
            User::whereMonth('created_at', '>=', 4)->whereMonth('created_at', '<=', 6)->count(),
            User::whereMonth('created_at', '>=', 7)->whereMonth('created_at', '<=', 9)->count(),
            User::whereMonth('created_at', '>=', 10)->whereMonth('created_at', '<=', 12)->count(),
        );
        // $user = Auth::user();
        // $accountBalance = User::where('id', $user->id)->value('balance');
        $depositRequests = Deposit::where('status', 0)->count();

        $listDeposit = Deposit::all();

        $sellerReq = UpgradeRequest::all()->count();

        $adsRunning = Ads::where('status', 1)->get();

        $newUsers = User::take(5)->orderBy('created_at')->get();
        return view('admin.dashboard', compact(
            'totalUsers',
            'depositRequests',
            'listDeposit',
            'sellerReq',
            'newUsers',
            'adsRunning',
            'userRegisteredByMonth'
        ));
    }

    public function activities(Request $request)
    {
        $acts = ActivityLog::orderBy('created_at', 'desc')->paginate(10);

        if (strlen($request->start) > 0 && strlen($request->end) > 0) {
            $acts = ActivityLog::orderBy('created_at', 'desc')
                ->whereDate('created_at', '>=', Carbon::createFromFormat('m/d/Y', $request->start))
                ->whereDate('created_at', '<=', Carbon::createFromFormat('m/d/Y', $request->end))
                ->paginate(10)
                ->appends(request()->query());
        }
        return view('admin.frontend.adactivities', compact(
            'acts'
        ));
    }

    public function transactions(Request $request)
    {
        $trans = Transaction::orderBy('created_at', 'desc')->paginate(10);
        if (strlen($request->start) > 0 && strlen($request->end) > 0) {
            $trans = Transaction::orderBy('created_at', 'desc')
                ->whereDate('created_at', '>=', Carbon::createFromFormat('m/d/Y', $request->start))
                ->whereDate('created_at', '<=', Carbon::createFromFormat('m/d/Y', $request->end))
                ->paginate(10)
                ->appends(request()->query());
        }
        return view('admin.frontend.transactions', compact(
            'trans'
        ));
    }
}
