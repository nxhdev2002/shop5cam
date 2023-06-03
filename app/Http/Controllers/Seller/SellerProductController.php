<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;

class SellerProductController extends Controller
{
    public function createProduct()
    {
        return view('seller.frontend.newproduct');
    }
    public function storeProduct(Request $request)
    {
        $product = new Product;
        $product->name = $request->input('name');
        $product->description = $request->input('description');
	    $user = Auth::user();
	    $product->seller_id = $user->id;
	    $categoryName = $request->input('category');
	    //$category = Category::where('name', $categoryName)->first();
	    $category = Category::findOrCreate(['name' => $categoryName], ['status' => 1]);
	    $product->category_id = $category->id;
	    $product->guarantee = $request->input('guarantee');
	    // $validatedData = $request->input('image')->validate([
        //  'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        // ]);
        // $name = $request->file('image')->getClientOriginalName();
        // $path = $request->file('image')->store('public/images');
        // $Img = new Photo;
        // $Img->name = $name;
        // $Img->path = $path;
	    // $product->picture_url = $path;
	    $product->price = $request->input('price');
	    $product->amount = $request->input('amount');	
	    $product->save();	
    }

    public function history(){
	    $user = Auth::user();
	    $history = DB::table('orders')
    		->join('products', 'products.id', '=', 'orders.product_id')
    		->where('seller_id', '=', $user->id)
    		->get();
	return view('seller.frontend.history', compact('history'));
    }

    public function myproduct(){
        return view('seller.frontend.myproduct');
    }

}
