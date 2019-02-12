<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

use App\Category;

use DB;

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
    public function admin()
    {
        $products = Product::all();
        return view('admin/dashboard', ['products' => $products]);
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
        return view('home');
    }
}
