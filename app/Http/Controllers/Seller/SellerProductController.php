<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Ads;
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
        $title = "Tạo sản phẩm mới";
        $categories = Category::where('status', 1)->get();
        return view('seller.frontend.newproduct', compact('categories','title'));
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
            'detail' => 'required'
        ]);

        $cloudinary = new Cloudinary(json_decode(WebConfig::getCloudinaryConfig(), true));

        $file = $cloudinary->uploadApi()->upload(
            $request->file('thumb')->path(),
            ['public_id' => Str::random()]
        );
        $user = Auth::user();

        $prods = json_decode(base64_decode($request->detail));

        $product = new Product;
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->content = $request->input('content');
        $product->seller_id = $user->id;
        $product->category_id = $request->input('category_id');
        $product->picture_url = $file['url'];
        $product->guarantee = Carbon::now()->addDays(7);
        $product->price = $request->input('price');
        $product->amount = count($prods);
        $product->status = 1;
        $product->save();

        foreach ($prods as $prod) {
            $productDetail = new ProductDetail();
            $productDetail->product_id = $product->id;
            $productDetail->detail = $prod;
            $productDetail->status = 0;
            $productDetail->save();
        }

        return redirect()->back()->with('success', 'Thêm thành công');
    }

    public function history()
    {
        $user = Auth::user();
        $title = "Lịch sử bán hàng";
        $history = Product::join('orders', 'products.id', '=', 'orders.product_id')
            ->join('users', 'users.id', '=', 'orders.customer_id')
            ->select('products.*', 'orders.*', 'users.name as user_name', 'orders.price')
            ->where('seller_id', $user->id)
            ->get();
        return view('seller.frontend.history', compact('history','title'));
    }

    public function myProduct()
    {
        $user = Auth::user();
        $title = "Sản phẩm của tôi";
        $myProduct = Product::where('seller_id', $user->id)->where('status', 1)->get();
        return view('seller.frontend.myproduct.index', compact('myProduct','title'));
    }
    public function editProduct($id)
    {
        $title = "Chỉnh sửa sản phẩm";
        $product = Product::find($id);
        return view('seller.frontend.myproduct.edit', compact('product','title'));
    }

    public function updateProduct(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->status = $request->input('status');
        // $product->guarantee = $request->input('guarantee');
        $product->update();
        return redirect()->route('seller.products.myProduct')->with('success', 'Sản phẩm được cập nhật thành công');
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->back()->withErrors(['message' => 'Sản phẩm không tồn tại']);
        }

        $product->status = 0;
        $product->save();
        return redirect()->route('seller.products.myProduct')->with('success', 'Xoá thành công.');
    }
    

    public function updateAds($id){
        $product = Product::find($id);
        if ($product-> is_ads ==1){
            return redirect()->back()->withErrors(['message' => 'Đã tồn tại ads']);
        }else
        {$product-> is_ads = 1;
        $product -> save();
        $ads = Ads::where('product_id',$product->id)->first();
        $user = Auth::user();
        $webconfig= WebConfig::first();
        if (!$ads) {
            $add_ads = new Ads;
            $add_ads-> name = $product ->name;
            $add_ads->user_id =$user->id;
            $add_ads->product_id =$product->id;
            $add_ads->status =1;
            $add_ads->price=$webconfig->ads_fee;
            $add_ads-> expired_at =now()->addMonths(intval($add_ads->price / $webconfig->ads_fee));
            $add_ads -> save();
        } else {$ads->status = 1;
                $ads->save();}
        $user->payment-=$webconfig->ads_fee;
        return redirect()->back()->with('success', 'Đã thêm sản phẩm chạy quảng cáo');
    }
    }
}
