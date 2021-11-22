<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AjsApi extends Model
{
    use HasFactory;

     static function synchronizationStock(){

         try
         {
             $products = DB::table('product')
             $arrayChunkTow = array_chunk($arrTow,1000);
             foreach ($arrayChunkTow as $key => $value) {
                 $inputQuery = array(
                     'authData' => array(
                         'Login' => $apiMTRLoginLDZ,
                         'Password' => $apiMTRPassLDZ
                     ),
                     'articleList' => $value);
                 $requst = $client->ArticlesInformation($inputQuery);
                 $requst = json_decode(json_encode($requst), true);
                 $requst = $requst['ArticlesInformationResult']['Article'];

                 $requstCode = [];
                 $requstAmount = [];
                 // echo "====== OK =====" . PHP_EOL;

                 for ($i = 0; $i < count($requst); $i++) {
                     if ($requst[$i]['ErrorMessage'] === null) {

                         array_push($requstCode, $requst[$i]['ArticleId']);
                         array_push($requstAmount, $requst[$i]['Branches']['Branch']['Amount']);
                         //var_dump($requst[$i]['ArticleId']);
                         //var_dump($requst[$i]['Branches']['Branch']['Amount']);
                     }
                 }
                 $mail_message .= 'Found in ajs: ' . count($requstCode) . '<br/>';



                 for ($i = 0; $i < count($requstCode); $i++) {
                     if ($requstAmount[$i] === '>5')
                         $requstAmount[$i] = 5;

                     //var_dump($requstAmount[$i]."     ".$requstCode[$i]."\n");
                     $sql = "UPDATE ps_product SET quantity = '{$requstAmount[$i]}' WHERE supplier_reference = '{$requstCode[$i]}'";
                     $result = $conn->query($sql);

                 }


             }
         }
         catch (SoapFault $fault)
         {

         }
     }
}
