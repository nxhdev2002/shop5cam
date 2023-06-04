<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use Cloudinary\Cloudinary;
use Cloudinary\Transformation\Resize;

class SellerProductController extends Controller
{
    public function createProduct()
    {
        $category = Category::where('status', $category)->get();
        return view('',compact('category'));
    }
    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'bail|required|min:0|max:50',
            'description' => 'bail|min:0|required',
            'category_id' => 'bail|required|numeric|gte:0',
            'thumb' => 'bail|required|image|mimes:jpg,png,jpeg,gif,svg|max:1024',
            'guarantee' => 'bail|min:0|required',
            'price' => 'bail|required|numeric|gte:0',
            'amount' => 'bail|required|numeric|gte:0',
        ]);
        $product = new Product;
        $product->name = $request->input('name');
        $product->description = $request->input('description');
	    $user = Auth::user();
	    $product->seller_id = $user->id;
        //$category = Category::where('name', $categoryName)->first();
        // nhap danh muc dang text
	    // $categoryName = $request->input('category');
	    // $category = Category::findOrCreate(['name' => $categoryName], ['status' => 1]);
	    // $product->category_id = $category->id;
        $product->category_id = $request->input('category_id');
        $cloudinary = new Cloudinary(
            [
                'cloud' => [
                    'cloud_name' => 'dhcevvymr',
                    'api_key'    => '543482997368214',
                    'api_secret' => '2ThE9oQ7OSNq5q6mVTI4Ajplwog',
                ],
            ]
        );

        $file = $cloudinary->uploadApi()->upload(
            $request->file('thumb')->path(),
            ['public_id' => $request->file('thumb')->getClientOriginalName()]
        );
	    $product->guarantee = $request->input('guarantee');
	    $product->price = $request->input('price');
	    $product->amount = $request->input('amount');	
	    $product->save();	
        $productDetail = new ProductDetail();
        $productDetail->product_id = $product->id;
        $productDetail->detail = $request->input('detail');
        $productDetail->status = 1;
        $productDetail->price = $request->input('price');
        $productDetail->save();
    }

    public function history(){
	    $user = Auth::user();
        $history = Product::join('orders', 'products.id', '=', 'orders.product_id')
               ->select('products.*', 'orders.*')
               ->where('seller_id',$user->id)
               ->get();
               return view('', compact('history'));
    }

    public function inventory(){
        $user = Auth::user();
        $inventory = Prouduct::where('seller_id',$user->id);
        return view('', compact('inventory'));
}
}