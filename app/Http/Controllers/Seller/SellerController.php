<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    public function Dashboard() 
    {
	$user = Auth::user();
	$totalOrders = DB::table('orders')
    		->join('products', 'products.id', '=', 'orders.product_id')
    		->select(DB::raw('COUNT(*) as total_orders'))
    		->where('seller_id', '=', $user->id)
    		->first();	
    $accountBalance = User::where('id', $user->id)->value('balance');					
	$revenue = DB::table('orders')
    		->join('products', 'products.id', '=', 'orders.product_id')
    		->select(DB::raw('SUM(orders.price) as revenue_seller'))
    		->where('seller_id', '=', $user->id)
    		->first();
    return view('seller.dashboard', compact('totalOrders','accountBalance','revenue'));

    }
}
