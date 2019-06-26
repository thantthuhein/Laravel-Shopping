<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\Product;
use App\Category;
use App\CreditpointsCard;

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
        $totalUsers = User::all();
        $totalOrders = Order::all();
        $totalOrders->transform(function($order, $key) {
            $order->cart = unserialize(base64_decode($order->cart));
            return $order;
        });
        // foreach ($totalOrders as $order) {
        //     dd($order->cart->totalPrice);
        // }
        $totalPrice = 0;
        foreach ($totalOrders as $order) {
            $totalPrice += $order->cart->totalPrice;
        }

        $totalPrepaidCards = CreditpointsCard::all();

        return view('/admin/dashboard', ['products' => $products, 'totalUsers' => $totalUsers, 'totalOrders' => $totalOrders, 'totalPrice' => $totalPrice, 'totalPrepaidCards' => $totalPrepaidCards]);
    }

    public function products()
    {
        $products = Product::all();
        return view('/admin/products', ['products' => $products]);
    }

    public function categories()
    {
        $categories = Category::all();
        return view('/admin/categories', ['categories' => $categories]);
    }

    public function users()
    {
        $users = \App\User::all();
        return view('/admin/users', ['users' => $users]);
    }

    public function showTotalOrders()
    {
        $orders = Order::latest()->paginate(20);
        $orders->transform(function($order, $key) {
            $order->cart = unserialize(base64_decode($order->cart));
            return $order;
        });
        return view('/admin/showTotalOrders',['orders' => $orders]);
    }

    public function orders()
    {
        return view('/admin/orders');
    }

    public function monthly_reports()
    {
        
    }

    public function getDate(Request $request) 
    {
        // dd($request->date);
        $time = strtotime($request->date);
        $date = date('d: D : M : Y', $time);
        // dd($date);
        $orders = \App\Order::whereDate('created_at', $request->date)->latest()->get();
        // $order = Order::first();
        // dd($order->created_at);
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

    public function cardsDetails()
    {
        $totalCards = CreditpointsCard::all();
        $useableCards = CreditpointsCard::where('useable', TRUE)->get();
        $usedCards = CreditpointsCard::where('useable', FALSE)->get();

        return view('/admin/creditcards', ['totalCards' => $totalCards, 'useableCards' => $useableCards, 'usedCards' => $usedCards]);
    }

}
