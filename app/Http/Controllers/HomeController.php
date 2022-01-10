<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\ProductCat;
use App\Models\User;
use App\Models\Venipak;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
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

include "SimpleXLSX.php";
include "xlsxwriter.class.php";
ini_set('max_execution_time', 1800);

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
        $newProducts = Product::orderBy('id', 'desc')->take(20)->get();
        $soldProducts = Product::where('stock_shop', 0)->where('stock_shop', 0)->take(15)->get();
        $specProducts = Product::where('name', 'like', '%'.'VARIKLIO BALKIS'.'%')->take(15)->get();
        $categories = Category::with('ancestors')->get()->toTree();
        $group = ['sankabos-ir-smagracio-komplektai' => 'sankobos','pusasiai' => 'pusasis','vairo-juostos' => 'juosta'
            ,'vairo-koloneles' => 'kolonele','vairo-stiprintuvo-siurbliai' => ' siurblys'];
        $brands = Brand::all();

        $client = new Client();
        /*$xlsx = @(new SimpleXLSX('C:\Users\User\PhpstormProjects\b2b\app\Http\Controllers\kat.xlsx'));


        $rows = $xlsx->rows();
        unset($rows[0]);
        for($i = 1; $i <= count($rows); $i++) {

           $category = new Category();
            $category->id = $rows[$i][0];
            $category->name = $rows[$i][2];
            $category->slug = $rows[$i][3];
            $category->save();

            if($rows[$i][1] !== '') {

                if(empty(Category::find($rows[$i][1]))) {
                    dump(Category::find($rows[$i][1]));
                    dump($category);
                    dd($rows[$i][1]);
                }

                $node = Category::find($rows[$i][1]);

                $node->appendNode($category);

            }

        }*/


        // add cat
       /* $xlsx = @(new SimpleXLSX('C:\Users\User\PhpstormProjects\b2b\app\Http\Controllers\import cat.xlsx'));

        $nam = '';
        $rows = $xlsx->rows();
        unset($rows[0]);
        for ($i = 1; $i <= count($rows); $i++) {
            //$cat = ProductCat::where('product_id', $rows[$i][2])->delete();


            $cat = explode(', ',$rows[$i][1]);

            foreach ($cat as $category_elem) {
                $product = $rows[$i][2];
                $category = Db::table('category')->select(['id'])->where('name', '=', $category_elem)->first();

                if (isset($product) && isset($category)) {
                    DB::table('product_cat')->insert([
                        'category_id' => $category->id,
                        'product_id' => $product,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);

                } else
                    $nam .= '      :'.$category_elem;
            }

        }
dd($nam);*/
       /* $a = Db::table('oe_code')->select(['id', 'code'])->orderBy('id', 'ASC')->get();
        foreach ($a as $value) {
            $b = $value->code;
            $leng = strlen($b);

            if (substr($b, $leng - 1) === '.') {

                $code = substr($b, 0, $leng - 1);
                Db::table('oe_code')->where('id', $value->id)->update(['code' => $code]);
            }
        }*/
        /*$writer = new XLSXWriter();
        $xlsx = @(new SimpleXLSX('C:\Users\User\PhpstormProjects\b2b\app\Http\Controllers\klientu sarasas import.xlsx'));


        $rows = $xlsx->rows();
        unset($rows[0]);

        for($i = 1;$i <= count($rows);$i++) {


            $address = new Address();
            $address->company_name = $rows[$i][0];
            $address->vat = $rows[$i][4];
            $address->country_id = $rows[$i][5];
            $address->city_id = $rows[$i][6];
            $address->street = $rows[$i][8];
            $address->building = $rows[$i][9];
            $address->apartment = $rows[$i][10];
            $address->pvm = $rows[$i][11];
            $address->post_code = $rows[$i][7];
            $address->phone = $rows[$i][15];
            $address->save();

            $user = new User();
            $user->role_id = $rows[$i][1];
            $user->name = $rows[$i][13];
            $user->surname = $rows[$i][14];
            $user->discount = 0;
            $user->address_id = $address->id;
            $user->email = $rows[$i][16];
            $user->avatar = 'users/default.png';
            $user->password = $rows[$i][17];
            $user->note = $rows[$i][12];
            $user->save();

        }*/



/*        $writer = new XLSXWriter();
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

            //dump($eb[$i][0]."   otv     \n");
            //dump($client->getArticleDirectSearchAllNumbersWithState($fuels));
            if(empty($fuelsResponse)) {
                continue;
            }
            //dump($fuelsResponse);

            foreach ($fuelsResponse as $key => $item) {

                if($item->getArticleSearchNo() === $item->getArticleNo()) {

                    $writer->writeSheetRow('Sheet1', [$eb[$i][0], $fuelsResponse[$key]->getArticleName(),$fuelsResponse[$key]->getBrandName()]);
                    continue;
                }
            }

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
            'specProducts' => $specProducts,
            'group' => $group,
            'categories' => $categories,
            'brands' => $brands
        ]);
    }
}
