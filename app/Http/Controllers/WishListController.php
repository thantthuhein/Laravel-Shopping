<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

use Session;

class WishListController extends Controller
{
    public function add($id)
    {
        $product = Product::find($id);

        if(!$product) {
            abort(404);
        }
        $wishlist = session()->get('wishlist');

        if( isset( $wishlist[$id] ) ) {
            unset($wishlist[$id]);
            session()->put('wishlist', $wishlist);
            return redirect()->back()->with('success', 'Added to Wish List');
        }
        
        $wishlist[$id] = [
            'name' => $product->name,
            'price' => $product->price,
            'description' => $product->description
        ];
        session()->put('wishlist', $wishlist);
        return redirect()->back()->with('success', 'Added to Wish List');

    }

    public function list()
    {
        // dd(session('wishlist'));
        return view('wishlist');
    }

    public function remove($id) 
    {
        // session()->forget('wishlist');
        if($id or 0 == $id) {
            $wishlist = session()->get('wishlist');
            if( isset( $wishlist[$id])) {
                unset($wishlist[$id]);
                session()->put('wishlist', $wishlist);
            }
        }
        return redirect()->back();
    }
}
