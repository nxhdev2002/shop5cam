<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Gateway;
use App\Models\GatewayCurrency;
use App\Models\GiftCode;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::where('is_removed', 0)->paginate(10);
        return view('admin.frontend.products.index', compact(
            'products'
        ));
    }

    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->back()->withErrors(['message' => "Product không tồn tại trong hệ thống."]);
        }

        return view('admin.frontend.products.show', compact(
            'product'
        ));
    }

    public function remove($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->back()->withErrors(['message' => "Product không tồn tại trong hệ thống."]);
        }
        if ($product->is_removed) {
            return redirect()->back()->withErrors(['message' => "Product đã bị xoá rồi."]);
        }

        $product->is_removed = 1;
        $product->save();

        $log = new ActivityLog();
        $log->user_id = auth()->user()->id;
        $log->detail = "Sản phẩm #" . $product->id . ": " . $product->name . " đã bị xoá bởi " . auth()->user()->name;
        $log->save();

        return redirect()->back()->with('success', 'Xoá sản phẩm thành công.');
    }

    public function stop($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->back()->withErrors(['message' => "Product không tồn tại trong hệ thống."]);
        }
        if ($product->is_removed) {
            return redirect()->back()->withErrors(['message' => "Product đã bị xoá rồi."]);
        }

        $product->status = 0;
        $product->save();

        $log = new ActivityLog();
        $log->user_id = auth()->user()->id;
        $log->detail = "Sản phẩm #" . $product->id . ": " . $product->name . " đã ngừng bán bởi " . auth()->user()->name;
        $log->save();

        return redirect()->back()->with('success', 'Ngừng sản phẩm thành công.');
    }
}
