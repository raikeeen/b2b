<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Myrzan\TecDocClient\Client;
use Myrzan\TecDocClient\Generated\GetArticleDirectSearchAllNumbersWithState;
use Myrzan\TecDocClient\Generated\GetArticleLinkedAllLinkingTarget3;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        if(request()->category) {
            $products = Product::with('category')->whereHas('category', function ($query) {
                $query->where('slug', request()->category);
            })->paginate(5);

        } else {
            $products = Product::orderBy('created_at','desc')->paginate(5);
        }

        if(request()->sort === 'low_high') {
            $products->setCollection(
                collect(
                    collect($products->items())->sortBy('price')
                )->values()
            );
        } elseif(request()->sort === 'high_low') {
            $products->setCollection(
                collect(
                    collect($products->items())->sortByDesc('price')
                )->values()
            );
        }

        return view('catalog.products', [
            'products' => $products,
        ]);
    }

    public function newProduct()
    {
        $products = Product::where(
            'created_at', '>=', Carbon::now()->subMonth()->toDateTimeString()
        )->paginate(5);

        return view('catalog.products', [
            'products' => $products,
        ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($reference)
    {
        $product = Product::where('reference', $reference)->first();
        $tecdoc = new TecDocController;

       /* $data = $tecdoc->getCarsAndOecodes($product->supplier_reference);*/

        return view('catalog.product', [
            'product' => $product,
/*            'cars' => (!empty($data) or !empty($data['cars']))  ? $data['cars'] : [],
            'oeCodes' => (!empty($data) or !empty($data['oeCodes'])) ? $data['oeCodes']: []*/
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
