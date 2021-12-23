<?php

namespace App\Models;

use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venipack extends Model
{

    private $client;
    private $login;
    private $password;
    private $apiId;

    private $apiBaseUrl = 'https://go.venipak.lt';

    private $apiUrl = '/import/send.php';
    private $printPacksUrl = '/ws/print_label';
    private $printManifestUrl = '/ws/print_list';
    private $pickupPointsUrl = '/ws/get_pickup_points';

    private $apiUrlSuffix = '/import/send.php';
    private $printPacksUrlSuffix = '/ws/print_label.php';
    private $printManifestUrlSuffix = '/ws/print_list.php';
    private $pickupPointsUrlSuffix = '/ws/get_pickup_points.php';

    public function __construct()
    {
       /* $this->client     = new GuzzleClient([
            'headers' => [
                'Authorization' => 'Basic',
                'Content-Type'  => 'text/xml',
                'Request-method'=> 'POST'
            ]
        ]);*/
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
    public function getManifestNo($date, $warehouseId){
        $venipak_app_id = $this->apiId;
        $manifestNo = $venipak_app_id;
        $manifestNo .= str_replace('-','',substr($date,2));
        $manifestNo .= $warehouseId;
        //check all manifest for this date
        $db = Db::getInstance();
        $sql = 'SELECT * FROM ' . _DB_PREFIX_ . 'venipak_manifest WHERE manifest_date="'.pSQL($date).'" AND warehouse_id="'.$warehouseId.'" AND app_id ="'.$venipak_app_id.'"';
        $result = $db->executeS($sql);
        if(!empty($result)){
            //there are already manifest for this date and warehouse
            //check if there are any open manifests, if so - return the last open manifest
            $foundOpen = NULL;
            foreach($result as $one){
                if($one['status']==  VenipakCarrier::MANIFEST_STATUS_OPEN){
                    $foundOpen = $one;
                    break;
                }
            }
            if($foundOpen){
                return $one['manifest_no'];
            }else{
                //find max increment
                $sql = 'SELECT MAX(manifest_no) as max FROM ' . _DB_PREFIX_ . 'venipak_manifest WHERE manifest_date="'.pSQL($date).'" AND warehouse_id="'.$warehouseId.'" AND app_id ="'.$venipak_app_id.'"';
                $max = $db->getRow($sql);
                //create new
                //$manifestNo = str_pad($manifestNo, 2, "0", STR_PAD_LEFT);
                $max = $max['max'];
                $manifestNo = (float)$max+1;
                $manifestNo = self::fixManifestNo($manifestNo);

                $result = Db::getInstance()->insert('venipak_manifest', array(
                    'manifest_no' => $manifestNo,
                    'app_id' => $venipak_app_id,
                    'manifest_date'=>$date,
                    'warehouse_id'=>$warehouseId,
                    'status'=>VenipakCarrier::MANIFEST_STATUS_OPEN
                ));
                return $manifestNo;
            }

        }else{
            $manifestNo .= '01';
            $result = Db::getInstance()->insert('venipak_manifest', array(
                'manifest_no' => $manifestNo,
                'app_id' => $venipak_app_id,
                'manifest_date'=>$date,
                'warehouse_id'=>$warehouseId,
                'status'=>VenipakCarrier::MANIFEST_STATUS_OPEN
            ));

            return $manifestNo;
        }
        return false;
    }
    public function getManifestFile($manifestNo)
    {
        $data = array('user' => $this->login, 'pass' => $this->password, 'code' => $manifestNo);
        $result = $this->makeCurlCall($data, $this->printManifestUrl);
        return $result;
    }

}
