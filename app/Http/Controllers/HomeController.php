<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(auth()->user()->id);
        $orders = $user->orders;
        return view('/profile/page', ['user' => $user, 'orders' => $orders]);
    }

    public function admin()
    {
        $products = \App\Product::all();
        return view('/admin/dashboard', ['products' => $products]);
    }

    public function categories()
    {
        $categories = \App\Category::all();
        return view('/admin/categories', ['categories' => $categories]);
    }

    public function users()
    {
        $users = \App\User::all();
        return view('/admin/users', ['users' => $users]);
    }

    public function orders()
    {
        return view('/admin/orders');
    }

    public function getDate(Request $request) 
    {
        // dd($request->all());
        $time = strtotime($request->date);
        $date = date('D:M:Y');
        
        $orders = \App\Order::whereDate('created_at', $request->date)->get();
        // dd($orders);
        $orders->transform(function($order, $key) {
            $order->cart = unserialize(base64_decode($order->cart));
            return $order;
        });
        $totalAmount = 0;
        foreach($orders as $order) {
            $totalAmount += $order->cart->totalPrice;
        }
        return view('/admin/orders', ['orders' => $orders, 'date' => $date, 'totalAmount' => $totalAmount]);
    }
}
