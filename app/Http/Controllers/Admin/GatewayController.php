<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gateway;
use Illuminate\Http\Request;

class GatewayController extends Controller
{
    public function index()
    {
        $title = "Gateways";
        $gateways = Gateway::paginate(20);
        return view('admin.frontend.gateway.index', compact('gateways', 'title'));
    }

    public function show($id)
    {
        $gateway = Gateway::find($id);
        if (!$gateway) {
            return redirect()->route('admin.gateway.index')->withErrors(['message' => 'Gateway không tồn tại']);
        }
        $title = $gateway->name;
        return view('admin.frontend.gateway.detail', compact('gateway', 'title'));
    }

    public function update(Request $request, $id)
    {
        $gateway = Gateway::find($id);
        if (!$gateway) {
            return redirect()->route('admin.gateway.index')->withErrors(['message' => 'Gateway không tồn tại']);
        }
        $request->validate([
            'name' => 'bail|min:1|max:100|required',
            'description' => 'bail|min:0|required',
            'content' => 'bail|required',
            'status' => 'bail|nullable',
        ]);

        $status = isset($request->status) ? 1 : 0;


        $gateway->name = $request['name'];
        $gateway->description = $request['description'];
        $gateway->status = $status;
        $gateway->content = $request->content;
        $gateway->save();

        return redirect()->back()->with('success', 'Cập nhật gateway thành công.');
    }
}
