<?php

namespace App\Http\Controllers;
use App\User;
use App\Order;
use Session;
use App\Product;
use App\Cart;
use Auth;

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
}
