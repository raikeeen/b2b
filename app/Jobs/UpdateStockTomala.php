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

class UpdateStockTomala implements ShouldQueue
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
        $ftp = Storage::disk('ftp-rm-lt');
        $file = $ftp->get('supplier_imports/vika/1888_01.gz');
        Storage::disk('local')->put('/public/download/1888_01.zip', $file);
        $ftp->getDriver()->getAdapter()->disconnect();

        $filename = public_path()  .'/storage/download/';

        $file_name_gz = $filename.'1888_01.gz';

        $buffer_size = 4096; // read 4kb at a time
        $out_file_name = str_replace('.gz', '', $file_name_gz);

        $file = gzopen($file_name_gz, 'rb');
        $file_name_csv = $filename. '1888_01.csv';
        $out_file = fopen($file_name_csv, 'wb');

        while (!gzeof($file)) {
            // Read buffer-size bytes
            // Both fwrite and gzread and binary-safe
            fwrite($out_file, gzread($file, $buffer_size));
        }

        // Files are done, close files
        fclose($out_file);
        gzclose($file);

        DB::table('product')
            ->where('supplier_id', 4)
            ->orWhere('supplier_id', 5)
            ->orWhere('supplier_id', 6)
            ->update(array('stock_supplier' => 0));

        $stock = fopen($file_name_csv, "r");
        try {
            if ($stock) {
                while (($line = fgets($stock)) !== false) {
                    $line = str_replace(['^', '>', '<'], '',$line);
                    $line = str_replace('/','.',$line);
                    $line = explode(';', $line);

                    $code = $line[0];
                    $price = floatval($line[4]) / 4.7;
                    $stock_sup = trim($line[3]);

                    if (!empty($stock_sup) && $stock_sup != '-') {
                        DB::table('product')
                            ->select(['supplier_reference', 'stock_supplier', 'price'])
                            ->where('reference', '=', $code)
                            ->update([
                                'stock_supplier' => $stock_sup,
                                'price' => $price
                            ]);
                    } elseif ($stock_sup == '-') {
                        DB::table('product')
                            ->select(['supplier_reference', 'stock_supplier', 'price'])
                            ->where('reference', '=', $code)
                            ->update([
                                'stock_supplier' => 0,
                                'price' => $price
                            ]);
                    }
                }
                fclose($stock);
            }
        } catch (\Exception $e) {

        }
    }
}
