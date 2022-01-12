<?php

namespace App\Http\Controllers;

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
            ,'vairo-koloneles' => 'kolonele','vairo-stiprintuvo-siurbliai' => 'siurblys'];
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


       /* $array = [
            'EAS-VW-009'	=>	-2.11,
            'EAS-VW-004'	=>	19.81,
            'EAS-VW-003'	=>	27.40,
            'EAS-VW-002'	=>	29.27,
            'EAS-SK-001'	=>	22.11,
            'EAS-RE-012'	=>	-23.9,
            'EAS-RE-011'	=>	-25.5,
            'EAS-VW-001'	=>	70.18,
            'EAS-RE-010'	=>	-25.5,
            'EAS-RE-008'	=>	-21.7,
            'EAS-RE-009'	=>	-21.7,
            'EAS-RE-005'	=>	-25.5,
            'EAS-RE-003'	=>	-9.08,
            'EAS-RE-002'	=>	40.44,
            'EAS-RE-001'	=>	0.397,
            'EAS-PL-003'	=>	-29.1,
            'EAS-PL-004'	=>	-11.4,
            'EAS-PL-002'	=>	15.97,
            'EAS-PL-000'	=>	20.46,
            'EAS-PE-000'	=>	18.88,
            'EAS-ME-000'	=>	-25.0,
            'EAS-KA-012'	=>	27.40,
            'EAS-FT-001'	=>	-2.11,
            'EAS-FT-000'	=>	-2.11,
            'EAS-FR-006'	=>	14.57,
            'EAS-CH-006'	=>	-29.1,
            'EAS-AU-000'	=>	-3.65,
            'EAS-BM-000'	=>	-22.0,
            'EAS-BM-001'	=>	-22.3,
            'EAS-BM-002'	=>	-19.2,
            'EAS-BM-003'	=>	-22.6,
            'EAS-BM-004'	=>	-24.2,
            'EAS-CH-000'	=>	-26.8,
            'EAS-CH-002'	=>	-29.1,
            'EAS-CH-001'	=>	-25.5,
            'EAS-CH-004'	=>	-22.6,
            'EAS-CH-007'	=>	-26.8,
            'EAS-DW-000'	=>	54.78,
            'EAS-DW-001'	=>	54.78,
            'EAS-DW-002'	=>	54.78,
            'EAS-FR-000'	=>	25.53,
            'EAS-FR-001'	=>	27.40,
            'EAS-FR-003'	=>	9.509,
            'EAS-FR-002'	=>	10.72,
            'EAS-FR-004'	=>	11.97,
            'EAS-FR-005'	=>	-16.8,
            'EAS-FR-007'	=>	27.40,
            'EAS-FT-002'	=>	-18.0,
            'EAS-FT-003'	=>	-1.28,
            'EAS-HD-001'	=>	40.44,
            'EAS-HD-000'	=>	51.53,
            'EAS-HD-002'	=>	40.44,
            'EAS-HD-003'	=>	45.69,
            'EAS-HD-004'	=>	37.96,
            'EAS-HD-005'	=>	37.96,
            'EAS-HD-007'	=>	31.31,
            'EAS-HD-006'	=>	17.43,
            'EAS-HD-008'	=>	29.27,
            'EAS-HD-009'	=>	7.261,
            'EAS-HD-011'	=>	29.27,
            'EAS-HD-010'	=>	20.46,
            'EAS-HD-012'	=>	51.53,
            'EAS-HY-000'	=>	76.59,
            'EAS-HY-001'	=>	76.59,
            'EAS-HY-002'	=>	45.69,
            'EAS-HY-003'	=>	76.59,
            'EAS-HY-004'	=>	45.69,
            'EAS-HY-006'	=>	37.96,
            'EAS-HY-007'	=>	37.96,
            'EAS-HY-005'	=>	45.69,
            'EAS-HY-008'	=>	27.40,
            'EAS-HY-009'	=>	58.23,
            'EAS-IS-000'	=>	-9.69,
            'EAS-KA-001'	=>	45.69,
            'EAS-KA-003'	=>	20.46,
            'EAS-KA-002'	=>	45.69,
            'EAS-KA-005'	=>	45.69,
            'EAS-KA-004'	=>	37.96,
            'EAS-KA-006'	=>	37.96,
            'EAS-KA-008'	=>	27.40,
            'EAS-KA-007'	=>	27.40,
            'EAS-KA-009'	=>	11.97,
            'EAS-KA-011'	=>	45.69,
            'EAS-KA-010'	=>	58.23,
            'EAS-LR-001'	=>	-10.8,
            'EAS-LR-000'	=>	-28.9,
            'EAS-ME-001'	=>	-27.3,
            'EAS-ME-003'	=>	-26.8,
            'EAS-ME-002'	=>	-26.6,
            'EAS-MS-000'	=>	33.46,
            'EAS-LR-002'	=>	-25.5,
            'EAS-MS-001'	=>	38.63,
            'EAS-MS-003'	=>	23.74,
            'EAS-MS-002'	=>	59.87,
            'EAS-MS-004'	=>	40.44,
            'EAS-MS-006'	=>	40.44,
            'EAS-MS-005'	=>	18.88,
            'EAS-MS-007'	=>	29.27,
            'EAS-MS-008'	=>	31.31,
            'EAS-MS-011'	=>	14.57,
            'EAS-MS-010'	=>	-6.52,
            'EAS-MS-012'	=>	10.72,
            'EAS-MS-013'	=>	13.22,
            'EAS-MZ-000'	=>	31.31,
            'EAS-MS-014'	=>	18.88,
            'EAS-MZ-001'	=>	29.27,
            'EAS-MZ-003'	=>	29.27,
            'EAS-MZ-002'	=>	42.94,
            'EAS-MZ-004'	=>	37.96,
            'EAS-MZ-005'	=>	58.23,
            'EAS-MZ-006'	=>	58.23,
            'EAS-MZ-008'	=>	13.22,
            'EAS-MZ-007'	=>	11.97,
            'EAS-NS-000'	=>	37.96,
            'EAS-NS-001'	=>	37.96,
            'EAS-NS-002'	=>	27.93,
            'EAS-NS-003'	=>	-1.28,
            'EAS-NS-004'	=>	4.136,
            'EAS-NS-005'	=>	9.509,
            'EAS-NS-007'	=>	2.229,
            'EAS-NS-010'	=>	20.46,
            'EAS-NS-006'	=>	18.88,
            'EAS-NS-011'	=>	27.40,
            'EAS-NS-012'	=>	101.5,
            'EAS-NS-013'	=>	101.5,
            'EAS-NS-009'	=>	2.229,
            'EAS-NS-014'	=>	7.261,
            'EAS-PL-001'	=>	17.43,
            'EAS-PL-006'	=>	-12.4,
            'EAS-PL-005'	=>	-12.4,
            'EAS-PL-007'	=>	-8.48,
            'EAS-PL-008'	=>	25.53,
            'EAS-PL-009'	=>	25.53,
            'EAS-PL-010'	=>	9.509,
            'EAS-PL-011'	=>	9.509,
            'EAS-RE-007'	=>	-18.8,
            'EAS-RE-014'	=>	-6.52,
            'EAS-SB-000'	=>	-18.8,
            'EAS-SB-001'	=>	-17.2,
            'EAS-SB-002'	=>	-22.6,
            'EAS-SB-003'	=>	-22.6,
            'EAS-SB-005'	=>	-22.0,
            'EAS-SB-004'	=>	-25.5,
            'EAS-SB-006'	=>	-14.9,
            'EAS-SE-000'	=>	18.88,
            'EAS-SU-000'	=>	40.44,
            'EAS-SU-001'	=>	18.88,
            'EAS-SU-002'	=>	37.96,
            'EAS-TY-000'	=>	58.23,
            'EAS-TY-001'	=>	54.32,
            'EAS-TY-002'	=>	40.44,
            'EAS-TY-003'	=>	59.87,
            'EAS-TY-004'	=>	23.74,
            'EAS-TY-005'	=>	27.40,
            'EAS-TY-006'	=>	29.27,
            'EAS-TY-007'	=>	42.94,
            'EAS-TY-008'	=>	40.44,
            'EAS-TY-009'	=>	45.69,
            'EAS-TY-010'	=>	37.96,
            'EAS-TY-011'	=>	35.60,
            'EAS-TY-012'	=>	27.40,
            'EAS-TY-013'	=>	36.77,
            'EAS-TY-014'	=>	69.79,
            'EAS-TY-015'	=>	36.23,
            'EAS-TY-017'	=>	22.11,
            'EAS-TY-016'	=>	6.168,
            'EAS-TY-018'	=>	22.11,
            'EAS-TY-020'	=>	45.69,
            'EAS-TY-021'	=>	27.40,
            'EAS-TY-023'	=>	25.53,
            'EAS-TY-022'	=>	18.88,
            'EAS-TY-024'	=>	35.60,
            'EAS-TY-026'	=>	37.96,
            'EAS-TY-027'	=>	37.96,
            'EAS-TY-029'	=>	35.60,
            'EAS-TY-028'	=>	37.96,
            'EAS-TY-030'	=>	35.60,
            'EAS-TY-032'	=>	-18.8,
            'EAS-TY-033'	=>	-18.8,
            'EAS-VW-000'	=>	70.18,
            'EAS-VW-008'	=>	11.97,
            '96SKV500'	=>	-24.9,
            '96SKV501'	=>	-25.2,
            '96SKV502'	=>	-23.4,
            '96SKV503'	=>	-25.2,
            '96SKV504'	=>	-29.0,
            '96SKV505'	=>	-27.8,
            '96SKV506'	=>	45.18,
            '96SKV507'	=>	7.770,
            '96SKV508'	=>	41.85,
            '96SKV509'	=>	7.565,
            '96SKV510'	=>	13.88,
            '96SKV511'	=>	11.34,
            '96SKV512'	=>	22.96,
            '96SKV513'	=>	27.14,
            '96SKV514'	=>	-4.24,
            '96SKV515'	=>	29.73,
            '96SKV516'	=>	31.22,
            '96SKV517'	=>	27.84,
            '96SKV518'	=>	20.53,
            '96SKV519'	=>	16.69,
            '96SKV520'	=>	28.64,
            '96SKV521'	=>	22.88,
            '96SKV522'	=>	34.57,
            '96SKV523'	=>	-11.7,
            '96SKV524'	=>	17.36,
            '96SKV525'	=>	-18.4,
            '96SKV526'	=>	11.17,
            '96SKV527'	=>	3.057,
            '96SKV528'	=>	1.803,
            '96SKV529'	=>	19.95,
            '96SKV530'	=>	27.06,
            '96SKV531'	=>	-7.68,
            '96SKV532'	=>	18.05,
            '96SKV533'	=>	19.81,
            '96SKV534'	=>	22.11,
            '96SKV535'	=>	22.18,
            '96SKV536'	=>	24.06,
            '96SKV537'	=>	17.16,
            '96SKV538'	=>	18.81,
            '96SKV539'	=>	31.70,
            '96SKV540'	=>	33.26,
            '96SKV541'	=>	-2.80,
            '96SKV542'	=>	32.86,
            '96SKV543'	=>	24.39,
            '96SKV544'	=>	25.95,
            '96SKV545'	=>	42.45,
            '96SKV546'	=>	15.84,
            '96SKV547'	=>	38.96,
            '96SKV548'	=>	-2.73,
            '96SKV549'	=>	42.69,
            '96SKV550'	=>	22.34,
            '96SKV551'	=>	20.98,
            '96SKV552'	=>	23.27,
            '96SKV553'	=>	28.19,
            '96SKV554'	=>	34.26,
            '96SKV555'	=>	19.81,
            '96SKV556'	=>	20.68,
            '96SKV557'	=>	16.89,
            '96SKV558'	=>	25.95,
            '96SKV559'	=>	22.88,
            '96SKV561'	=>	13.58,
            '96SKV562'	=>	-24.2,
            '96SKV563'	=>	-5.31,
            '96SKV564'	=>	23.35,
            '99590099501'	=>	-21.4,
            'EAS-CH-008'	=>	-25.6,
            'EAS-PE-001'	=>	-21.1,
            'EAS-FT-004'	=>	-28.6,
            'EAS-SU-003'	=>	-17.3,


        ];
        foreach ($array as $key => $value) {
           $a = Product::where('supplier_reference', (string)$key)->update(['trade_margin' => $value, 'updated_at' => Carbon::now()]);
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
            'brands' => $brands
        ]);
    }
}
