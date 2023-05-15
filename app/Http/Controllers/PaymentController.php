<?php

namespace App\Http\Controllers;

use App\Models\Gateway;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function deposit()
    {
        $gateways = Gateway::all();
        $title = "Nạp tiền";
        return view('deposit.index', compact(
            'title',
            'gateways'
        ));
    }

    public function depositDetails($id)
    {
        $gateway = Gateway::find($id);
        if (!$gateway) {
            return redirect()->back()->withErrors(['message' => 'Cổng thanh toán không tồn tại']);
        }

        $title = $gateway->name;

        return view('deposit.detail', compact(
            'title',
            'gateway'
        ));
    }
}
