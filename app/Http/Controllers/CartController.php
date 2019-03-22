<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\Order;
use App\User;
use Session;
use App\Notifications\PurchasedSuccessful;
use Auth;
use App\Http\Requests\StoreCheckout;

class CartController extends Controller
{
    public function getAddToCart(Request $request, $id)
    {
        $product = Product::find($id);
        
        $oldCart = Session::has('cart') ? Session::get('cart') : NULL;
        $cart = new Cart($oldCart);
        
        if($cart->items !=NULL) {
            if(array_key_exists($id, $cart->items)) {
                $leftItems = $product->quantity - $cart->items[$id]['qty'];
                if ( $leftItems == 0) {
                    return redirect()->back()->with('error', "Out of Stock!");
                }
            }
        }
        $cart->add($product, $product->id);
        // $cart->toArray();
        // dd($cart);
        $request->session()->put('cart', $cart);
        // session()->flush();
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

    public function reduceOne($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : NULL;
        $cart = new Cart($oldCart);
        $cart->reduceOne($id);
        if (count($cart->items) > 0 ) {
            session()->put('cart', $cart);
        } else {
            session()->forget('cart', $cart);
        }
        return redirect()->back()->with('success', "Removed Item!");
    }

    public function reduceAll($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : NULL;
        $cart = new Cart($oldCart);
        $cart->reduceAll($id);
        if (count($cart->items) > 0 ) {
            session()->put('cart', $cart);
        } else {
            session()->forget('cart', $cart);
        }

        return redirect()->back()->with('success', "Removed Item!");
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
        foreach ( $cart->items as $item) {
            $product = Product::find($item['item']['id']);
            // dd($item['qty']);
            // dd($product->quantity);
            $product->quantity -= $item['qty'];
            $product->save();
            // dd($product->quantity);
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
        $user->notify(new PurchasedSuccessful());
        return redirect()->route('/')->with('success', 'Successfully Purchased Items');
    }

    public function getDeliver($id)
    {
        $order = Order::find($id);
        $order->is_delivered = true;
        $order->save();
        return redirect()->back();
    }
    
}
