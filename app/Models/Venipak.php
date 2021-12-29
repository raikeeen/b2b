<?php

namespace App\Models;

use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use SimpleXMLElement;

class Venipak extends Model
{
    protected $table = 'venipak_order';
    private $client;
    private $login;
    private $password;
    private $apiId;
    private $order;

    private $apiBaseUrl = 'https://go.venipak.lt';

    private $apiUrl = '/import/send.php';
    private $printPacksUrl = '/ws/print_label';
    private $trackUrl = '/ws/tracking';
    private $printManifestUrl = '/ws/print_list';
    private $pickupPointsUrl = '/ws/get_pickup_points';

    private $apiUrlSuffix = '/import/send.php';
    private $printPacksUrlSuffix = '/ws/print_label.php';
    private $printManifestUrlSuffix = '/ws/print_list.php';
    private $pickupPointsUrlSuffix = '/ws/get_pickup_points.php';

    public function __construct()
    {
        if (!empty($apiBaseUrl))
            $this->apiBaseUrl = $apiBaseUrl;

        $this->apiUrl = $this->apiBaseUrl.$this->apiUrlSuffix;
        $this->printPacksUrl = $this->apiBaseUrl.$this->printPacksUrlSuffix;
        $this->printManifestUrl = $this->apiBaseUrl.$this->printManifestUrlSuffix;
        $this->pickupPointsUrl = $this->apiBaseUrl.$this->pickupPointsUrlSuffix;

        $this->apiBaseUrl = 'https://go.venipak.lt';
        $this->login      = 'kavateka';
        $this->password   = 'vilnius47';
        $this->apiId      = '09189';
        //$this->order      = $order;
    }

    private function makeCurlCall($data, $url=''){

        if($url==''){
            $url = $this->apiUrl;
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        if (!empty($data))
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

        // execute the request
        $output = curl_exec($ch);

        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($output, 0, $header_size);
        $body = substr($output, $header_size);

        // close curl resource to free up system resources
        curl_close($ch);
        return $body;
    }
    public function getPickupPoints()
    {
        $result = $this->makeCurlCall('', $this->pickupPointsUrl);
        return json_decode($result);
    }
    public function getManifestNo(){
        $venipak_app_id = $this->apiId;
        $manifestNo = $venipak_app_id;
        $manifestNo .= date("ymd");
        $manifestNo .= '101';

        $manifestDB = DB::table('venipak_manifest')->select(['id','name'])->where('name', $manifestNo)->first();

        if(empty($manifestDB)) {
            DB::table('venipak_manifest')->insert([
                    'name' => $manifestNo,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]
            );
            $manifestDB = DB::table('venipak_manifest')->select(['id','name'])->where('name', $manifestNo)->first();

            return $manifestDB;
        }

        return $manifestDB;
    }
    public function getManifestFile($manifestNo)
    {
        $data = array('user' => $this->login, 'pass' => $this->password, 'code' => $manifestNo);
        $result = $this->makeCurlCall($data, $this->printManifestUrl);
        return $result;
    }
    public function getLabel($id, $idOrder)
    {
        //ex V09189E0101539
        $label = 'V'.str_pad($this->apiId, 5, "0", STR_PAD_LEFT).'E01'.str_pad($id + 1, 5, "0", STR_PAD_LEFT);
        if(Venipak::where('label', $label)->exists() || Venipak::where('order_id', $idOrder)->exists()) {
            return null;
        }

        return $label;
    }
    public function getLabelFile()
    {

    }
    public function checkStatus($label)
    {
        $result = $this->makeCurlCall(null, 'https://go.venipak.lt/ws/tracking?code=V09189E0001441&type=5');

        return $result;
    }
    public function getLabelsForOrders($order)
    {
        $data = array(
            'user' => $this->login,
            'pass' => $this->password,
            'pack_no' => $order->venipak->label,
            'code' => $order->venipak->manifest->name,
            'type' => 'get'
        );

        $result = $this->makeCurlCall($data, $this->printPacksUrl);

        return $result;
    }

    public function createOrder($request, $idOrder)
    {
        $idLabel = Venipak::latest()->first();

        if(empty($idLabel->id)) {
            $idLabel = 1;
        } else {
            $idLabel = $idLabel->id;
        }

        $manifest = $this->getManifestNo();
        $label = $this->getLabel($idLabel, $idOrder);

        if($label === null) {
            return null;
        }

        $venipak = new Venipak();
        $venipak->label = $label;
        $venipak->manifest_id = $manifest->id;
        $venipak->order_id = $idOrder;
        $venipak->weight = $request->weight;
        if(isset($request->is_cod)) {
            $venipak->is_cod = 1;
            $venipak->cod_amount = $request->suma_cod;
        }
        if(isset($request->call)) {
            $venipak->call = 1;
        }
        if(isset($request->is_global)) {
            $venipak->is_global = 1;
        }
        $venipak->save();

        return $venipak;
    }

    public function sendShipmentXML($request, $idOrder)
    {
        $order = $this->createOrder($request, $idOrder);

        if(!empty($order)) {

            $manifestNo = $order->manifest->name;
            $user = $order->orders->user;
            $address = $user->address;

            if (!empty($user->name) && !empty($user->surname)) {
                $name = $user->name . " " . $user->surname;
            } else {
                $name = $address->company_name;
            }


            //sender $consignors
            $xml = new SimpleXMLElement('<description/>');
            $xml->addAttribute('type', '1');

            $manifest = $xml->addChild('manifest');
            $manifest->addAttribute('title', $manifestNo);

            $shipment = $manifest->addChild('shipment');

            $consignor = $shipment->addChild('consignor');
            $consignor->addChild('name', 'RM Automotive');
            $consignor->addChild('company_code', '303859995');
            $consignor->addChild('country', 'LT');
            $consignor->addChild('city', 'Vilnius');
            $consignor->addChild('address', 'Panerių g. 39');
            $consignor->addChild('post_code', '03202');
            $consignor->addChild('contact_person', 'RM Automotive');
            $consignor->addChild('contact_tel', '868620868');
            $consignor->addChild('contact_email', 'info@rm-autodalys.lt');

            //add consignee
            $consignee = $shipment->addChild('consignee');
            $consignee->addChild('name', $address->company_name);
            $consignee->addChild('company_code', $address->vat); //assume that DNI is for company code
            $consignee->addChild('country', $this->getCountryNameByISO($address->country->name));
            $consignee->addChild('city', $address->city->name);
            $consignee->addChild('address', $address->street . " " . $address->biulding . " " . $address->apartment);
            $consignee->addChild('post_code', preg_replace('/[^0-9.]+/', '', $address->post_code));
            $consignee->addChild('contact_person', $name);
            $consignee->addChild('contact_tel', $address->phone);
            $consignee->addChild('contact_email', $user->email);


            $attribute = $shipment->addChild('attribute');
            $attribute->addChild('delivery_type', $order->delivery_time);
            $attribute->addChild('return_doc', 0);
            $attribute->addChild('cod', $order->cod_amount);
            $attribute->addChild('cod_type', 'EUR');
            $attribute->addChild('comment_call ', $order->call);

            if ($order->is_global == 1) {
                $global = $shipment->addChild('global');
                $global->addChild('global_delivery', $request->cod);
                $global->addChild('shipment_description', "");
                $global->addChild('value', $request->global_sum);
            }
            $pack = $shipment->addChild('pack');
            $pack->addChild('pack_no', $order->label);
            $pack->addChild('weight', $order->weight);

            $xmlText = $xml->asXML();


            $venipak_api_login = $this->login;
            $venipak_api_password = $this->password;

            $data = array('user' => $venipak_api_login, 'pass' => $venipak_api_password, 'xml_text' => $xmlText);


            $result = $this->makeCurlCall($data);

            return $this->parseReturnXml($result, $order);
        }
        return array('error' => "order null or already exist");
    }
    private function parseReturnXml($result, $order){
        $parsed = simplexml_load_string($result);
        if(is_bool($parsed)){ return array('error'=>'Error occured while reading response from webservice.'); }
        if(strval($parsed->attributes()->type[0])=='ok'){
            $order->send = 1;
            $order->save();
            return array('success'=>'1');
        }else{
            $order->send = 0;
            $order->save();
            //we have error
            $errors = [];
            foreach($parsed->error as $err){
                $errorText = '';
                if($err->attributes()->code!=""){
                    $errorText .= $err->attributes()->code.': ';
                }
                $errorText .= $err->text.' ';
                $errors[] = $errorText;
            }
            return array('error'=>$errors);
        }
    }
    public static function getCountryNameByISO($iso)
    {
        switch ($iso) {
            case 'Lithuania':
                return "LT";
            case 'Latvia':
                return "LV";
            case 'Estonia':
                return "EE";
            case 'Poland':
                return "PL";
            case 'Sweden':
                return "SE";
            case 'Netherlands':
                return "NL";
            case 'Norway':
                return "NO";
        }
    }
    public function delivery()
    {
        return $this->belongsTo('App\Models\Delivery');
    }
    public function orders()
    {
        return $this->belongsTo('App\Models\Order', 'order_id');
    }

    public function manifest()
    {
        return $this->belongsTo('App\Models\VenipakManifest');
    }
}
