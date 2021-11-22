<?php

namespace App\Models;

use App\Mail\SynchronizationMail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use SoapClient;
use Illuminate\Support\Facades\DB;
class AjsApi extends Model
{
    use HasFactory;

     static function synchronizationStock(){

         try
         {
             $apiMTRLoginLDZ='000078';
             $apiMTRPassLDZ=md5('export');
             $apiMTRUrl="http://ajsparts.pl:82/F2000OpenService.svc?wsdl";
             $client = new SoapClient($apiMTRUrl, array('trace'=>1));

             $products = DB::table('product')
                 ->select('supplier_reference')
                 ->where('supplier_id', '=', 1)
                 ->get()
                 ->pluck('supplier_reference')
                 ->toArray();

             $productsChunk = array_chunk($products,1000);

             foreach ($productsChunk as $key => $value) {

                 $inputQuery = array(
                     'authData' => array(
                         'Login' => $apiMTRLoginLDZ,
                         'Password' => $apiMTRPassLDZ
                     ),
                     'articleList' => $value);
                 $requst = $client->ArticlesInformation($inputQuery);
                 $requst = json_decode(json_encode($requst), true);
                 $requst = $requst['ArticlesInformationResult']['Article'];

                 for ($i = 0; $i < count($requst); $i++) {
                     if ($requst[$i]['ErrorMessage'] === null) {

                         $count = $requst[$i]['Branches']['Branch']['Amount'];

                         if ($count === '>5') {

                             $count = 5;
                         }

                         DB::table('product')
                             ->where('supplier_reference', $requst[$i]['ArticleId'])
                             ->update([
                                 'stock_supplier' => $count,
                                 'price' => $requst[$i]['PriceNet']
                             ]);

                     }
                 }

             }
             Mail::to(config('mail')['admin'])
                 ->send(new SynchronizationMail(['name' => 'Synchronization AJS stocks success']));
         }
         catch (SoapFault $fault)
         {
             Mail::to(config('mail')['admin'])
                 ->send(new SynchronizationMail(['name' => 'ERROR Synchronization AJS stocks']));
         }
     }
}
