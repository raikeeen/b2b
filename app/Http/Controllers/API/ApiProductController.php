<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\TecDocController;
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

    static function search(Request $request)
    {

        $name = $request->search;
        $limit = null;

        if(!isset($request->flag)) {
            $limit = 20;
        }

        if(strlen($name) > 3) {

            $product = \DB::table('product')->where('reference', 'like', $name . '%')->select(['name','reference'])->get();

            if(!$product->isEmpty()) {

                return $product;

            }

            $product = \DB::table('product')->where('supplier_reference', 'like', $name . '%')->select(['name','reference'])->get();

            if(!$product->isEmpty()) {

                return $product;

            }

            $searchTecDoc = (new TecDocController)->search($name);

            if(!empty($searchTecDoc)) {
                $allCodes = [];

                foreach ($searchTecDoc as $item) {

                    array_push($allCodes, $item->getArticleNo());
                }

                $productIdFirst = \DB::table('oe_code')
                    ->where('code', 'like', $name . '%')
                    ->leftJoin('product', function($join) {
                        $join->on('oe_code.product_id', '=', 'product.id');
                    })
                    ->select(['supplier_reference'])
                    ->limit($limit)
                    ->get()->toArray();
                foreach ($productIdFirst as $item) {
                    array_push($allCodes, $item->supplier_reference);
                }



                $productIdSecond = \DB::table('oe_code')
                    ->where('code', 'like', trim($name) . '%')
                    ->leftJoin('product', function($join) {
                        $join->on('oe_code.product_id', '=', 'product.id');
                    })
                    ->select(['supplier_reference'])
                    ->limit($limit)
                    ->get()->toArray();
                foreach ($productIdSecond as $item) {
                    array_push($allCodes, $item->supplier_reference);
                }

                //array_unique($allCodes, SORT_STRING);

                $allCodes = array_unique($allCodes, SORT_REGULAR);

                //return \DB::table('product')->whereIn('id', [$productIdFirst, $productIdSecond])->select(['name','reference'])->get();

                $product = \DB::table('product')->whereIn('supplier_reference', $allCodes)->select(['name','reference'])->limit($limit)->get();

                if (!empty($product))
                    return $product;
            }

            if($product->isEmpty()) {
                $allCodes = [];
                $productIdFirst = \DB::table('oe_code')
                    ->where('code', 'like', $name . '%')
                    ->leftJoin('product', function($join) {
                        $join->on('oe_code.product_id', '=', 'product.id');
                    })
                    ->select(['supplier_reference'])
                    ->limit($limit)
                    ->get()->toArray();

                $productIdSecond = \DB::table('oe_code')
                    ->where('code', 'like', trim($name) . '%')
                    ->leftJoin('product', function($join) {
                        $join->on('oe_code.product_id', '=', 'product.id');
                    })
                    ->select(['supplier_reference'])
                    ->limit($limit)
                    ->get()->toArray();

                if(count($productIdFirst) >0 || count($productIdSecond) >0) {



                if (count($productIdFirst) > 1)
                foreach ($productIdFirst as $item) {
                    array_push($allCodes, $item->supplier_reference);
                } elseif(isset($productIdFirst[0]->supplier_reference)) {
                    array_push($allCodes,$productIdFirst[0]->supplier_reference);
                }

                if (count($productIdSecond) > 1)
                foreach ($productIdSecond as $item) {
                    array_push($allCodes, $item->supplier_reference);
                }  elseif(isset($productIdSecond[0]->supplier_reference)) {
                    array_push($allCodes,$productIdSecond[0]->supplier_reference);
                }

                //array_unique($allCodes, SORT_STRING);

                $allCodes = array_unique($allCodes, SORT_REGULAR);

                //return \DB::table('product')->whereIn('id', [$productIdFirst, $productIdSecond])->select(['name','reference'])->get();

                $product = \DB::table('product')->whereIn('supplier_reference', $allCodes)->select(['name','reference'])->limit($limit)->get();
                return $product;

                }
            }

            $explodeName = explode(' ',$name);

            if(count($explodeName) < 4) {
                switch (count($explodeName)) {
                    case 1:
                        $product = \DB::table('product')
                            ->where('name', 'like', '%' . $name . '%')
                            ->select(['name', 'reference'])
                            ->limit($limit)
                            ->get();
                        break;
                    case 2:
                        $product = \DB::table('product')
                            ->where('name', 'like', '%' . $name . '%')
                            ->orWhere('name', 'like', '%' . $explodeName[0] . '%' . $explodeName[1] . '%')
                            ->orWhere('name', 'like', '%' . $explodeName[1] . '%' . $explodeName[0] . '%')
                            ->select(['name', 'reference'])
                            ->limit($limit)
                            ->get();
                        break;
                    case 3:
                        $product = \DB::table('product')
                            ->where('name', 'like', '%' . $name . '%')
                            ->orWhere('name', 'like', '%' . $explodeName[0] . '%' . $explodeName[1] . '%')
                            ->orWhere('name', 'like', '%' . $explodeName[1] . '%' . $explodeName[0] . '%')
                            ->orWhere('name', 'like', '%' . $explodeName[0] . '%' . $explodeName[2] . '%')
                            ->orWhere('name', 'like', '%' . $explodeName[1] . '%' . $explodeName[2] . '%')
                            ->orWhere('name', 'like', '%' . $explodeName[2] . '%' . $explodeName[1] . '%')
                            ->orWhere('name', 'like', '%' . $explodeName[2] . '%' . $explodeName[0] . '%')
                            ->select(['name', 'reference'])
                            ->limit($limit)
                            ->get();
                        break;
                }

                return $product;
            }
            return \DB::table('product')
                ->where('name', 'like', '%' . $name . '%')
                ->select(['name', 'reference'])
                ->limit($limit)
                ->get();
        }
        return null;
    }
}
