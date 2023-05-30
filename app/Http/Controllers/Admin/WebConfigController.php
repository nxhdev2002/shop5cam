<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WebConfig;

class WebConfigController extends Controller
{
    public function index()
    {
        $webConfig = WebConfig::first(); 
        return view('admin.frontend.web-config', compact('webConfig'));
    }

    public function updateWebConfig(Request $request){
        $webConfig = WebConfig::first();
        $webConfig->upgrade_fee = $request->input('upgrade_fee');
        $webConfig->order_fixed_fee = $request->input('order_fixed_fee');
        $webConfig->order_percent_fee = $request->input('order_percent_fee');
        $webConfig->notification_display_time = $request->input('notification_display_time');
        $webConfig->save();
        return redirect()->back()->with('success', 'Cập nhật web config thành công');
    }
}
