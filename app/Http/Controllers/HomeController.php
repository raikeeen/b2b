<?php

namespace App\Http\Controllers;

use App\Jobs\SendMail;
use App\Models\Address;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\ProductCat;
use App\Models\ProductUserMargin;
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
use SoapClient;
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
    {/*$apiMTRLoginLDZ = 'AUTODALYS';
        $apiMTRPassLDZ = 'Dcmn4%1lkdfS21';
        $apiMTRUrl="https://dedal.polcar.com/Dystrybutorzy/Customers.asmx?wsdl";
        $options = [
            'cache_wsdl'     => WSDL_CACHE_NONE,
            'trace'          => 1,
            'stream_context' => stream_context_create(
                [
                    'ssl' => [
                        'verify_peer'       => false,
                        'verify_peer_name'  => false,
                        'allow_self_signed' => true
                    ]
                ]
            )
        ];
        $client = new SoapClient($apiMTRUrl, $options);
        $inputQuery = array(
            'PartList' => 'xml',
            'DistributorCode' => 'GRB',
            'CustomerNumber' => 115,
            'Login' => $apiMTRLoginLDZ,
            'Password' => $apiMTRPassLDZ,
        );

        $requst = $client->GetCustomerPricesForList($inputQuery);
        dd($requst);
        $requst = json_decode(json_encode($requst), true);
        $xml = simplexml_load_string($requst['GetDistributorPriceListResult']['any']);*/
        /*$client = new SoapClient($apiMTRUrl, $options);
        $inputQuery = array(
            'DistributorCode' => 'GRB',
            'PriceListName' => 'Garbus_KLNT',
            'Login' => $apiMTRLoginLDZ,
            'Password' => $apiMTRPassLDZ,
        );

        $requst = $client->GetDistributorPriceList($inputQuery);
        dd($requst);
        $requst = json_decode(json_encode($requst), true);
        $xml = simplexml_load_string($requst['GetDistributorPriceListResult']['any']);
dd($xml);*/
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

        //$users = User::where('role_id', 5)->get();
       /* $product = Product::where('supplier_reference', 'eas-ch-000a')->first();

        foreach ($users as $user) {
            $margin = new ProductUserMargin();
            $margin->product_id = $product->id;
            $margin->user_id = $user->id;
            $margin->margin = -2.00;
            $margin->created_at = Carbon::now();
            $margin->updated_at = Carbon::now();
            $margin->save();
        }*/


       /* $arrayTrade = [
            'EZC-ME-010'	=>	56,
            'EZC-ME-011'	=>	25,
            'ESD-NS-000'	=>	4,
            'EZC-NS-004'	=>	51,
            'EZC-NS-004A'	=>	51,
            'EZC-NS-004B'	=>	51,
            'EZC-NS-004C'	=>	51,
            'EZC-NS-004D'	=>	51,
            'EZC-VW-115'	=>	39,
            'eas-ch-000a'	=>	-5,
            'EAS-VW-009'	=>	25,
            'EAS-VW-004'	=>	51,
            'EAS-VW-003'	=>	61,
            'EAS-VW-002'	=>	63,
            'EAS-SK-001'	=>	55,
            'EAS-RE-012'	=>	0,
            'EAS-RE-011'	=>	-2,
            'EAS-VW-001'	=>	112,
            'EAS-RE-010'	=>	-2,
            'EAS-RE-008'	=>	2,
            'EAS-RE-009'	=>	2,
            'EAS-RE-005'	=>	-2,
            'EAS-RE-003'	=>	17,
            'EAS-RE-002'	=>	77,
            'EAS-RE-001'	=>	29,
            'EAS-PL-003'	=>	-6,
            'EAS-PL-004'	=>	15,
            'EAS-PL-002'	=>	47,
            'EAS-PL-000'	=>	53,
            'EAS-PE-000'	=>	51,
            'EAS-ME-000'	=>	-2,
            'EAS-KA-012'	=>	61,
            'EAS-FT-001'	=>	26,
            'EAS-FT-000'	=>	26,
            'EAS-FR-006'	=>	44,
            'EAS-AU-000'	=>	23,
            'EAS-BM-000'	=>	2,
            'EAS-BM-001'	=>	2,
            'EAS-BM-002'	=>	4,
            'EAS-BM-003'	=>	0,
            'EAS-BM-004'	=>	-1,
            'EAS-CH-000'	=>	-4,
            'EAS-CH-002'	=>	-6,
            'EAS-CH-001'	=>	-2,
            'EAS-CH-004'	=>	1,
            'EAS-CH-007'	=>	-4,
            'EAS-DW-000'	=>	90,
            'EAS-DW-001'	=>	90,
            'EAS-DW-002'	=>	94,
            'EAS-FR-000'	=>	59,
            'EAS-FR-001'	=>	59,
            'EAS-FR-003'	=>	40,
            'EAS-FR-002'	=>	41,
            'EAS-FR-004'	=>	43,
            'EAS-FR-005'	=>	8,
            'EAS-FR-007'	=>	61,
            'EAS-FT-002'	=>	7,
            'EAS-FT-003'	=>	26,
            'EAS-HD-001'	=>	77,
            'EAS-HD-000'	=>	90,
            'EAS-HD-002'	=>	77,
            'EAS-HD-003'	=>	83,
            'EAS-HD-004'	=>	74,
            'EAS-HD-005'	=>	74,
            'EAS-HD-007'	=>	66,
            'EAS-HD-006'	=>	49,
            'EAS-HD-008'	=>	63,
            'EAS-HD-009'	=>	37,
            'EAS-HD-011'	=>	63,
            'EAS-HD-010'	=>	53,
            'EAS-HD-012'	=>	90,
            'EAS-HY-000'	=>	120,
            'EAS-HY-001'	=>	120,
            'EAS-HY-002'	=>	83,
            'EAS-HY-003'	=>	120,
            'EAS-HY-004'	=>	83,
            'EAS-HY-006'	=>	74,
            'EAS-HY-007'	=>	74,
            'EAS-HY-005'	=>	83,
            'EAS-HY-008'	=>	61,
            'EAS-HY-009'	=>	98,
            'EAS-IS-000'	=>	17,
            'EAS-KA-001'	=>	83,
            'EAS-KA-003'	=>	53,
            'EAS-KA-002'	=>	83,
            'EAS-KA-005'	=>	83,
            'EAS-KA-004'	=>	74,
            'EAS-KA-006'	=>	74,
            'EAS-KA-008'	=>	61,
            'EAS-KA-007'	=>	61,
            'EAS-KA-009'	=>	41,
            'EAS-KA-011'	=>	83,
            'EAS-KA-010'	=>	98,
            'EAS-LR-001'	=>	14,
            'EAS-LR-000'	=>	-6,
            'EAS-ME-001'	=>	-4,
            'EAS-ME-003'	=>	-4,
            'EAS-ME-002'	=>	-3,
            'EAS-MS-000'	=>	68,
            'EAS-LR-002'	=>	-2,
            'EAS-MS-001'	=>	75,
            'EAS-MS-003'	=>	57,
            'EAS-MS-002'	=>	100,
            'EAS-MS-004'	=>	77,
            'EAS-MS-006'	=>	77,
            'EAS-MS-005'	=>	51,
            'EAS-MS-007'	=>	63,
            'EAS-MS-008'	=>	66,
            'EAS-MS-011'	=>	46,
            'EAS-MS-010'	=>	21,
            'EAS-MS-012'	=>	41,
            'EAS-MS-013'	=>	44,
            'EAS-MZ-000'	=>	66,
            'EAS-MS-014'	=>	51,
            'EAS-MZ-001'	=>	63,
            'EAS-MZ-003'	=>	63,
            'EAS-MZ-002'	=>	80,
            'EAS-MZ-004'	=>	74,
            'EAS-MZ-005'	=>	98,
            'EAS-MZ-006'	=>	94,
            'EAS-MZ-008'	=>	44,
            'EAS-MZ-007'	=>	43,
            'EAS-NS-000'	=>	71,
            'EAS-NS-001'	=>	71,
            'EAS-NS-002'	=>	59,
            'EAS-NS-003'	=>	27,
            'EAS-NS-004'	=>	33,
            'EAS-NS-005'	=>	40,
            'EAS-NS-007'	=>	31,
            'EAS-NS-010'	=>	53,
            'EAS-NS-006'	=>	51,
            'EAS-NS-011'	=>	61,
            'EAS-NS-012'	=>	149,
            'EAS-NS-013'	=>	149,
            'EAS-NS-009'	=>	31,
            'EAS-NS-014'	=>	36,
            'EAS-PL-001'	=>	49,
            'EAS-PL-006'	=>	13,
            'EAS-PL-005'	=>	13,
            'EAS-PL-007'	=>	18,
            'EAS-PL-008'	=>	59,
            'EAS-PL-009'	=>	59,
            'EAS-PL-010'	=>	40,
            'EAS-PL-011'	=>	40,
            'EAS-RE-007'	=>	6,
            'EAS-RE-014'	=>	21,
            'EAS-SB-000'	=>	5,
            'EAS-SB-001'	=>	7,
            'EAS-SB-002'	=>	1,
            'EAS-SB-003'	=>	1,
            'EAS-SB-005'	=>	2,
            'EAS-SB-004'	=>	-2,
            'EAS-SB-006'	=>	11,
            'EAS-SE-000'	=>	51,
            'EAS-SU-000'	=>	77,
            'EAS-SU-001'	=>	51,
            'EAS-SU-002'	=>	74,
            'EAS-TY-000'	=>	98,
            'EAS-TY-001'	=>	93,
            'EAS-TY-002'	=>	77,
            'EAS-TY-003'	=>	100,
            'EAS-TY-004'	=>	57,
            'EAS-TY-005'	=>	61,
            'EAS-TY-006'	=>	63,
            'EAS-TY-007'	=>	80,
            'EAS-TY-008'	=>	77,
            'EAS-TY-009'	=>	83,
            'EAS-TY-010'	=>	74,
            'EAS-TY-011'	=>	71,
            'EAS-TY-012'	=>	61,
            'EAS-TY-013'	=>	72,
            'EAS-TY-014'	=>	112,
            'EAS-TY-015'	=>	72,
            'EAS-TY-017'	=>	55,
            'EAS-TY-016'	=>	36,
            'EAS-TY-018'	=>	55,
            'EAS-TY-020'	=>	83,
            'EAS-TY-021'	=>	61,
            'EAS-TY-023'	=>	59,
            'EAS-TY-022'	=>	51,
            'EAS-TY-024'	=>	71,
            'EAS-TY-026'	=>	74,
            'EAS-TY-027'	=>	74,
            'EAS-TY-029'	=>	71,
            'EAS-TY-028'	=>	74,
            'EAS-TY-030'	=>	71,
            'EAS-TY-032'	=>	6,
            'EAS-TY-033'	=>	6,
            'EAS-VW-000'	=>	112,
            'EAS-VW-008'	=>	43,
            '96SKV500'	=>	-1,
            '96SKV501'	=>	-1,
            '96SKV502'	=>	1,
            '96SKV503'	=>	-1,
            '96SKV504'	=>	-6,
            '96SKV505'	=>	-4,
            '96SKV506'	=>	84,
            '96SKV507'	=>	39,
            '96SKV508'	=>	80,
            '96SKV509'	=>	39,
            '96SKV510'	=>	46,
            '96SKV511'	=>	43,
            '96SKV512'	=>	57,
            '96SKV513'	=>	62,
            '96SKV514'	=>	24,
            '96SKV515'	=>	65,
            '96SKV516'	=>	67,
            '96SKV517'	=>	63,
            '96SKV518'	=>	54,
            '96SKV519'	=>	50,
            '96SKV520'	=>	64,
            '96SKV521'	=>	57,
            '96SKV522'	=>	71,
            '96SKV523'	=>	15,
            '96SKV524'	=>	50,
            '96SKV525'	=>	7,
            '96SKV526'	=>	43,
            '96SKV527'	=>	33,
            '96SKV528'	=>	32,
            '96SKV529'	=>	54,
            '96SKV530'	=>	62,
            '96SKV531'	=>	20,
            '96SKV532'	=>	51,
            '96SKV533'	=>	53,
            '96SKV534'	=>	56,
            '96SKV535'	=>	56,
            '96SKV536'	=>	59,
            '96SKV537'	=>	50,
            '96SKV538'	=>	52,
            '96SKV539'	=>	68,
            '96SKV540'	=>	70,
            '96SKV541'	=>	26,
            '96SKV542'	=>	69,
            '96SKV543'	=>	59,
            '96SKV544'	=>	61,
            '96SKV545'	=>	81,
            '96SKV546'	=>	49,
            '96SKV547'	=>	77,
            '96SKV548'	=>	26,
            '96SKV549'	=>	81,
            '96SKV550'	=>	56,
            '96SKV551'	=>	55,
            '96SKV552'	=>	58,
            '96SKV553'	=>	64,
            '96SKV554'	=>	71,
            '96SKV555'	=>	53,
            '96SKV556'	=>	54,
            '96SKV557'	=>	50,
            '96SKV558'	=>	61,
            '96SKV559'	=>	57,
            '96SKV561'	=>	46,
            '96SKV563'	=>	23,
            '96SKV564'	=>	58,
            '99590099501'	=>	3,
            'EAS-CH-008'	=>	-2,
            'EAS-PE-001'	=>	3,
            'EAS-FT-004'	=>	23,
            'EAS-RE-015'	=>	-3,
            'EAS-SU-003'	=>	51,



        ];
        $arrayShop = [
            'EZC-ME-010'	=>	32,
            'EZC-ME-011'	=>	18,
            'ESD-NS-000'	=>	0,
            'EZC-NS-004'	=>	23,
            'EZC-NS-004A'	=>	23,
            'EZC-NS-004B'	=>	18,
            'EZC-NS-004C'	=>	18,
            'EZC-NS-004D'	=>	21,
            'EZC-VW-115'	=>	2,
            'eas-ch-000a'	=>	-7,
            'EAS-VW-009'	=>	30,
            'EAS-VW-004'	=>	49,
            'EAS-VW-003'	=>	56,
            'EAS-VW-002'	=>	57,
            'EAS-SK-001'	=>	51,
            'EAS-RE-012'	=>	13,
            'EAS-RE-011'	=>	12,
            'EAS-VW-001'	=>	91,
            'EAS-RE-010'	=>	12,
            'EAS-RE-008'	=>	14,
            'EAS-RE-009'	=>	15,
            'EAS-RE-005'	=>	12,
            'EAS-RE-003'	=>	25,
            'EAS-RE-002'	=>	67,
            'EAS-RE-001'	=>	33,
            'EAS-PL-003'	=>	9,
            'EAS-PL-004'	=>	23,
            'EAS-PL-002'	=>	46,
            'EAS-PL-000'	=>	50,
            'EAS-PE-000'	=>	49,
            'EAS-ME-000'	=>	12,
            'EAS-KA-012'	=>	56,
            'EAS-FT-001'	=>	31,
            'EAS-FT-000'	=>	31,
            'EAS-FR-006'	=>	44,
            'EAS-AU-000'	=>	29,
            'EAS-BM-000'	=>	14,
            'EAS-BM-001'	=>	14,
            'EAS-BM-002'	=>	16,
            'EAS-BM-003'	=>	13,
            'EAS-BM-004'	=>	12,
            'EAS-CH-000'	=>	10,
            'EAS-CH-002'	=>	9,
            'EAS-CH-001'	=>	12,
            'EAS-CH-004'	=>	14,
            'EAS-CH-007'	=>	10,
            'EAS-DW-000'	=>	76,
            'EAS-DW-001'	=>	76,
            'EAS-DW-002'	=>	79,
            'EAS-FR-000'	=>	54,
            'EAS-FR-001'	=>	54,
            'EAS-FR-003'	=>	41,
            'EAS-FR-002'	=>	42,
            'EAS-FR-004'	=>	43,
            'EAS-FR-005'	=>	18,
            'EAS-FR-007'	=>	56,
            'EAS-FT-002'	=>	18,
            'EAS-FT-003'	=>	31,
            'EAS-HD-001'	=>	67,
            'EAS-HD-000'	=>	76,
            'EAS-HD-002'	=>	67,
            'EAS-HD-003'	=>	71,
            'EAS-HD-004'	=>	65,
            'EAS-HD-005'	=>	65,
            'EAS-HD-007'	=>	59,
            'EAS-HD-006'	=>	47,
            'EAS-HD-008'	=>	57,
            'EAS-HD-009'	=>	39,
            'EAS-HD-011'	=>	57,
            'EAS-HD-010'	=>	50,
            'EAS-HD-012'	=>	76,
            'EAS-HY-000'	=>	97,
            'EAS-HY-001'	=>	97,
            'EAS-HY-002'	=>	71,
            'EAS-HY-003'	=>	97,
            'EAS-HY-004'	=>	71,
            'EAS-HY-006'	=>	65,
            'EAS-HY-007'	=>	65,
            'EAS-HY-005'	=>	71,
            'EAS-HY-008'	=>	56,
            'EAS-HY-009'	=>	81,
            'EAS-IS-000'	=>	25,
            'EAS-KA-001'	=>	71,
            'EAS-KA-003'	=>	50,
            'EAS-KA-002'	=>	71,
            'EAS-KA-005'	=>	71,
            'EAS-KA-004'	=>	65,
            'EAS-KA-006'	=>	65,
            'EAS-KA-008'	=>	56,
            'EAS-KA-007'	=>	56,
            'EAS-KA-009'	=>	42,
            'EAS-KA-011'	=>	71,
            'EAS-KA-010'	=>	81,
            'EAS-LR-001'	=>	23,
            'EAS-LR-000'	=>	9,
            'EAS-ME-001'	=>	10,
            'EAS-ME-003'	=>	10,
            'EAS-ME-002'	=>	11,
            'EAS-MS-000'	=>	61,
            'EAS-LR-002'	=>	12,
            'EAS-MS-001'	=>	65,
            'EAS-MS-003'	=>	53,
            'EAS-MS-002'	=>	83,
            'EAS-MS-004'	=>	67,
            'EAS-MS-006'	=>	67,
            'EAS-MS-005'	=>	49,
            'EAS-MS-007'	=>	57,
            'EAS-MS-008'	=>	59,
            'EAS-MS-011'	=>	45,
            'EAS-MS-010'	=>	27,
            'EAS-MS-012'	=>	42,
            'EAS-MS-013'	=>	44,
            'EAS-MZ-000'	=>	59,
            'EAS-MS-014'	=>	49,
            'EAS-MZ-001'	=>	57,
            'EAS-MZ-003'	=>	57,
            'EAS-MZ-002'	=>	69,
            'EAS-MZ-004'	=>	65,
            'EAS-MZ-005'	=>	81,
            'EAS-MZ-006'	=>	79,
            'EAS-MZ-008'	=>	44,
            'EAS-MZ-007'	=>	43,
            'EAS-NS-000'	=>	63,
            'EAS-NS-001'	=>	63,
            'EAS-NS-002'	=>	54,
            'EAS-NS-003'	=>	32,
            'EAS-NS-004'	=>	36,
            'EAS-NS-005'	=>	41,
            'EAS-NS-007'	=>	35,
            'EAS-NS-010'	=>	50,
            'EAS-NS-006'	=>	49,
            'EAS-NS-011'	=>	56,
            'EAS-NS-012'	=>	118,
            'EAS-NS-013'	=>	118,
            'EAS-NS-009'	=>	35,
            'EAS-NS-014'	=>	38,
            'EAS-PL-001'	=>	47,
            'EAS-PL-006'	=>	22,
            'EAS-PL-005'	=>	22,
            'EAS-PL-007'	=>	26,
            'EAS-PL-008'	=>	54,
            'EAS-PL-009'	=>	54,
            'EAS-PL-010'	=>	41,
            'EAS-PL-011'	=>	41,
            'EAS-RE-007'	=>	17,
            'EAS-RE-014'	=>	27,
            'EAS-SB-000'	=>	17,
            'EAS-SB-001'	=>	18,
            'EAS-SB-002'	=>	14,
            'EAS-SB-003'	=>	14,
            'EAS-SB-005'	=>	14,
            'EAS-SB-004'	=>	12,
            'EAS-SB-006'	=>	20,
            'EAS-SE-000'	=>	49,
            'EAS-SU-000'	=>	67,
            'EAS-SU-001'	=>	49,
            'EAS-SU-002'	=>	65,
            'EAS-TY-000'	=>	81,
            'EAS-TY-001'	=>	78,
            'EAS-TY-002'	=>	67,
            'EAS-TY-003'	=>	83,
            'EAS-TY-004'	=>	53,
            'EAS-TY-005'	=>	56,
            'EAS-TY-006'	=>	57,
            'EAS-TY-007'	=>	69,
            'EAS-TY-008'	=>	67,
            'EAS-TY-009'	=>	71,
            'EAS-TY-010'	=>	65,
            'EAS-TY-011'	=>	63,
            'EAS-TY-012'	=>	56,
            'EAS-TY-013'	=>	64,
            'EAS-TY-014'	=>	91,
            'EAS-TY-015'	=>	63,
            'EAS-TY-017'	=>	51,
            'EAS-TY-016'	=>	38,
            'EAS-TY-018'	=>	51,
            'EAS-TY-020'	=>	71,
            'EAS-TY-021'	=>	56,
            'EAS-TY-023'	=>	54,
            'EAS-TY-022'	=>	49,
            'EAS-TY-024'	=>	63,
            'EAS-TY-026'	=>	65,
            'EAS-TY-027'	=>	65,
            'EAS-TY-029'	=>	63,
            'EAS-TY-028'	=>	65,
            'EAS-TY-030'	=>	63,
            'EAS-TY-032'	=>	17,
            'EAS-TY-033'	=>	17,
            'EAS-VW-000'	=>	91,
            'EAS-VW-008'	=>	43,
            '96SKV500'	=>	12,
            '96SKV501'	=>	12,
            '96SKV502'	=>	14,
            '96SKV503'	=>	12,
            '96SKV504'	=>	9,
            '96SKV505'	=>	10,
            '96SKV506'	=>	72,
            '96SKV507'	=>	40,
            '96SKV508'	=>	69,
            '96SKV509'	=>	40,
            '96SKV510'	=>	45,
            '96SKV511'	=>	43,
            '96SKV512'	=>	53,
            '96SKV513'	=>	57,
            '96SKV514'	=>	30,
            '96SKV515'	=>	59,
            '96SKV516'	=>	60,
            '96SKV517'	=>	57,
            '96SKV518'	=>	51,
            '96SKV519'	=>	48,
            '96SKV520'	=>	58,
            '96SKV521'	=>	53,
            '96SKV522'	=>	63,
            '96SKV523'	=>	24,
            '96SKV524'	=>	48,
            '96SKV525'	=>	18,
            '96SKV526'	=>	43,
            '96SKV527'	=>	36,
            '96SKV528'	=>	35,
            '96SKV529'	=>	50,
            '96SKV530'	=>	57,
            '96SKV531'	=>	27,
            '96SKV532'	=>	49,
            '96SKV533'	=>	50,
            '96SKV534'	=>	52,
            '96SKV535'	=>	52,
            '96SKV536'	=>	54,
            '96SKV537'	=>	48,
            '96SKV538'	=>	50,
            '96SKV539'	=>	60,
            '96SKV540'	=>	62,
            '96SKV541'	=>	31,
            '96SKV542'	=>	61,
            '96SKV543'	=>	54,
            '96SKV544'	=>	56,
            '96SKV545'	=>	70,
            '96SKV546'	=>	47,
            '96SKV547'	=>	67,
            '96SKV548'	=>	31,
            '96SKV549'	=>	70,
            '96SKV550'	=>	53,
            '96SKV551'	=>	51,
            '96SKV552'	=>	53,
            '96SKV553'	=>	57,
            '96SKV554'	=>	63,
            '96SKV555'	=>	50,
            '96SKV556'	=>	51,
            '96SKV557'	=>	48,
            '96SKV558'	=>	56,
            '96SKV559'	=>	53,
            '96SKV561'	=>	45,
            '96SKV563'	=>	29,
            '96SKV564'	=>	53,
            '99590099501'	=>	15,
            'EAS-CH-008'	=>	12,
            'EAS-PE-001'	=>	15,
            'EAS-FT-004'	=>	29,
            'EAS-RE-015'	=>	11,
            'EAS-SU-003'	=>	49,
        ];
        foreach ($arrayTrade as $key => $value) {
           $a = Product::where('supplier_reference', (string)$key)->update(['trade_margin' => $value, 'updated_at' => Carbon::now()]);
        }
        foreach ($arrayShop as $key => $value) {
            $a = Product::where('supplier_reference', (string)$key)->update(['trade_margin_pard' => $value, 'updated_at' => Carbon::now()]);
        }*/
        //all juostos
      /*  $array = [
            'EAS-VW-009'	=>	1.57,
            'EAS-VW-004'	=>	8.15,
            'EAS-VW-003'	=>	10.43,
            'EAS-VW-002'	=>	10.99,
            'EAS-SK-001'	=>	8.84,
            'EAS-RE-012'	=>	-4.97,
            'EAS-RE-011'	=>	-5.47,
            'EAS-VW-001'	=>	23.26,
            'EAS-RE-010'	=>	-5.47,
            'EAS-RE-008'	=>	-4.31,
            'EAS-RE-009'	=>	-4.31,
            'EAS-RE-005'	=>	-5.47,
            'EAS-RE-003'	=>	-0.52,
            'EAS-RE-002'	=>	14.34,
            'EAS-RE-001'	=>	2.33,
            'EAS-PL-003'	=>	-6.53,
            'EAS-PL-004'	=>	-1.22,
            'EAS-PL-002'	=>	7,
            'EAS-PL-000'	=>	8.35,
            'EAS-PE-000'	=>	7.87,
            'EAS-ME-000'	=>	-5.31,
            'EAS-KA-012'	=>	10.43,
            'EAS-FT-001'	=>	1.57,
            'EAS-FT-000'	=>	1.57,
            'EAS-FR-006'	=>	6.58,
            'EAS-CH-006'	=>	-6.53,
            'EAS-AU-000'	=>	1.11,
            'EAS-BM-000'	=>	-4.41,
            'EAS-BM-001'	=>	-4.51,
            'EAS-BM-002'	=>	-3.56,
            'EAS-BM-003'	=>	-4.6,
            'EAS-BM-004'	=>	-5.05,
            'EAS-CH-000'	=>	-5.85,
            'EAS-CH-002'	=>	-6.53,
            'EAS-CH-001'	=>	-5.47,
            'EAS-CH-004'	=>	-4.6,
            'EAS-CH-007'	=>	-5.85,
            'EAS-DW-000'	=>	18.64,
            'EAS-DW-001'	=>	18.64,
            'EAS-DW-002'	=>	18.64,
            'EAS-FR-000'	=>	9.87,
            'EAS-FR-001'	=>	10.43,
            'EAS-FR-003'	=>	5.06,
            'EAS-FR-002'	=>	5.42,
            'EAS-FR-004'	=>	5.8,
            'EAS-FR-005'	=>	-2.83,
            'EAS-FR-007'	=>	10.43,
            'EAS-FT-002'	=>	-3.21,
            'EAS-FT-003'	=>	1.82,
            'EAS-HD-001'	=>	14.34,
            'EAS-HD-000'	=>	17.67,
            'EAS-HD-002'	=>	14.34,
            'EAS-HD-003'	=>	15.91,
            'EAS-HD-004'	=>	13.6,
            'EAS-HD-005'	=>	13.6,
            'EAS-HD-007'	=>	11.6,
            'EAS-HD-006'	=>	7.44,
            'EAS-HD-008'	=>	10.99,
            'EAS-HD-009'	=>	4.38,
            'EAS-HD-011'	=>	10.99,
            'EAS-HD-010'	=>	8.35,
            'EAS-HD-012'	=>	17.67,
            'EAS-HY-000'	=>	25.18,
            'EAS-HY-001'	=>	25.18,
            'EAS-HY-002'	=>	15.91,
            'EAS-HY-003'	=>	25.18,
            'EAS-HY-004'	=>	15.91,
            'EAS-HY-006'	=>	13.6,
            'EAS-HY-007'	=>	13.6,
            'EAS-HY-005'	=>	15.91,
            'EAS-HY-008'	=>	10.43,
            'EAS-HY-009'	=>	19.68,
            'EAS-IS-000'	=>	-0.7,
            'EAS-KA-001'	=>	15.91,
            'EAS-KA-003'	=>	8.35,
            'EAS-KA-002'	=>	15.91,
            'EAS-KA-005'	=>	15.91,
            'EAS-KA-004'	=>	13.6,
            'EAS-KA-006'	=>	13.6,
            'EAS-KA-008'	=>	10.43,
            'EAS-KA-007'	=>	10.43,
            'EAS-KA-009'	=>	5.8,
            'EAS-KA-011'	=>	15.91,
            'EAS-KA-010'	=>	19.68,
            'EAS-LR-001'	=>	-1.05,
            'EAS-LR-000'	=>	-6.47,
            'EAS-ME-001'	=>	-5.99,
            'EAS-ME-003'	=>	-5.85,
            'EAS-ME-002'	=>	-5.78,
            'EAS-MS-000'	=>	12.25,
            'EAS-LR-002'	=>	-5.47,
            'EAS-MS-001'	=>	13.8,
            'EAS-MS-003'	=>	9.33,
            'EAS-MS-002'	=>	20.17,
            'EAS-MS-004'	=>	14.34,
            'EAS-MS-006'	=>	14.34,
            'EAS-MS-005'	=>	7.87,
            'EAS-MS-007'	=>	10.99,
            'EAS-MS-008'	=>	11.6,
            'EAS-MS-011'	=>	6.58,
            'EAS-MS-010'	=>	0.25,
            'EAS-MS-012'	=>	5.42,
            'EAS-MS-013'	=>	6.17,
            'EAS-MZ-000'	=>	11.6,
            'EAS-MS-014'	=>	7.87,
            'EAS-MZ-001'	=>	10.99,
            'EAS-MZ-003'	=>	10.99,
            'EAS-MZ-002'	=>	15.09,
            'EAS-MZ-004'	=>	13.6,
            'EAS-MZ-005'	=>	19.68,
            'EAS-MZ-006'	=>	19.68,
            'EAS-MZ-008'	=>	6.17,
            'EAS-MZ-007'	=>	5.8,
            'EAS-NS-000'	=>	13.6,
            'EAS-NS-001'	=>	13.6,
            'EAS-NS-002'	=>	10.59,
            'EAS-NS-003'	=>	1.82,
            'EAS-NS-004'	=>	3.45,
            'EAS-NS-005'	=>	5.06,
            'EAS-NS-007'	=>	2.88,
            'EAS-NS-010'	=>	8.35,
            'EAS-NS-006'	=>	7.87,
            'EAS-NS-011'	=>	10.43,
            'EAS-NS-012'	=>	32.68,
            'EAS-NS-013'	=>	32.68,
            'EAS-NS-009'	=>	2.88,
            'EAS-NS-014'	=>	4.38,
            'EAS-PL-001'	=>	7.44,
            'EAS-PL-006'	=>	-1.54,
            'EAS-PL-005'	=>	-1.54,
            'EAS-PL-007'	=>	-0.34,
            'EAS-PL-008'	=>	9.87,
            'EAS-PL-009'	=>	9.87,
            'EAS-PL-010'	=>	5.06,
            'EAS-PL-011'	=>	5.06,
            'EAS-RE-007'	=>	-3.45,
            'EAS-RE-014'	=>	0.25,
            'EAS-SB-000'	=>	-3.45,
            'EAS-SB-001'	=>	-2.96,
            'EAS-SB-002'	=>	-4.6,
            'EAS-SB-003'	=>	-4.6,
            'EAS-SB-005'	=>	-4.41,
            'EAS-SB-004'	=>	-5.47,
            'EAS-SB-006'	=>	-2.29,
            'EAS-SE-000'	=>	7.87,
            'EAS-SU-000'	=>	14.34,
            'EAS-SU-001'	=>	7.87,
            'EAS-SU-002'	=>	13.6,
            'EAS-TY-000'	=>	19.68,
            'EAS-TY-001'	=>	18.5,
            'EAS-TY-002'	=>	14.34,
            'EAS-TY-003'	=>	20.17,
            'EAS-TY-004'	=>	9.33,
            'EAS-TY-005'	=>	10.43,
            'EAS-TY-006'	=>	10.99,
            'EAS-TY-007'	=>	15.09,
            'EAS-TY-008'	=>	14.34,
            'EAS-TY-009'	=>	15.91,
            'EAS-TY-010'	=>	13.6,
            'EAS-TY-011'	=>	12.89,
            'EAS-TY-012'	=>	10.43,
            'EAS-TY-013'	=>	13.24,
            'EAS-TY-014'	=>	23.14,
            'EAS-TY-015'	=>	13.08,
            'EAS-TY-017'	=>	8.84,
            'EAS-TY-016'	=>	4.06,
            'EAS-TY-018'	=>	8.84,
            'EAS-TY-020'	=>	15.91,
            'EAS-TY-021'	=>	10.43,
            'EAS-TY-023'	=>	9.87,
            'EAS-TY-022'	=>	7.87,
            'EAS-TY-024'	=>	12.89,
            'EAS-TY-026'	=>	13.6,
            'EAS-TY-027'	=>	13.6,
            'EAS-TY-029'	=>	12.89,
            'EAS-TY-028'	=>	13.6,
            'EAS-TY-030'	=>	12.89,
            'EAS-TY-032'	=>	-3.45,
            'EAS-TY-033'	=>	-3.45,
            'EAS-VW-000'	=>	23.26,
            'EAS-VW-008'	=>	5.8,
            '96SKV500'	=>	-5.29,
            '96SKV501'	=>	-5.38,
            '96SKV502'	=>	-4.83,
            '96SKV503'	=>	-5.38,
            '96SKV504'	=>	-6.49,
            '96SKV505'	=>	-6.15,
            '96SKV506'	=>	15.76,
            '96SKV507'	=>	4.54,
            '96SKV508'	=>	14.76,
            '96SKV509'	=>	4.48,
            '96SKV510'	=>	6.37,
            '96SKV511'	=>	5.61,
            '96SKV512'	=>	9.09,
            '96SKV513'	=>	10.35,
            '96SKV514'	=>	0.93,
            '96SKV515'	=>	11.13,
            '96SKV516'	=>	11.57,
            '96SKV517'	=>	10.56,
            '96SKV518'	=>	8.37,
            '96SKV519'	=>	7.22,
            '96SKV520'	=>	10.8,
            '96SKV521'	=>	9.07,
            '96SKV522'	=>	12.58,
            '96SKV523'	=>	-1.32,
            '96SKV524'	=>	7.42,
            '96SKV525'	=>	-3.32,
            '96SKV526'	=>	5.56,
            '96SKV527'	=>	3.12,
            '96SKV528'	=>	2.75,
            '96SKV529'	=>	8.19,
            '96SKV530'	=>	10.33,
            '96SKV531'	=>	-0.1,
            '96SKV532'	=>	7.62,
            '96SKV533'	=>	8.15,
            '96SKV534'	=>	8.84,
            '96SKV535'	=>	8.86,
            '96SKV536'	=>	9.43,
            '96SKV537'	=>	7.36,
            '96SKV538'	=>	7.85,
            '96SKV539'	=>	11.72,
            '96SKV540'	=>	12.19,
            '96SKV541'	=>	1.37,
            '96SKV542'	=>	12.07,
            '96SKV543'	=>	9.52,
            '96SKV544'	=>	9.99,
            '96SKV545'	=>	14.94,
            '96SKV546'	=>	6.96,
            '96SKV547'	=>	13.9,
            '96SKV548'	=>	1.39,
            '96SKV549'	=>	15.02,
            '96SKV550'	=>	8.91,
            '96SKV551'	=>	8.5,
            '96SKV552'	=>	9.19,
            '96SKV553'	=>	10.67,
            '96SKV554'	=>	12.49,
            '96SKV555'	=>	8.15,
            '96SKV556'	=>	8.41,
            '96SKV557'	=>	7.28,
            '96SKV558'	=>	9.99,
            '96SKV559'	=>	9.07,
            '96SKV561'	=>	6.28,
            '96SKV562'	=>	-2.6,
            '96SKV563'	=>	0.61,
            '96SKV564'	=>	9.21,
            '99590099501'	=>	-4.23,
            'EAS-CH-008'	=>	-5.5,
            'EAS-PE-001'	=>	-4.14,
            'EAS-FT-004'	=>	-6.4,
            'EAS-SU-003'	=>	-3,
        ];

        foreach ($users as $user) {
            foreach ($array as $key => $value) {

                $product = Product::where('supplier_reference', $key)->first();

                $margin = new ProductUserMargin();
                $margin->product_id = $product->id;
                $margin->user_id = $user->id;
                $margin->margin = $value;
                $margin->created_at = Carbon::now();
                $margin->updated_at = Carbon::now();
                $margin->save();
            }
        }

        dd(123);*/
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
            'brands' => $brands,
            'favProducts' => $favProducts
        ]);
    }
}
