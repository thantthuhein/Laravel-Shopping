<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wishlist;
use App\Product;

class WishListController extends Controller
{
    public function add($id)
    {   
        $product = Product::find($id);
        // $item = Wishlist::where('product_id', $product->id)->first();
        $item = auth()->user()->wishlists->where('product_id', $product->id)->first();
        // dd($item);
        
        if ( ! $item ) {
            // add to wishlist
            $wishlist = new Wishlist();
            $wishlist->product_id = $product->id;
            $wishlist->name = $product->name;
            $wishlist->price = $product->price;
            // dd($product->wishlist);
            if( auth()->check() ) {
                $wishlist->user_id = auth()->user()->id;
            } else {
                $wishlist->user_id = NULL;
            }
            $wishlist->save();

            // dd($wishlist);
            return redirect()->back()->with('success', "Added To Wish List");
        } else {
            // remove if already exists
            $item->delete();
            return redirect()->back()->with('error', "Removed From Wish List");
        }

    }

    public function list()
    {
        $wishlists = auth()->user()->wishlists;
        // dd( $wishlist );
        // dd($products);
        return view('wishlist', ['wishlists' => $wishlists]);
    }

    public function remove($id) 
    {
        $product = Product::find($id);
        // dd($product->id);
        $wishlist = Wishlist::where('product_id', $product->id)->first();
        // dd($wishlist);
        $wishlist->delete();
        return redirect()->back()->with('success', "Success !");
    }
}
