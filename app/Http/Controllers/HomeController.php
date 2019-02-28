<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use Session;
use App\Product;
use App\Cart;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function admin()
    {
        $products = Product::all();
        return view('admin/dashboard', ['products' => $products]);
    }

    public function getDate(Request $request)
    {
        // dd($request->date);
        $time = strtotime($request->date);
        $date = date('D:M:Y', $time);

        $orders = Order::whereDate('created_at', $request->date)->get();
        // dd($orders);
        $orders->transform(function($order, $key) {
            $order->cart = unserialize(base64_decode($order->cart));
            return $order;
        });
        
        // to find total amount of selling per day
        $totalAmount = 0;
        foreach($orders as $order) {
            $totalAmount += $order->cart->totalPrice;
        }
        
        return view('/admin/orders', ['orders' => $orders, 'date' => $date, 'totalAmount' => $totalAmount]);
    }

    public function orders()
    {
        return view('admin/orders');
    }


    public function categories()
    {
        $categories = Category::all();
        return view('admin/categories', ['categories' => $categories]);
    }

    public function users()
    {
        $users = DB::table('users')->latest()->get();
        return view('admin/users', ['users' => $users]);
    }


    public function index()
    {
        $user = User::find(Auth()->user()->id);
        $orders = auth()->user()->orders;
        $orders->transform(function($order, $key) {
            $order->cart = unserialize(base64_decode($order->cart));
            return $order;
        });
        return view('profile.page', ['user' => $user, 'orders' => $orders]);
    }
}
