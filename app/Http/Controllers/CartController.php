<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\Order;
use Session;
use App\Http\Requests\StoreCheckout;

class CartController extends Controller
{
    public function getAddToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : NULL;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
        return redirect()->back()->with('success', "Added To Cart");
    }

    public function getCart()
    {
        if(! Session::has('cart')) {
            return view('ShoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('ShoppingCart', [
            'products' => $cart->items, 
            'totalPrice' => $cart->totalPrice
        ]);
    }

    public function getCheckout()
    {
        if (! Session::has('cart')) {
            return view('ShoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('checkout', [
            'products' => $cart->items,
            'total' => $cart->totalPrice,
            'totalQty' => $cart->totalQty
        ]);
    }

    public function postCheckout(StoreCheckout $request)
    {
        if ( !Session::has('cart')) {
            return redirect()->route('shoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $request->address;
        $request->phone;
        
    }
    
    // public function remove($id) 
    // {
    //     if($id or 0 == $id) {
    //         $cart = session()->get('cart');
    //         if( isset($cart[$id]) ) {
    //             unset($cart[$id]);
    //             session()->put('cart', $cart);
    //         }
    //     }   
    //     // session()->forget('success', 'Product removed successfully');
    //     return redirect()->back()->with('remove', 'Removed');
    // }
}
