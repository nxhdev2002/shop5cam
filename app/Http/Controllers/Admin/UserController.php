<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function User()
    {
        $user = User::paginate(5);
        return view('admin.frontend.user', compact('user'));
    }
    public function editUser($id)
    {
        $user = User::find($id);
        return view('admin.frontend.user.edit', ['user' => $user]);
    }
    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->payment = $request->input('payment');
        $user->balance = $request->input('balance');
        $user->is_banned = intval($request->input('is_banned'));
        $user->rights = $request->input('rights');
        $user->save();
        return redirect()->back()->with('success', 'Cập nhật thành công.');
    }
    public function banUser($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Người dùng không tồn tại!'
            ]);
        }
        $user->is_banned = 1;
        $user->save();
        return response()->json([
            'success' => true,
            'message' => 'Đã cấm người dùng!.'
        ]);
    }
    public function searchUser(Request $request)
    {
        $search = $request->input('search');
        $user = User::where('name', 'like', '%' . $search . '%')
            ->orWhere('rights', 'like', '%' . $search . '%')
            ->get();
        return view('admin.frontend.user', ['user' => $user]);
    }
}