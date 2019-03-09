<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class SearchController extends Controller
{
    // public function searchProducts(Request $request)
    // {
    //     // dd($request->search);
    //     $categories = Category::all();
    //     $searchProducts = Product::where('name', 'like', '%' . $request->search . '%')->get();
    //     dd($searchProducts);
    //     return view('/search', ['searchProducts' => $searchProducts]);
    // }    

    public function index()
    {
        $products = Product::all();
        return view('/search', ['products' => $products]);
    }

    public function showResult(Request $request)
    {
        $results = Product::where('name', 'like', '%' . $request->search . '%')->get();
        return view('/showResults', ['results' => $results]);
    }

    public function searchByCategory($id)
    {
        $category = Category::find($id);
        $products = $category->products;
        // dd($products);
        return view('/searchByCategory', ['category' => $category, 'products' => $products]);
    }
}
