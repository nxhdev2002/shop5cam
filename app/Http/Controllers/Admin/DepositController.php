<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use Illuminate\Http\Request;

class DepositController extends Controller 
{
    public function Deposit(){
        $deposit = Deposit::where('status', 0)->paginate(5);
        return view( 'admin.frontend.deposit',compact('deposit'));    
    }
    public function editDeposit($id){
        $deposit = Deposit::find($id);
        return view('admin.frontend.deposit', ['deposit' => $deposit]);
    }
    public function updateAcceptDeposit($id){
        $deposit = Deposit::find($id);
        $deposit->status = 1;
        $deposit->update(); 
        // $user = User::find($id);
        $user = $deposit->user;
        $user->balance += $deposit->amount;
        $user->save();
        return redirect()->back()->with('success', 'Yêu cầu nạp tiền được cập nhật thành công');
    }
    public function updateDenyDeposit(Request $request, $id){
        $deposit = Deposit::find($id);
        $deposit->status = 2; 
        $deposit->save(); 
        return redirect()->back()->with('success', 'Yêu cầu nạp tiền được cập nhật thành công');   
    }
}