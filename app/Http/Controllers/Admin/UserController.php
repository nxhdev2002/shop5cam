<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function User(){
        $user = User::all();
        return view( 'admin.frontend.user',compact('user'));      
    }
    public function editUser($id){
        $user = User::find($id);
        return view('admin.frontend.user.edit', ['user' => $user]);   
    }
    public function updateUser(Request $request, $id){
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->payment = $request->input('payment');
        $user->balance = $request->input('balance');
        $user->rights = $request->input('rights');
        $user->update();
        return redirect()->route('admin.frontend.user')->with('success', 'Thông tin người dùng được cập nhật thành công');   
    }
    public function destroyUser($id){
        $user = User::find($id);   
        $user->delete();
        return redirect()->route('admin.frontend.user')->with('success', 'Thông tin người dùng đã bị xóa');   
    }
    public function searchUser(Request $request){
        $search = $request->input('search');
        $user = User::where('name', 'like', '%' . $search . '%')
            ->orWhere('rights', 'like', '%' . $search . '%')
            ->get();
        return view('admin.frontend.user', ['user' => $user]);   
    }
}
