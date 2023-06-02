<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gateway;
use App\Models\GatewayCurrency;
use App\Models\GiftCode;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GiftCodeController extends Controller
{
    public function index()
    {
        $giftcodes = GiftCode::paginate(10);
        return view('admin.frontend.giftcode', compact(
            'giftcodes'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'bail|required|min:1|max:15',
            'end_date' => 'bail|date|required',
            'balance' => 'bail|required|min:0',
            'amount' => 'bail|required|min:1|integer'
        ]);
        if (GiftCode::where('code', $request['code'])) {
            return redirect()->back()->withErrors(['message' => 'Giftcode đã tồn tại rồi.']);
        }
        $giftcode = new GiftCode();
        $giftcode->code = $request['code'];
        $giftcode->end_date = Carbon::parse($request['end_date'])->format('Y-m-d H:i:s');
        $giftcode->balance = $request['balance'];
        $giftcode->amount = $request['amount'];
        $giftcode->save();

        return redirect()->back()->with('success', 'Thêm giftcode thành công!');
    }

    public function remove($id)
    {
        $giftcode = GiftCode::find($id);
        if (!$giftcode) {
            return response()->json([
                'success' => false,
                'message' => 'Gift code không tồn tại!'
            ]);
        }
        $giftcode->delete();
        return response()->json([
            'success' => true,
            'message' => 'Xoá thành công!'
        ]);
    }
}
