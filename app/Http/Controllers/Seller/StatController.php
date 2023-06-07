<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class StatController extends Controller
{
    public function stat()
    {
        $prodByMonth = array(
            Product::whereMonth('created_at', '>=', 1)->whereMonth('created_at', '<=', 3)->count(),
            Product::whereMonth('created_at', '>=', 4)->whereMonth('created_at', '<=', 6)->count(),
            Product::whereMonth('created_at', '>=', 7)->whereMonth('created_at', '<=', 9)->count(),
            Product::whereMonth('created_at', '>=', 10)->whereMonth('created_at', '<=', 12)->count(),
        );
        return view('seller.frontend.stat');
    }
}
