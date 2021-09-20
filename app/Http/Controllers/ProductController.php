<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();
        return view('catalog.products',['products' => $products]);
    }

    public function detail(Request $request,$reference)
    {
        $product = Product::where('reference', $reference)->first();
        //$product = Product::all('reference')->first();
        return view('catalog.product', ['product' => $product]);
    }
}
