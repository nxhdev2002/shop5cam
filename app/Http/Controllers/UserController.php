<?php

namespace App\Http\Controllers;

use App\Models\GiftCode;
use App\Models\Transaction;
use App\Models\UpgradeRequest;
use App\Models\WebConfig;
use App\Models\User;
use Carbon\Carbon;
use Cloudinary\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function upgrade()
    {
        if (auth()->user()->rights != 1) {
            abort(404);
        }

        if (auth()->user()->email_verified_at == null) {
            return view('auth.verify-email', ['title' => 'Xác thực email']);
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
        $request->validate([
            'image' => 'bail|required|image|mimes:jpg,png,jpeg|max:2048',
        ]);
        $generalSettings = WebConfig::first();
        if (auth()->user()->balance < $generalSettings->upgrade_fee) {
            return redirect()->back()->withErrors(['Bạn không có đủ tiền để nâng cấp.']);
        }

        $requestExist = UpgradeRequest::where("user_id", auth()->user()->id)
            ->where("status", 0)
            ->first();

        if ($requestExist) {
            return redirect()->back()->withErrors(['Bạn đã gửi yêu cầu nâng cấp rồi.']);
        }

        $cloudinary = new Cloudinary(json_decode(WebConfig::getCloudinaryConfig(), true));

        $file = $cloudinary->uploadApi()->upload(
            $request->file('image')->path(),
            ['public_id' => Str::random()]
        );

        $upgRequest = new UpgradeRequest();
        $upgRequest->user_id = auth()->user()->id;
        $upgRequest->status = 0;
        $upgRequest->image = $file['url'];
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

    public function applyGiftCode(Request $request)
    {
        $request->validate([
            'giftcode' => 'bail|required|min:0'
        ]);

        $giftcode = GiftCode::where('code', $request['giftcode'])->first();

        if (!$giftcode) {
            return redirect()->back()->withErrors(['message' => 'Giftcode không tồn tại.']);
        }

        if ($giftcode->end_date < Carbon::now()) {
            return redirect()->back()->withErrors(['message' => 'Giftcode đã hết hạn sử dụng.']);
        }

        if ($giftcode->amount <= 0) {
            return redirect()->back()->withErrors(['message' => 'Giftcode đã hết số lượng sử dụng.']);
        }

        $used_user_id = json_decode($giftcode->used_user_id);

        if (in_array(auth()->user()->id, $used_user_id)) {
            return redirect()->back()->withErrors(['message' => 'Giftcode đã được sử dụng rồi.']);
        }

        $user = User::find(auth()->user()->id);
        $user->balance += $giftcode->balance;
        $user->save();
        array_push($used_user_id, $user->id);

        $trans = new Transaction();
        $trans->user_id = $user->id;
        $trans->amount = $giftcode->balance;
        $trans->balance = ($user->balance);
        $trans->note = "Nhận tiền từ giftcode: " . $giftcode->code;
        $trans->type = '+';
        $trans->status = 1;
        $trans->save();

        $giftcode->amount -= 1;
        $giftcode->used_user_id = json_encode($used_user_id);
        $giftcode->save();

        return redirect()->back()->with('success', 'Thêm thành công ' . number_format($giftcode->balance) . ' VNĐ từ Gifcode');
    }

    public function setting()
    {
        $title = "Thay đổi thông tin";
        return view('setting.setting', compact(
            'title'
        ));
    }
    public function settinglord(Request $request)
    {
        // Kiểm tra xác thực, quyền truy cập và xác thực dữ liệu
        $user = User::find(auth()->user()->id);
        // Lấy thông tin người dùng từ cơ sở dữ liệu
        // $user = User::setting($id);
        $request->validate([
            'name' => 'bail|required',
            'email' => 'bail|email',
            'phone' => 'bail|nullable|max:10|min:0',
            'oldPassword' => 'bail|nullable',
            'newPassword' => 'bail|nullable'
        ]);

        if (strlen($request['oldPassword']) > 0) {
            if (strlen($request['newPassword']) < 6) {
                return back()->withErrors(['message' => 'Trường newPassword không hợp lệ. Yêu cầu lớn hơn 6 kí tự.']);
            }
            if (!Hash::check($request->oldPassword, auth()->user()->password)) {
                return back()->withErrors(['message' => 'Sai mật khẩu']);
            }
            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($request->newPassword)
            ]);
        }
        // Cập nhật thông tin người dùng
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        // Các trường thông tin khác
        $user->phone = $request->input('phone');
        $user->payment = $request->input('payment');
        // Lưu lại thông tin người dùng
        $user->save();
        // Chuyển hướng người dùng về trang cần thiết (ví dụ: trang thông tin người dùng)
        return redirect()->back()->with('success', 'OK nhé');
    }
}
