<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Myrzan\TecDocClient\Client;
use Myrzan\TecDocClient\Generated\GetChildNodesAllLinkingTarget2;
use Myrzan\TecDocClient\Generated\GetKeyValues;
use Myrzan\TecDocClient\Generated\GetModelSeries2;
use Myrzan\TecDocClient\Generated\GetVehicleByIds3;
use Myrzan\TecDocClient\Generated\GetVehicleIdsByCriteria;

class AjaxController extends Controller
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
                'hasChilds' => $category->getHasChilds()
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

}
