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

    public function updateWebConfig(Request $request)
    {
        $request->validate([
            'upgrade_fee' => 'bail|required',
            'order_fixed_fee' => 'bail|required|gte:0',
            'order_percent_fee' => 'bail|required|gte:0',
            'notification_time' => 'bail|required|gte:0',
        ]);
        $webConfig = WebConfig::first();
        $webConfig->upgrade_fee = $request->input('upgrade_fee');
        $webConfig->order_fixed_fee = $request->input('order_fixed_fee');
        $webConfig->order_percent_fee = $request->input('order_percent_fee');
        $webConfig->notification_display_time = $request->input('notification_time');
        $webConfig->save();

        return response()->json([
            'success' => true,
            'message' => 'Cập nhật web config thành công'
        ]);
    }
}
