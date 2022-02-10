<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\TecDocController;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Myrzan\TecDocClient\Client;
use Myrzan\TecDocClient\Generated\GetArticleDirectSearchAllNumbersWithState;
use Myrzan\TecDocClient\Generated\GetDirectArticlesByIds6;
use PhpParser\Node\Stmt\Return_;
use App\Http\Resources\Product as ProductResource;
use App\Http\Controllers\Controller;
ini_set('max_execution_time', 60);
class ApiProductController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $products = Product::orderBy('created_at','desc')->paginate(20);
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
    static function analog(Request $request)
    {
        $tecDoc = new TecDocController();

        $product = Product::where('reference', $request->analog)->first();

        if(isset($request->analog) and isset($product->supplier_reference)) {
            $client = new Client();
            $oeCodes = [];

            $getArticleDirectSearchAllNumbersWithState = (new getArticleDirectSearchAllNumbersWithState())
                ->setArticleCountry('LT')
                ->setLang('LT')
                ->setArticleNumber($product->supplier_reference)
                ->setNumberType(0);
            $getArticleDirectSearchAllNumbersWithStateResponse = $client->getArticleDirectSearchAllNumbersWithState($getArticleDirectSearchAllNumbersWithState)->getData();

            if(!empty($getArticleDirectSearchAllNumbersWithStateResponse)) {

                $getArticleId = $getArticleDirectSearchAllNumbersWithStateResponse[0]->getArticleId();

                $getDirectArticlesByIds6 = (new getDirectArticlesByIds6())
                    ->setArticleCountry('LT')
                    ->setLang('LT')
                    ->setOeNumbers(true)
                    ->setArticleId([$getArticleId]);

                $getDirectArticlesByIds6Response = $client->getDirectArticlesByIds6($getDirectArticlesByIds6)->getData();

                foreach ($getDirectArticlesByIds6Response[0]->getOenNumbers() as $getOe) {
                    array_push($oeCodes, $getOe->getOeNumber());
                }
                $oeCodes = array_unique($oeCodes, SORT_REGULAR);
            }
        }
        $searchDb = [];
        if(!empty($oeCodes)) {

            $searchDb = DB::table('oe_code')->select(['product_id'])->where(function ($query) use ($oeCodes) {
                foreach ($oeCodes as $key => $value) {
                    $query->orwhere('code', '=', $value);
                }
            })->distinct()->get();


            $allCodes = [];
            $allProduct = [];
            foreach ($searchDb as $code) {

                $codeFromDb = DB::table('oe_code')->select(['code'])->where('product_id', $code->product_id)->get();

                foreach ($codeFromDb as $c) {
                    array_push($allCodes, str_replace('.', '', $c->code));
                }

                $reference = DB::table('product')->where('id', $code->product_id)->select(['reference'])->first();
                if ($reference !== null) {
                    array_push($allProduct, $reference->reference);
                }
            }
            $allCodes = array_unique($allCodes, SORT_REGULAR);

            foreach ($allCodes as $code) {
                foreach ($tecDoc->searchOe($code) as $article) {
                    $nr = $article->getArticleNo();

                    $product = DB::table('product')
                        ->select(['reference'])
                        ->where('supplier_reference', $nr)
                        ->first();

                    if ($product !== null) {

                        array_push($allProduct, $product->reference);
                    }
                }

            }
            $allProduct = array_unique($allProduct, SORT_REGULAR);

            return $allProduct;
        } else {
            $oecodes = DB::table('oe_code')->select(['code'])->where('product_id', $product->id)->get();
            $arrayProducts = [];
            foreach ($oecodes as $code) {
                $product = DB::table('oe_code')->where('code', $code->code)
                    ->leftJoin('product', function($join) {
                        $join->on('oe_code.product_id', '=', 'product.id');
                    })
                    ->select(['supplier_reference'])->distinct()->get();
                foreach ($product as $prod) {
                    if (isset($prod->supplier_reference)) {
                        array_push($arrayProducts, $prod->supplier_reference);
                    }
                }
            }
            $allProducts = array_unique($arrayProducts, SORT_REGULAR);

            return $allProducts;
        }
    }

    static function search(Request $request)
    {
        $string = self::search_find(trim($request->search));
        $stringWSymbols = self::search_find(str_replace(['-',' ','.', ',','#','$','%','&','*'], '', $request->search));

        return array_unique(array_merge($string, $stringWSymbols), SORT_REGULAR);
    }
    static function search_find($string) {

        $limit = null;

        if(!isset($request->flag)) {
            $limit = 20;
        }

        $allCodes = [];
        $product = \DB::table('product')->where('reference', 'like', $string . '%')->select(['supplier_reference'])->get();

        if(isset($product)) {
            foreach ($product as $item) {
                array_push($allCodes, $item->supplier_reference);
            }

        }

        $product = \DB::table('product')->where('supplier_reference', 'like', $string . '%')->select(['supplier_reference'])->get();

        if(isset($product)) {
            foreach ($product as $item) {
                array_push($allCodes, $item->supplier_reference);
            }
        }
        $searchTecDoc = (new TecDocController)->search($string);

        if(!empty($searchTecDoc)) {

            foreach ($searchTecDoc as $item) {

                array_push($allCodes, $item->getArticleNo());
            }

            $productIdFirst = \DB::table('oe_code')
                ->where('code', 'like', '%' . $string . '%')
                ->leftJoin('product', function($join) {
                    $join->on('oe_code.product_id', '=', 'product.id');
                })
                ->select(['product.supplier_reference'])
                ->limit($limit)
                ->get()->toArray();

            foreach ($productIdFirst as $item) {
                array_push($allCodes, $item->supplier_reference);
            }

            $allCodes = array_unique($allCodes, SORT_REGULAR);

            $product = \DB::table('product')->whereIn('supplier_reference', $allCodes)->select(['name', 'reference'])->limit($limit)->get()->toArray();
// $product = \DB::table('product')->whereIn('supplier_reference', $allCodes)->select(['name','reference'])->limit($limit)->get();
            if (!empty($product))
                return $product;
        }

        if(!empty($allCodes)) {

            $product = \DB::table('product')->whereIn('supplier_reference', $allCodes)->select(['name','reference'])->limit($limit)->get()->toArray();
            return $product;
        }

        $product = self::searchOeTable($string, $limit);

        if(!empty($product)) {
            return $product;
        }

        $explodeName = explode(' ',$string);

        if(count($explodeName) < 4) {
            switch (count($explodeName)) {
                case 1:
                    $product = \DB::table('product')
                        ->where('name', 'like', '%' . $string . '%')
                        ->select(['name', 'reference'])
                        ->limit($limit)
                        ->get()->toArray();
                    break;
                case 2:
                    $product = \DB::table('product')
                        ->where('name', 'like', '%' . $string . '%')
                        ->orWhere('name', 'like', '%' . $explodeName[0] . '%' . $explodeName[1] . '%')
                        ->orWhere('name', 'like', '%' . $explodeName[1] . '%' . $explodeName[0] . '%')
                        ->select(['name', 'reference'])
                        ->limit($limit)
                        ->get()->toArray();
                    break;
                case 3:
                    $product = \DB::table('product')
                        ->where('name', 'like', '%' . $string . '%')
                        ->orWhere('name', 'like', '%' . $explodeName[0] . '%' . $explodeName[1] . '%')
                        ->orWhere('name', 'like', '%' . $explodeName[1] . '%' . $explodeName[0] . '%')
                        ->orWhere('name', 'like', '%' . $explodeName[0] . '%' . $explodeName[2] . '%')
                        ->orWhere('name', 'like', '%' . $explodeName[1] . '%' . $explodeName[2] . '%')
                        ->orWhere('name', 'like', '%' . $explodeName[2] . '%' . $explodeName[1] . '%')
                        ->orWhere('name', 'like', '%' . $explodeName[2] . '%' . $explodeName[0] . '%')
                        ->select(['name', 'reference'])
                        ->limit($limit)
                        ->get()->toArray();
                    break;
            }

            return $product;
        }
        return \DB::table('product')
            ->where('name', 'like', '%' . $string . '%')
            ->select(['name', 'reference'])
            ->limit($limit)
            ->get()->toArray();
    }
    static function history(Request $request)
    {
        Db::table('search_history')->insert([
            'search'  => $request->search,
            'user_id' => $request->user,
            "created_at" =>  date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s'),
        ]);

        return response()->json();
    }

    static function searchOeTable($name, $limit)
    {
         return \DB::table('oe_code')
            ->where('code', 'like', '%' . $name . '%')
            ->leftJoin('product', function($join) {
                $join->on('oe_code.product_id', '=', 'product.id');
            })
            ->select(['product.name','product.reference'])
            ->limit($limit)
            ->get()->toArray();
    }
}
