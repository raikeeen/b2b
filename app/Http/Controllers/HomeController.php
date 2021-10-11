<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $newProducts = Product::latest()->take(10)->get();
        $soldProducts = Product::where('stock_shop', 0)->orWhere('stock_shop', null)->get();
        return view('home', [
            'newProducts' => $newProducts,
            'soldProducts' => $soldProducts
        ]);
    }
}
