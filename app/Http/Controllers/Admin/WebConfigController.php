<?php

namespace App\Http\Controller\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WebConfig;

class WebConfigController extends Controller
{
    public function index()
    {
        $webConfig = WebConfig::first(); 
        return view('web-config.index', compact('webConfig'));
    }

    public function updateWebConfig(Request $request, $id){
        $webcf = WebConfig::find($id);
        $webcf->update_fee = $request->input('update_fee');
        $webcf->fixed_fee = $request->input('fixed_fee');
        $webcf->percent_fee = $request->input('percent_fee');
        $webcf->notification_time = $request->input('notification_time');
        $webcf->save();
        return redirect()->back()->with('success', 'Thông tin người dùng được cập nhật thành công');   
    }
}
