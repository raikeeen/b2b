<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Myrzan\TecDocClient\Client;
use Myrzan\TecDocClient\Generated\GetManufacturers2;

include "SimpleXLSX.php";
include "xlsxwriter.class.php";

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $newProducts = Product::orderBy('id', 'desc')->take(20)->get();
        $soldProducts = Product::where('stock_shop', 0)->where('stock_shop', 0)->take(15)->get();
        $specProducts = Product::where('name', 'like', '%'.'VARIKLIO BALKIS'.'%')->take(15)->get();
        $categories = Category::with('ancestors')->get()->toTree();
        $group = ['sankabos-ir-smagracio-komplektai' => 'sankobos','pusasiai' => 'pusasis','vairo-juostos' => 'juosta'
            ,'vairo-koloneles' => 'kolonele','vairo-stiprintuvo-siurbliai' => 'siurblys'];
        $fav = ['170408H800','bpz-bm-024','esw-au-010','eas-ns-001', 'ezc-vw-115', 'nwn-me-006', 'spk-ty-007' ,'esd-ns-000',
            'ewb-au-001', 'bkw-vw-003'];
        $favProducts = collect();
        foreach ($fav as $value) {
            $product = Product::where('supplier_reference', $value)->first();
            if($product != null) {
                $favProducts = $favProducts->push($product);
            }
        }

        $brands = Brand::all();

        $client = new Client();
        $params = (new GetManufacturers2())
            ->setCountry('LT')
            ->setLang('LT')
            ->setLinkingTargetType('P')
            ->setFavouredList(1);
        $response = $client->getManufacturers2($params);
        $manufacturers = $response->getData();
        return view('home', [
            'manufacturers' => $manufacturers,
            'newProducts' => $newProducts,
            'soldProducts' => $soldProducts,
            'specProducts' => $specProducts,
            'group' => $group,
            'categories' => $categories,
            'brands' => $brands,
            'favProducts' => $favProducts
        ]);
    }
}
