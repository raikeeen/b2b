<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Myrzan\TecDocClient\Client;
use Myrzan\TecDocClient\Generated\GetArticleDirectSearchAllNumbersWithState;
use Myrzan\TecDocClient\Generated\GetArticleIdsWithState;
use Myrzan\TecDocClient\Generated\GetArticleLinkedAllLinkingTarget3;
use Myrzan\TecDocClient\Generated\GetArticleLinkedAllLinkingTargetManufacturer;
use Myrzan\TecDocClient\Generated\GetArticleLinkedAllLinkingTargetsByIds3;
use Myrzan\TecDocClient\Generated\GetChildNodesAllLinkingTarget2;
use Myrzan\TecDocClient\Generated\GetDirectArticlesByIds6;
use Myrzan\TecDocClient\Generated\GetGenericArticlesByManufacturer6;
use Myrzan\TecDocClient\Generated\GetKeyValues;
use Myrzan\TecDocClient\Generated\GetModelSeries2;
use Myrzan\TecDocClient\Generated\GetVehicleByIds3;
use Myrzan\TecDocClient\Generated\GetVehicleIdsByCriteria;

class TecDocController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function ajaxRequest()
    {
        return view('ajaxRequest');
    }

    /**
     * Create a new controller instance.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajaxCartPost(Request $request)
    {
        $input = $request->all();

        Log::info($input);

        return response()->json(['success'=>'Got Simple Ajax Request.']);
    }

    public function ajaxGetModelSeries2Post(Request $request)
    {
        $client = new Client();

        $params = (new GetModelSeries2())
            ->setCountry('LT')
            ->setLang('LT')
            ->setLinkingTargetType('P')
            ->setFavouredList(1)
            ->setManuId($request->manuId);
        $response = $client->getModelSeries2($params);
        $models = [];
        //$//model = $response->getData();
        foreach ($response->getData() as $key => $model)
            $models[$key] = [
                'modelName' => $model->getModelname(),
                'modelId' => $model->getModelId(),
                'years' => $this->data($model),

            ];

        /* Log::info($input);*/

        return response()->json($models);
    }
    public function ajaxGetVehicleIdsByCriteriaPost(Request $request)
    {
        $client = new Client();
        $vehicleIdsByCriteria = (new GetVehicleIdsByCriteria())
            ->setCountriesCarSelection('LT')
            ->setLang('LT')
            ->setCarType('P')
            ->setManuId($request->manuId)
            ->setModId($request->modId);

        $vehicleIdsByCriteriaResponse = $client->getVehicleIdsByCriteria($vehicleIdsByCriteria);

        $arrayVehicleIdsByCriteria = array_chunk($vehicleIdsByCriteriaResponse->getData(),25);

        $searchCarId = function ($item){
            return $item->getCarId();
        };

        $modification = [];
        $fuels = [];

        foreach ($arrayVehicleIdsByCriteria as $itemCarId){

            $arrayCarId = array_map($searchCarId, $itemCarId);

            $getVehicleByIds3 = (new GetVehicleByIds3())
                ->setCountriesCarSelection('LT')
                ->setArticleCountry('LT')
                ->setLang('LT')
                ->setCountry('LT')
                ->setCarIds($arrayCarId);
            $getVehicleByIds3Response = $client->getVehicleByIds3($getVehicleByIds3)->getData();

            foreach ($getVehicleByIds3Response as $itemModification) {

                $mod = $itemModification->getVehicleDetails();
                $fuels[$mod->getCarId()] = $mod->getFuelType();
                $modification[$mod->getCarId()] = [
                    'cylinderCapacityLiter' => strlen($mod->getCylinderCapacityLiter() / 100) !== 1 ? $mod->getCylinderCapacityLiter() / 100 : ($mod->getCylinderCapacityLiter() / 100) . '.0',
                    'powerHpTo' => $mod->getPowerHpTo(),
                    'powerKwTo' => $mod->getPowerKwTo(),
                    'typeName' => $mod->getTypeName(),
                    'fuelType' => $mod->getFuelType(),
                    'years' => $this->data($mod)

                ];
            }
        }
        $fuels = array_unique($fuels);


        return response()->json([
            'fuels' => $fuels,
            'modification' => $modification
        ]);
    }

    public function getVehicleByIds3($arrayCarId)
    {
        $client = new Client();

        $modification = [];

        $getVehicleByIds3 = (new GetVehicleByIds3())
            ->setCountriesCarSelection('LT')
            ->setArticleCountry('LT')
            ->setLang('LT')
            ->setCountry('LT')
            ->setCarIds($arrayCarId);

        $getVehicleByIds3Response = $client->getVehicleByIds3($getVehicleByIds3)->getData();


        $mod = $getVehicleByIds3Response[0]->getVehicleDetails();

        $modification = [
            'cylinderCapacityLiter' => strlen($mod->getCylinderCapacityLiter() / 100) !== 1 ? $mod->getCylinderCapacityLiter() / 100 : ($mod->getCylinderCapacityLiter() / 100) . '.0',
            'manuName' => $mod->getManuName(),
            'modelName' => $mod->getModelName(),
            'carId' => $arrayCarId[0],
            'cylinderCapacityCcm' => $mod->getCylinderCapacityCcm(),
            'constructionType' => $mod->getConstructionType(),
            'powerHpTo' => $mod->getPowerHpTo(),
            'powerKwTo' => $mod->getPowerKwTo(),
            'typeName' => $mod->getTypeName(),
            'fuelType' => $mod->getFuelType(),
            'years' => $this->data($mod)
        ];

        return $modification;
    }

    public function products(Request $request)
    {

        $client = new Client();
        $articles = [];
        $carId = isset(request()->carId) ? request()->carId : $request->carId;
        $category = isset(request()->category) ? request()->category : $request->category;

        $getArticleIdsWithState = (new getArticleIdsWithState())
            ->setArticleCountry('LT')
            ->setLang('LT')
            ->setLinkingTargetId($carId)
            ->setLinkingTargetType('P')
            ->setAssemblyGroupNodeId($category);

        $getVehicleByIds3Response = $client->getArticleIdsWithState($getArticleIdsWithState)->getData();

        foreach ($getVehicleByIds3Response as $getItem) {
            array_push($articles, $getItem->getArticleNo());
        }
        $products = Product::whereIn('supplier_reference', $articles)
            ->paginate(15)
            ->appends(request()->query());

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
        } elseif(request()->sort === 'avail') {

            $productsSort = $products->transform(function($product) {
                if($product->stock_shop + $product->stock_supplier > 0)
                    return $product;
            })->filter(function($value, $key) {
                return !is_null($value);
            });

            $products = new LengthAwarePaginator($productsSort, $productsSort->count(), $products->perPage(), request()->page, [
                'path'  => request()->url(),
                'query' => request()->query(),
            ]);

        } elseif(request()->sort === 'kod') {
            $products->setCollection(
                collect(
                    collect($products->items())->sortBy('reference')
                )->values()
            );
        }

        return view('catalog.tecdoc.products', [
            'products' => $products,
        ]);
    }

    public function tecDocCatalog(Request $request)
    {

        $modification = [];
        if (isset($request->modification)) {
            $modification = $this->getVehicleByIds3([$request->modification]);
        }

        $client = new Client();

        $categories = (new GetChildNodesAllLinkingTarget2())
            ->setArticleCountry('LT')
            ->setLang('LT')
            ->setLinkingTargetType('P')
            ->setLinkingTargetId(isset($request->modification) ? $request->modification: null);

        $getCategories = $client->getChildNodesAllLinkingTarget2($categories)->getData();

        return view('catalog.tecdoc.catalog', [
            'categories' => $getCategories,
            'modification' => $modification
        ]);
    }
    public function countProduct($parentId, $carId)
    {
        $client = new Client();
        $productsCat = (new getArticleIdsWithState())
            ->setArticleCountry('LT')
            ->setLang('LT')
            ->setLinkingTargetType('P')
            ->setAssemblyGroupNodeId($parentId)
            ->setLinkingTargetId($carId);

        $productsCatResponse = $client->getArticleIdsWithState($productsCat)->getData();
        $articles = [];

        foreach ($productsCatResponse as $productCat) {
            array_push($articles, $productCat->getArticleNo());
        }
        $products = Product::whereIn('supplier_reference', $articles)->count();

        return $products;
    }
    public function getParentCategory(Request $request)
    {
        $client = new Client();

        $categories = (new GetChildNodesAllLinkingTarget2())
            ->setArticleCountry('LT')
            ->setLang('LT')
            ->setLinkingTargetType('P')
            ->setParentNodeId($request->parentId)
            ->setLinkingTargetId($request->carId);

        $getCategories = $client->getChildNodesAllLinkingTarget2($categories)->getData();
        $childs = [];

        foreach ($getCategories as $category) {
            array_push($childs,[
                'assemblyGroupName' => $category->getAssemblyGroupName(),
                'assemblyGroupNodeId' => $category->getAssemblyGroupNodeId(),
                'parentNodeId' => $category->getParentNodeId(),
                'hasChilds' => $category->getHasChilds(),
                'count' => $this->countProduct($category->getAssemblyGroupNodeId(), $request->carId)
            ]);
        }

        return response()->json($childs);
    }

    public function data($model)
    {
        return  '('.substr($model->getYearOfConstrFrom(),-2).'.'.
            substr($model->getYearOfConstrFrom(),0,4).' - '.
            substr($model->getYearOfConstrTo(),-2).'.'.
            substr($model->getYearOfConstrTo(),0,4).')';

    }
    public function getCarsAndOecodes(Request $request)
    {
        $product = Product::where('reference', $request->reference)->first();

        if(isset($request->reference) and isset($product->supplier_reference)) {
            $client = new Client();
            $oeCodes = [];
            $getAtributs = [];

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
                    ->setAttributs(true)
                    ->setArticleId([$getArticleId]);

                $getDirectArticlesByIds6Response = $client->getDirectArticlesByIds6($getDirectArticlesByIds6)->getData();

                foreach ($getDirectArticlesByIds6Response[0]->getOenNumbers() as $getOe) {
                    array_push($oeCodes, [
                        'name' => $getOe->getBrandName(),
                        'code' => $getOe->getOeNumber()
                    ]);
                }
                foreach ($getDirectArticlesByIds6Response[0]->getArticleAttributes() as $getAtr) {
                    array_push($getAtributs, [
                        'name' => $getAtr->getAttrName(),
                        'value' => $getAtr->getAttrValue()
                    ]);
                }

                return response()->json([
                    'oe' => $oeCodes,
                    'article' => $getArticleId,
                    'info' => $getAtributs,
                    'supplier_reference' => $product->supplier_reference
                ]);
            }
        }
        return null;
    }
    public function getArticleManufacturer(Request $request)
    {
        $client = new Client();
        $manuArray = [];

        $getArticleLinkedAllLinkingTargetManufacturer = (new GetArticleLinkedAllLinkingTargetManufacturer())
            ->setArticleCountry('LT')
            ->setArticleId($request->article)
            ->setLinkingTargetType('P');

        $getArticleLinkedAllLinkingTargetManufacturerResponse = $client->getArticleLinkedAllLinkingTargetManufacturer($getArticleLinkedAllLinkingTargetManufacturer)->getData();
        foreach ($getArticleLinkedAllLinkingTargetManufacturerResponse as $key => $manu) {

            $getArticleLinkedAllLinkingTarget3  = (new GetArticleLinkedAllLinkingTarget3())
                ->setLang('LT')
                ->setArticleCountry('LT')
                ->setArticleId($request->article)
                ->setLinkingTargetManuId($manu->getManuId())
                ->setLinkingTargetType('P');

            $getArticleLinkedAllLinkingTarget3Response = $client->getArticleLinkedAllLinkingTarget3($getArticleLinkedAllLinkingTarget3)->getData()[0]->getArticleLinkages();
            $manuArray[$key] = [
                'name' => $manu->getManuName(),
                'children' => []
            ];
            /* array_push($manuArray, [
                 'name' => $manu->getManuName() => '']);*/

            foreach ($getArticleLinkedAllLinkingTarget3Response as $kerCarInfo => $carInfo) {

                $getVehicleByIds3 = (new GetVehicleByIds3())
                    ->setCountriesCarSelection('LT')
                    ->setArticleCountry('LT')
                    ->setLang('LT')
                    ->setCountry('LT')
                    ->setCarIds([$carInfo->getLinkingTargetId()]);

                $getVehicleByIds3Response = $client->getVehicleByIds3($getVehicleByIds3)->getData();


                $mod = $getVehicleByIds3Response[0]->getVehicleDetails();
                //$manuArray[$key]['children'] += [$getCarInfo->getModelDesc() => []];
                array_push($manuArray[$key]['children'], [
                    'name' => $mod->getManuName().' '.$mod->getModelName().' '.$mod->getTypeName().', '.$this->data($mod).', '.
                        $mod->getCylinderCapacityCcm().' ccm, '.$mod->getPowerHpTo().' AG, '.$mod->getPowerKwTo().' kW, '.$mod->getFuelType(),
                    'carId' => '/vehicle/'.$mod->getCarId()
                ]);


            }

        }
        return response()->json($manuArray);
    }
    public function getCars(Request $request)
    {
        if(isset($request->article)) {
            $client = new Client();
            $cars = [];
            $carsCombine = [];

            $getArticleLinkedAllLinkingTarget3 = (new getArticleLinkedAllLinkingTarget3())
                ->setArticleCountry('LT')
                ->setLang('LT')
                ->setLinkingTargetType('P')
                ->setLinkingTargetManuId(183)
                ->setArticleId($request->article);
            $getArticleLinkedAllLinkingTarget3Response = $client->getArticleLinkedAllLinkingTarget3($getArticleLinkedAllLinkingTarget3)->getData()[0]->getArticleLinkages();

            foreach ($getArticleLinkedAllLinkingTarget3Response as $getCar) {

                array_push($cars, $this->getVehicleByIds3([$getCar->getLinkingTargetId()]));
            }

            foreach ($cars as $car) {

                $carsCombine += [$car['modelName'] => []];
                array_push($carsCombine[$car['modelName']], $car);
            }

            return response()->json($carsCombine);
        }
        return null;
    }

    public function search($string)
    {
        $oemCode = $this->getArticleDirectSearchAllNumbersWithState($string, 10);
        if(!is_null($oemCode)) {
            return $oemCode;
        }
        $oemArc = $this->getArticleDirectSearchAllNumbersWithState($string, 0);
        $oemCode = $this->getArticleDirectSearchAllNumbersWithState($string, 1);
        $tradeCode = $this->getArticleDirectSearchAllNumbersWithState($string, 2);
        $comparableCode = $this->getArticleDirectSearchAllNumbersWithState($string, 3);
        $eanCode = $this->getArticleDirectSearchAllNumbersWithState($string, 6);

        if (!is_null($oemArc) && !is_null($oemCode) && !is_null($tradeCode) && !is_null($comparableCode) && !is_null($eanCode))
            return array_merge($oemArc, $oemCode,$comparableCode,$eanCode,$tradeCode);
        return [];
    }
    public function searchOe($string)
    {
        $oemCode = $this->getArticleDirectSearchAllNumbersWithState($string, 1);
        if(!is_null($oemCode)) {
            return $oemCode;
        }
        return [];
    }

    public function getArticleDirectSearchAllNumbersWithState($string, $numberType)
    {
        $client = new Client();

        $getArticleDirectSearchAllNumbersWithState = (new getArticleDirectSearchAllNumbersWithState())
            ->setArticleCountry('LT')
            ->setLang('LT')
            ->setArticleNumber($string)
            ->setSearchExact(true)
            ->setSortType(2)
            ->setNumberType($numberType);

        $getArticleDirectSearchAllNumbersWithStateResponse = $client->getArticleDirectSearchAllNumbersWithState($getArticleDirectSearchAllNumbersWithState)->getData();

        return $getArticleDirectSearchAllNumbersWithStateResponse;
    }

}
