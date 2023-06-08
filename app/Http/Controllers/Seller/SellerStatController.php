<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SellerStatController extends Controller
{
    public function Statistical(){
        $user = Auth::user();
        //số đơn hàng theo danh mục 
        $categories = Category::all();

        $result = [];
    
        foreach ($categories as $category) {
            $soldOrdersCount = 0;
            foreach ($category->products as $product) {
                $soldOrdersCount += $product->orders()->count();
            }
    
            $result[] = [
                'category' => $category->name,
                'soldOrdersCount' => $soldOrdersCount,
            ];
        }
        //doanh thu theo tháng
        $revenueRegisteredByMonth = array(
            DB::table('orders')
    		->join('products', 'products.id', '=', 'orders.product_id')
    		->select(DB::raw('SUM(orders.price) as revenue_seller'))
    		->where('seller_id', '=', $user->id)
            ->whereMonth('created_at', '>=', 1)->whereMonth('created_at', '<=', 3)
            ->whereYear('created_at',Carbon::now()->year)
    		->first(),
            DB::table('orders')
    		->join('products', 'products.id', '=', 'orders.product_id')
    		->select(DB::raw('SUM(orders.price) as revenue_seller'))
    		->where('seller_id', '=', $user->id)
			->whereMonth('created_at', '>=', 4)->whereMonth('created_at', '<=', 6)
            ->whereYear('created_at',Carbon::now()->year)
    		->first(),
            DB::table('orders')
    		->join('products', 'products.id', '=', 'orders.product_id')
    		->select(DB::raw('SUM(orders.price) as revenue_seller'))
    		->where('seller_id', '=', $user->id)
			->whereMonth('created_at', '>=', 7)->whereMonth('created_at', '<=', 9)
            ->whereYear('created_at',Carbon::now()->year)
    		->first(),
            DB::table('orders')
    		->join('products', 'products.id', '=', 'orders.product_id')
    		->select(DB::raw('SUM(orders.price) as revenue_seller'))
    		->where('seller_id', '=', $user->id)
			->whereMonth('created_at', '>=', 10)->whereMonth('created_at', '<=', 12)
            ->whereYear('created_at',Carbon::now()->year)
    		->first(),

		);
        return view('seller.frontend.stat', compact('result','revenueRegisteredByMonth'));
        // compact('result','revenueRegisteredByMonth')
    }
}
