<?php

namespace App\Http\Controllers;

use App\Models\Img;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\API\ApiProductController;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
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
            })->paginate(20);

        } else {
            $products = Product::orderBy('created_at','desc')->paginate(20);
        }

        if(request()->search != '') {

            $products = ApiProductController::search(request());
            $getProduct = $products->map(function ($product){
                return $product->reference;
            })->toArray();

            $products = Product::whereIn('reference', $getProduct)->paginate(20)->appends(request()->query());
        }
        if(request()->analog != '') {

            $reference =  array_reverse(ApiProductController::analog(request()));

            $products = Product::whereIn('reference', $reference)->paginate(200)->appends(request()->query());
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
        )->paginate(20);

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

        if($product === null) {
            return abort(404);
        }
        //dd($product->img);
        return view('catalog.product', [
            'product' => $product,
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
    public function addImage(Request $request, $id)
    {
        $file = $request->file('file');
        $imageName = time() . strtoupper(Str::random(5)) . '.' . $file->extension();
        $path = 'storage/products/common_images';
        $file->move(public_path($path), $imageName);

        $imageDb = new Img();
        $imageDb->name = $path.'/'.$imageName;
        $imageDb->product_id = $id;
        $imageDb->save();

        return response()->json($imageName);
    }

    public function deleteImage(Request $request, $id)
    {
        $path = public_path('storage/products/common_images/').$request->id;
        File::delete($path);

        $imageDb = Img::where('name', 'storage/products/common_images/'.$request->id)->delete();
        return response()->json(['success' => $request->id]);
    }
}
