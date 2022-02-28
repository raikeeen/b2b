<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use SimpleXLSX;

class UpdateStockSkv implements ShouldQueue
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
        \DB::table('product')->where('supplier_id', 7)->update(array('stock_supplier' => 0));

        $client1 = new \GuzzleHttp\Client();
        $resource = fopen(public_path().'/storage/download/skv_stock.csv', 'w');
        $client1->request('GET', 'http://www.esen.pl/stock/skv_stock.csv', ['sink' => $resource]);

        $filename = public_path().'/storage/download/skv_stock.csv';
        $file = fopen($filename, "r");

        if ($file) {
            while (($line = fgets($file)) !== false) {
                $line = str_replace('"','',$line);
                $line = explode(';', $line);

                DB::table('product')
                    ->select(['supplier_reference', 'stock_supplier', 'supplier_id'])
                    ->where([
                        ['supplier_id', 7],
                        ['supplier_reference', $line[0]]
                    ])->update([
                        'stock_supplier' => stripos($line[1], 'Out of Stock') !== false ? 0 : 5
                    ]);
            }
            fclose($file);
            SendMail::dispatch(['name' => 'SKV stocks success', 'time' => 'Время выполнения скрипта: '.' сек.'])->onQueue('mail');
        } else {
            // error opening the file.
        }
    }
}
