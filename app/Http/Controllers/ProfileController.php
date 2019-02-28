<?php

namespace App\Http\Controllers;
use App\User;
use App\Order;
use Session;
use App\Product;
use App\Cart;
use Auth;
use App\Http\Requests\StoreCheckout;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function getProfile()
    {
        $user = User::find(Auth()->user()->id);
        $orders = auth()->user()->orders;
        $orders->transform(function($order, $key) {
            $order->cart = unserialize(base64_decode($order->cart));
            return $order;
        });

        // dd($orders);

        return view('profile.page', ['user' => $user, 'orders' => $orders]);
    }

    public function getChangeInfo() 
    {
        $user = User::find(auth()->user()->id);
        return view('/profile/changeInfo', ['user' => $user]);
    }

    public function changeInfo(StoreCheckout $request)
    {
        $user = User::find(auth()->user()->id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
        return redirect('/getProfile')->with('success', "Changed Info Successfully");
    }

}
