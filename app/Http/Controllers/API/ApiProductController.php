<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;
use App\Http\Resources\Product as ProductResource;
use App\Http\Controllers\Controller;

class ApiProductController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $products = Product::orderBy('created_at','desc')->paginate(5);
        return ProductResource::collection($products);

        /*$products = Product::all();
        return view('catalog.products',['products' => $products]);*/
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
     * @return ProductResource
     */
    public function store(Request $request)
    {
        $product = new Product;

        $product->name = $request->input('name');
        $product->reference = $request->input('reference');
        $product->supplier_reference = $request->input('supplier_reference');
        $product->description = $request->input('description');
        $product->short_description = $request->input('short_description');
        $product->price = $request->input('price');
        $product->discount_product = $request->input('discount_product');
        $product->stock_shop = $request->input('stock_shop');

        if($product->save()){
            return new ProductResource($product);
        }

        return null;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return ProductResource
     */
    public function show($id)
    {
        //$product = Product::findOrFail($id);
        $product = Product::where('reference',$id)->first();
        if (!isset($product)){
            $product = Product::findOrFail($id);
        }
        return new ProductResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd(Product::find(1)->discount);
        $user = 3;
        //$user = Auth::user()->id;
        $product = Product::find(1)->totalMargin($user);
        dd($product);

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
        $product = Product::find($id);
        $product->update($request->all());
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return ProductResource
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->delete()){
            return new ProductResource($product);
        }
        //return Product::destroy($id);
    }

    public function detail(Request $request,$reference)
    {
        $product = Product::where('reference', $reference)->first();
        //$product = Product::all('reference')->first();
        return view('catalog.product', ['product' => $product]);
    }

    public function search($name)
    {
        $product = Product::where('name', 'like', '%'.$name.'%')->get();

        if(isset($product)) {
        return Product::where('reference', 'like', '%'.$name.'%')->get();
    }
        return Product::where('name', 'like', '%'.$name.'%')->get();
    }
}
