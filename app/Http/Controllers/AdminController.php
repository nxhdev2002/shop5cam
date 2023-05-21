<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Deposit;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function Dashboard()
    {
        $totalUsers = User::where('rights','<', 9)->count();
        // $user = Auth::user();
        // $accountBalance = User::where('id', $user->id)->value('balance');
        $depositRequests = Deposit::where('status', 0)->count();
        $listDeposit = Deposit::all();
        return view('admin.index', compact('totalUsers','depositRequests','listDeposit'));
    }
    public function Categories(){
        $category = Category::all();
        return view( 'admin.categories',compact('category'));
    }
    public function createCategories(){
        return view('admin.categories.create');
    }
    public function storeCategories(Request $request){
        $category = new Category;
        $category->name = $request->input('name');
        $category->status = $request->input('status');
        $category->created_at = $request->input('created_at');
        $category->save();
        return redirect()->route('admin.Categories')->with('success', 'Danh mục được thêm thành công');    
    }
    // public function editCategories($id){
    //     $category = Category::find($id);
    //     return view('admin.categories.edit', ['category' => $category]);
    // }
    public function updateCategories(Request $request, $id){
        $category = Category::find($id);
        $category->name = $request->input('name');
        // $category->status = $request->input('status');
        // $category->created_at = $request->input('created_at');
        $category->update();
        return redirect()->route('admin.Categories')->with('success', 'Danh mục được cập nhật thành công');   
    }   
    public function destroyCategories($id){
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('admin.Categories')->with('success', 'Danh mục đã bị xóa');
    }
    public function Deposit(){
        $listDeposit = Deposit::all();
        return view( 'admin.deposit',compact('listDeposit'));    
    }
    public function updateAcceptDeposit(Request $request, $id){
        $deposit = Deposit::find($id);
        $deposit->status = 1; 
        $deposit->update(); 
        // $user = User::find($id);
        $user = $deposit->user;
        $user->balance += $deposit->amount;
        $user->update();
        return redirect()->route('admin.Deposit')->with('success', 'Yêu cầu nạp tiền được cập nhật thành công');
    }
    public function updateDenyDeposit(Request $request, $id){
        $deposit = Deposit::find($id);
        $deposit->status = 2; 
        $deposit->update(); 
        return redirect()->route('admin.Deposit')->with('success', 'Yêu cầu nạp tiền được cập nhật thành công');   
    }
    public function User(){
        $user = User::paginate(5);
        return view( 'admin.user',compact('user'));     
    }
    public function editUser($id){
        $user = User::find($id);
        return view('admin.user.edit', ['user' => $user]);   
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
        return redirect()->route('admin.User')->with('success', 'Thông tin người dùng được cập nhật thành công');   
    }
    public function destroyUser($id){
        $user = User::find($id);   
        $user->delete();
        return redirect()->route('admin.User')->with('success', 'Thông tin người dùng đã bị xóa');   
    }
    public function searchUser(Request $request){
        $search = $request->input('search');
        $user = User::where('name', 'like', '%' . $search . '%')
            ->orWhere('rights', 'like', '%' . $search . '%')
            ->get();
        return view('admin.user', ['user' => $user]);   
    }
}