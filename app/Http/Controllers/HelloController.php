<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HelloController extends Controller
{
    public function __construct()
    {
    }

    public function hello()
    {
        // $user = User::find();

        if (auth()->user()) {
            return view("welcome");
        } else {
            echo "chua dn";
        }
    }

    public function postHello(Request $request)
    {


        $email = $request->email1;

        $user = User::where("email", "huyqlht@gmail.com")->first();
        $user->name = "Vu huu minh";
        $user->save();

        return view("welcome", array(
            'email' => $email
        ));
    }
}
