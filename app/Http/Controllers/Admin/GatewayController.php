<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gateway;
use App\Models\GatewayCurrency;
use App\Models\WebConfig;
use Illuminate\Http\Request;
use Cloudinary\Cloudinary;
use Cloudinary\Transformation\Resize;

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
            'name' => 'bail|min:1|max:50|required',
            'description' => 'bail|min:0|required',
            'content' => 'bail|required|min:0',
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

    public function add()
    {
        return view('admin.frontend.gateway.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'bail|required|min:0|max:50',
            'description' => 'bail|min:0|required',
            'content' => 'bail|required|min:0',
            'percent_fee' => 'bail|required|between:0,99.99|numeric',
            'fixed_fee' => 'bail|required|numeric|gte:0',
            'min_amount' => 'bail|required|numeric|gte:0',
            'max_amount' => 'bail|required|numeric|gte:' . $request['min_amount'],
            'thumb' => 'bail|required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        // $path = $request->file('thumb')->store('public/images');
        $cloudinary = new Cloudinary(json_decode(WebConfig::getCloudinaryConfig(), true));

        $file = $cloudinary->uploadApi()->upload(
            $request->file('thumb')->path(),
            ['public_id' => $request->file('thumb')->getClientOriginalName()]
        );


        $gateway = new Gateway();
        $gateway->name = $request['name'];
        $gateway->image = $file['url'];
        $gateway->status = 1;
        $gateway->description = $request['description'];
        $gateway->content = $request['content'];
        $gateway->save();

        $currency = new GatewayCurrency();
        $currency->gateway_id = $gateway->id;
        $currency->percent_fee = $request['percent_fee'];
        $currency->fixed_fee = $request['fixed_fee'];
        $currency->min_amount = $request['min_amount'];
        $currency->max_amount = $request['max_amount'];
        $currency->save();

        return redirect()->back()->with('success', 'Tạo gateway thành công!');
    }
}
