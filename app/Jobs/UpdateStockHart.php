<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use ZanySoft\Zip\Zip;

class UpdateStockHart implements ShouldQueue
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
        $file = Storage::disk('ftp-rm-lt')->get('supplier_imports/hart/hart.zip');
        Storage::disk('local')->put('/public/download/hart.zip', $file);

        $filename = public_path()  .'/storage/download/';

        $zip = Zip::open($filename . 'hart.zip');

        $zip->extract($filename);

        $price = fopen($filename . '61495_PriceList_EUR.csv', "r");
        $stock = fopen($filename . '61495_Quantity.csv', "r");

        DB::table('product')
            ->where('supplier_id', 13)
            ->update(array('stock_supplier' => 0));

        if ($stock) {
            while (($line = fgets($stock)) !== false) {
                $line = str_replace('"','',$line);
                $line = explode(';', $line);

                $stockDB = DB::table('product')
                    ->select(['supplier_reference', 'stock_supplier'])
                    ->where('supplier_reference', '=', $line[0])
                    ->first();
                if(!empty($stockDB)) {
                    if($line[1] == '>10') {
                        $line[1] = '10';
                    }

                    DB::table('product')
                        ->select(['supplier_reference', 'stock_supplier'])
                        ->where('supplier_reference', '=', $line[0])
                        ->update([
                            'stock_supplier' => $stockDB->stock_supplier + (int)$line[1]
                        ]);
                }
            }
            fclose($stock);
        }

        if ($price) {
            while (($line = fgets($price)) !== false) {
                $line = str_replace('"','',$line);
                $line = explode(';', $line);

                if(!empty($line[1])) {
                    DB::table('product')
                        ->select(['supplier_reference', 'price'])
                        ->where('supplier_reference', '=', $line[0])
                        ->update([
                            'price' => (float)$line[1]
                        ]);
                }
            }
            fclose($price);
        }

    }
}
