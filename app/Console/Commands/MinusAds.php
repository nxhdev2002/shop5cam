<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class MinusAds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:minusAds';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'minus money ads';

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
        $webconfig= WebConfig::first();
        $users = DB::table('ads')
            ->select('users.')
            ->join('users', 'ads.user_id', '=', 'users.id')
            ->where('ads.status','=','1')
            ->distinct()
            ->get();
        foreach ($users as $user) {
            $totalPriceAds = $user->ads()->sum('price');
            if ($totalPriceAds <= $user->balance) {
                $user->ads()->price -= $webconfig->ads_fee;
                $countAds = $user->ads()->count();
                $user->balance -= $webconfig->ads_fee * $countAds;
                $user->save();
            } else {
                $user->ads()->status = 0;
                $user->ads()->products()->is_ads = 0;
                $user->save();
            }
        }
    }
}
