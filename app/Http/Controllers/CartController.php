<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\Order;
use App\User;
use Session;
use Auth;
use App\Http\Requests\StoreCheckout;

class CartController extends Controller
{
    public function getAddToCart(Request $request, $id)
    {
        $product = Product::find($id);
        if (0 == $product->quantity) {
            return redirect()->back()->with('error', "Out of Stock!");
        }
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
        // dd($cart);
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
        $user = User::find(auth()->user()->id);
        $cart = new Cart($oldCart);
        return view('checkout', [
            'user' => $user,
            'products' => $cart->items,
            'total' => $cart->totalPrice,
            'totalQty' => $cart->totalQty
        ]);
    }

    public function postCheckout(StoreCheckout $request)
    {
        $cart = Session::get('cart');
        // dd($cart->items);
        if ( !Session::has('cart')) {
            return redirect()->route('shoppingCart');
        }
        $cart = Session::get('cart');
        $user = User::find(Auth()->user()->id);
        // dd($user->credit_points);
        if ($user->credit_points < $cart->totalPrice) {
            return redirect()->back()->with('error', "Unsufficient Credit Points!");
        }

        $order = new Order();
        $order->user_id = Auth()->user()->id;
        $order->cart = base64_encode(serialize($cart));
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        $user->credit_points -= $cart->totalPrice;
        $user->save();
        $order->save();
        $request->session()->forget('cart');
        return redirect()->route('/')->with('success', 'Successfully Purchased Items');
    }

    public function getDeliver($id)
    {
        $order = Order::find($id);
        $order->is_delivered = true;
        $order->save();
        return redirect()->back();
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
