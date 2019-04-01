<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
// use App\Student;
use App\Wishlist;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductStore;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function example()
    // {
    //     return view('example');
    // }

    public function home()
    {
        return view('home');
    }

    public function index()
    {
        if(auth()->check()) {
            $list;
            $wishlists = auth()->user()->wishlists;
            foreach($wishlists as $wishlist) {
                $list[] = $wishlist->product_id;
            }
        }
        // dd($list);
        $categories = Category::all();
        $products = Product::latest()->paginate(6);
        if(isset($list)) {
            return view('products.index', ['products' => $products, 'categories' => $categories, 'list' => $list]);
        } else {
            return view('products.index', ['products' => $products, 'categories' => $categories]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->all();
        return view('products.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStore $request)
    {
        // dd($request->all());
        // $request->validate([
        //     'name' => 'required',
        //     'description' => 'required',
        //     'price' => 'required',
        //     'quantity' => 'required'
        // ]);
        
        // $specifications = [
        //     'releasedate' => $request->releasedate,            
        //     'weight' => $request->weight,            
        //     'colors' => $request->colors,            
        //     'material' => $request->material,            
        //     'os' => $request->os,            
        //     'size' => $request->size,            
        //     'resolution' => $request->resolution,            
        //     'processor' => $request->processor,
        //     'ram' => $request->ram,
        //     'storage' => $request->storage,
        //     'webcamera' => $request->webcamera,
        //     'keyboardlight' => $request->keyboardlight,
        //     'touchpad' => $request->touchpad,
        //     'speakers' => $request->speakers,
        //     'usbports' => $request->usbports,
        //     'hdmpport' => $request->hdmpport,
        //     'headphonejack' => $request->headphonejack,
        // ];
        $product = Product::create( $request->all() );

        // dd($product->categories()->sync($request->category_id));
        $product->categories()->sync($request->category_id);
        
        return redirect('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        if(auth()->check()) {
            $list;
            $wishlists = auth()->user()->wishlists;
            foreach($wishlists as $wishlist) {
                $list[] = $wishlist->product_id;
            }
        }
        // dd($list);
        if(isset($list)) {
            return view('products.show', ['product' => $product, 'list' => $list]);
        } else {
            
            return view('products.show', ['product' => $product]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // Select Box Render Data
        $categories = Category::pluck('name', 'id')->all();

        $selected_categories = $product->categories->pluck('id')->all();

        if (!auth()->user()->is_Admin) {
            return redirect('/');
        }
           
        return view('products.edit', [
            'product' => $product,
            'categories' => $categories,
            'selected_categories' => $selected_categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductStore $request, Product $product)
    {
        // dd($request->all());
        // dd($product);
        $product->update( $request->all() );
        $product->categories()->sync($request->category_id);
        return redirect('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // dd($product);
        $product->delete();
        return redirect()->back();
    }
}
