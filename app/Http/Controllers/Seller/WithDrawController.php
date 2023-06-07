<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class WithDrawController extends Controller
{
    public function withdraw(){
        return view('seller.frontend.withdraw');
    }
}
