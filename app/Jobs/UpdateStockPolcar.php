<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use SoapClient;

class UpdateStockPolcar implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        /*try {
            $apiMTRLoginLDZ = 'AUTODALYS';
            $apiMTRPassLDZ = 'Dcmn4%1lkdfS21';
            $apiMTRUrl="https://dedal.polcar.com/Dystrybutorzy/Products.asmx?wsdl";
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
                'Login' => $apiMTRLoginLDZ,
                'Password' => $apiMTRPassLDZ,
                'BranchID' => 1
            );

            $requst = $client->GetStockLevels($inputQuery);
            $requst = json_decode(json_encode($requst), true);
            $xml = simplexml_load_string($requst['GetStockLevelsResult']['any']);
            DB::table('product')
                ->where('supplier_id', 10)
                ->update(array('stock_supplier' => 0));

            foreach ($xml as $item) {
                $stock = DB::table('product')
                    ->select(['supplier_reference', 'stock_supplier'])
                    ->where('supplier_reference', (string)$item['Number'])
                    ->first();
                if(!empty($stock)) {
                    DB::table('product')
                        ->where('supplier_reference', '=', (string)$item['Number'])
                        ->update(array('stock_supplier' => (int)$item['Quantity']));
                }
            }
            SendMail::dispatch(['name' => 'Polcar stocks success', 'time' => 'Время выполнения скрипта: '.' сек.'])->onQueue('mail');
        } catch (SoapFault $fault) {

            SendMail::dispatch(['name' => 'ERROR Synchronization Polcar stocks'])->onQueue('mail');
        }*/
        try {
            $apiMTRLoginLDZ = 'AUTODALYS';
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
                'DistributorCode' => 'GRB',
                'PriceListName' => 'Garbus_KLNT',
                'Login' => $apiMTRLoginLDZ,
                'Password' => $apiMTRPassLDZ,
            );

            $requst = $client->GetDistributorPriceList($inputQuery);
            $requst = json_decode(json_encode($requst), true);
            $xml = simplexml_load_string($requst['GetDistributorPriceListResult']['any']);

            DB::table('product')
                ->where('supplier_id', 10)
                ->update(array(
                    'stock_supplier' => 0,
                    'stock_supplier2' => 0
                ));

            foreach ($xml as $item) {
                $stock = DB::table('product')
                    ->select(['supplier_reference', 'stock_supplier'])
                    ->where('supplier_reference', (string)$item['Number'].' Polcar')
                    ->first();
                if(!empty($stock)) {
                    DB::table('product')
                        ->where('supplier_reference', (string)$item['Number'].' Polcar')
                        ->update(array(
                            'stock_supplier' => (int)$item['Quantity'],
                            'price' => (float)$item['Price'] * 0.67 / 1.21
                        ));
                }
            }
            SendMail::dispatch(['name' => 'Polcar stocks success', 'time' => 'Время выполнения скрипта: '.' сек.'])->onQueue('mail');
        } catch (SoapFault $fault) {
            SendMail::dispatch(['name' => 'ERROR Synchronization Polcar stocks'])->onQueue('mail');
        }
    }
}
