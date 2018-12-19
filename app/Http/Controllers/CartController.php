<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

class CartController extends Controller
{
    public function cart(Request $request) 
    {
        session()->push('products', $request->product_id);
        return redirect('products');
    }

    public function list() 
    {
        $products = Product::whereIn('id', session('products'))->get();
        return view('cart', ['products' => $products]);
    }
}
