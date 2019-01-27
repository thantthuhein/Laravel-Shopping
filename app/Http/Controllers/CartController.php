<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

use Session;

class CartController extends Controller
{
    public function add($id)
    {
        $product = Product::find($id);
        if (! $product) {
            abort(404);
        }
        $cart = session()->get('cart');

        if(!$cart) {
            $cart = [
                $id = [
                    'name' => $product->name,
                    'quantity' => 1,
                    'maxQuantity' => $product->quantity,
                    'price' => $product->price,
                    'description' => $product->description  
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Added to Cart');
        }

        if( isset( $cart[$id] ) ) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Added to Cart');
        }

        $cart[$id] = [
            'name' => $product->name,
            'quantity' => 1,
            'maxQuantity' => $product->quantity,
            'price' => $product->price,
            'description' => $product->description
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('successs', 'Added to Cart');

    }
    public function list(Request $request)
    {
        $total = 0;
        // dd(session('cart'));
        return view('cart', ['total' => $total] );
    }
    
    public function remove($id) 
    {
        if($id or 0 == $id) {
            $cart = session()->get('cart');
            if( isset($cart[$id]) ) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
        }   
        // session()->forget('success', 'Product removed successfully');
        return redirect()->back()->with('remove', 'Removed');
    }
}
