<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\WebConfig;
class MinusSeller extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:minusSeller';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Minus money of seller ';

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
        $users = User::where('rights',3);
        foreach ($users as $user ){
            $webConfig = WebConfig::first();
            if ($webConfig->upgrade_fee <= $user->payment){
                $user->payment-=$webConfig->upgrade_fee;
                $user->save();
            }else{
                $user->rights = 1;
                $user->products()->status = 0;
                $user->save();
                echo "Xin vui lòng nạp thêm tiền để tiếp tục làm người bán";
        }
        }
        
    }
}
