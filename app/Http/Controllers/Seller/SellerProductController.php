<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\ProductDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Category;
use App\Models\WebConfig;
use Carbon\Carbon;
use Cloudinary\Cloudinary;
use Cloudinary\Transformation\Resize;


class SellerProductController extends Controller
{
    public function createProduct()
    {
        $categories = Category::where('status', 1)->get();
        return view('seller.frontend.newproduct', compact('categories'));
    }
    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'bail|required|min:0|max:50',
            'description' => 'bail|min:0|required',
            'category_id' => 'bail|required|numeric|gte:0',
            'thumb' => 'bail|required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'guarantee' => 'bail|min:0|nullable',
            'price' => 'bail|required|numeric|gte:0',
            'amount' => 'bail|required|numeric|gte:0',
        ]);

        $cloudinary = new Cloudinary(json_decode(WebConfig::getCloudinaryConfig(), true));

        $file = $cloudinary->uploadApi()->upload(
            $request->file('thumb')->path(),
            ['public_id' => Str::random()]
        );
        $user = Auth::user();

        $product = new Product;
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->content = $request->input('content');
        $product->seller_id = $user->id;
        $product->category_id = $request->input('category_id');
        $product->picture_url = $file['url'];
        $product->guarantee = Carbon::now()->addDays(7);
        $product->price = $request->input('price');
        $product->amount = $request->input('amount');
        $product->status = 1;
        $product->save();


        // $productDetail = new ProductDetail();
        // $productDetail->product_id = $product->id;
        // $productDetail->detail = $request->input('detail');
        // $productDetail->status = 1;
        // $productDetail->price = $request->input('price');
        // $productDetail->save();
        return redirect()->back()->with('success', 'Thêm thành công');
    }

    public function history()
    {
        $user = Auth::user();
        $history = Product::join('orders', 'products.id', '=', 'orders.product_id')
            ->select('products.*', 'orders.*')
            ->where('seller_id', $user->id)
            ->get();
        return view('seller.frontend.history', compact('history'));
    }

    public function myProduct()
    {
        $user = Auth::user();
        $myProduct = Product::where('seller_id', $user->id);
        return view('seller.frontend.myproduct.index', compact('myProduct'));
    }
}
