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

class UpdateStockMaxgear implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $failOnTimeout = true;
    public $timeout = 100;
    public $tries = 1;
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
        $file = Storage::disk('ftp-maxgear')->get('STANY.csv');
        Storage::disk('local')->put('/public/download/maxgear_stock.csv', $file);
        $start = microtime(true);
        $filename = public_path().'/storage/download/maxgear_stock.csv';
        $file = fopen($filename, "r");
        \DB::table('product')->where('supplier_id', 3)->update(array('stock_supplier' => 0));

        if ($file) {
            while (($line = fgets($file)) !== false) {
                $line = explode(';', $line);

                $product = DB::table('product')
                    ->select(['supplier_reference','stock_supplier'])
                    ->where([
                        ['supplier_id', 3],
                        ['supplier_reference', $line[0]]
                    ])->first();
                if(isset($product)) {
                    DB::table('product')
                        ->select(['supplier_reference', 'stock_supplier'])
                        ->where('supplier_reference', $line[0])
                        ->update([
                            'stock_supplier' => $product->stock_supplier + $line[1]
                        ]);
                }
            }
            fclose($file);
            SendMail::dispatch(['name' => 'Maxgear stocks success', 'time' => 'Время выполнения скрипта: '.round(microtime(true) - $start, 4).' сек.'])->onQueue('mail');
        } else {
            // error opening the file.
        }
    }
}
