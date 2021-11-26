<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Myrzan\TecDocClient\Client;
use Myrzan\TecDocClient\Generated\GetAmBrands;
use Myrzan\TecDocClient\Generated\GetArticleDirectSearchAllNumbersWithState;
use Myrzan\TecDocClient\Generated\GetArticleLinkedAllLinkingTarget3;
use Myrzan\TecDocClient\Generated\GetArticleLinkedAllLinkingTargetManufacturer;
use Myrzan\TecDocClient\Generated\GetArticleLinkedAllLinkingTargetsByIds3;
use Myrzan\TecDocClient\Generated\GetChildNodesAllLinkingTarget2;
use Myrzan\TecDocClient\Generated\GetKeyValues;
use Myrzan\TecDocClient\Generated\GetLanguages;
use Myrzan\TecDocClient\Generated\GetManufacturers;
use Myrzan\TecDocClient\Generated\GetCountries;
use Myrzan\TecDocClient\Generated\GetManufacturers2;
use Myrzan\TecDocClient\Generated\GetModelSeries2;
use Myrzan\TecDocClient\Generated\GetShortCuts2;
use Myrzan\TecDocClient\Generated\GetVehicleByIds3;
use Myrzan\TecDocClient\Generated\GetVehicleIdsByCriteria;
use SimpleXLSX;
use XLSXWriter;

/*include "SimpleXLSX.php";
include "xlsxwriter.class.php";
ini_set('max_execution_time', 2000);*/

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
        $soldProducts = Product::where('stock_shop', 0)->orWhere('stock_shop', null)->take(10)->get();
        $categories = Category::with('ancestors')->get()->toTree();
        $brands = Brand::all();

        $client = new Client();
        /*$writer = new XLSXWriter();
        $xlsx = @(new SimpleXLSX('C:\Users\User\PhpstormProjects\b2b\app\Http\Controllers\vika.xlsx'));


        $eb = $xlsx->rows();
        unset($eb[0]);


        $writer->writeSheetRow('Sheet1', ['id','name', 'brand']);
        for ($i = 1; $i <= count($eb); $i++) {

            $fuels = (new GetArticleDirectSearchAllNumbersWithState())
                ->setLang('LT')
                ->setArticleCountry('LT')
                ->setNumberType(0)
                ->setArticleNumber($eb[$i][0]);
            $fuelsResponse = $client->getArticleDirectSearchAllNumbersWithState($fuels)->getData();


            if(empty($fuelsResponse)) {
                continue;
            }

            $writer->writeSheetRow('Sheet1', [$eb[$i][0], $fuelsResponse[0]->getArticleName(),$fuelsResponse[0]->getBrandName()]);
        }

        $writer->writeToFile('C:\Users\User\PhpstormProjects\b2b\app\Http\Controllers\lol.xlsx');*/


       /* $client = new Client();

        $fuels = (new GetKeyValues())
            ->setLang('LT')
            ->setKeyTableId(182);
        $fuelsResponse = $client->getKeyValues($fuels);

        $modification = [];
        dump('весь бенз');
        dump($fuelsResponse);
        foreach ($fuelsResponse->getData() as $keyFuel => $fuel) {

            dump('первый цикл ' . $fuel->getKeyId());
            $modifi = (new GetVehicleIdsByCriteria())
                ->setCountriesCarSelection('LT')
                ->setLang('LT')
                ->setCarType('P')
                ->setFuelTypeId($fuel->getKeyId())
                ->setManuId(5)
                ->setModId(4955);

            $modifiResponse = $client->getVehicleIdsByCriteria($modifi);
            dump('получаем модицикацию');
            dump($modifiResponse);
            if ($modifiResponse->getData() !== null) {
                foreach ($modifiResponse->getData() as $keyMod => $mod) {
                    dump('второй цикл');
                    dump($mod);
                $modification[$fuel->getKeyValue()][$keyMod] = [
                    'carId' => $mod->getCarId(),
                    'carName' => $mod->getCarName()
                ];
                }
            }
        }
        dd($modification);*/









        /*$params = (new GetAmBrands())
            ->setLang('RU')
            ->setArticleCountry('LT');
        $response = $client->getAmBrands($params);*/

/*        $params = (new GetLanguages())
            ->setLang('RU');
        $response = $client->getLanguages($params);*/

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
            'categories' => $categories,
            'brands' => $brands
        ]);
    }
}
