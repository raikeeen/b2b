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
        Storage::disk('local')->put('/public/download/1888_01.gz', $file);
        $ftp->getDriver()->getAdapter()->disconnect();

        $filename = public_path()  .'/storage/download/';

        $zip = Zip::open($filename . '1888_01.gz');

        $zip->extract($filename);

        $price = fopen($filename . '1888_01.csv', "r");
        /*DB::table('product')
            ->where('supplier_id', 4)
            ->orWhere('supplier_id', 5)
            ->orWhere('supplier_id', 6)
            ->update(array('stock_supplier' => 0));*/
    }
}
