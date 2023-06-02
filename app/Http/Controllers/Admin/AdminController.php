<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use App\Models\User;
use App\Models\Deposit;
use App\Models\UpgradeRequest;

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
}
