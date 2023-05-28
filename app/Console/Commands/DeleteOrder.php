<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Order;
use App\Models\ProductDetail;
use App\Models\Transaction;
use App\Models\WebConfig;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DeleteOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order:deleteNpay';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete expired orders and pay money for seller';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $settings = WebConfig::first();
        $orders = Order::getExpiredOrders();
        foreach ($orders as $order) {
            DB::beginTransaction();
            try {
                $fee = ($order->price * $settings->order_percent_fee / 100) + $settings->order_fixed_fee;

                $seller = User::find($order->product->seller->id);
                $seller->balance += ($order->price - $fee);
                $seller->save();

                $trans = new Transaction();
                $trans->user_id = $seller->id;
                $trans->amount = ($order->price - $fee);
                $trans->balance = $seller->balance;
                $trans->note = "Tiền nhận được từ đơn hàng #" . $order->id;
                $trans->type = "+";
                $trans->status = 1;
                $trans->save();

                $order->status = 0;
                $order->save();

                foreach (json_decode($order->product_details_id) as $product_detail) {
                    $prod = ProductDetail::find($product_detail);
                    $prod->delete();
                }

                echo "Đã xoá đơn hàng có ID " . $order->id . " khỏi hệ thống";
                DB::commit();
            } catch (Exception $e) {
                echo "Lỗi xảy ra: " . $e->getMessage();
                DB::rollBack();
            }
        }
    }
}
