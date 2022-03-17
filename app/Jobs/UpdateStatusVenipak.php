<?php

namespace App\Jobs;

use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Venipak;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateStatusVenipak implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $failOnTimeout = true;
    public $timeout = 300;
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
        $orders = Order::all();
        $venipak = new Venipak();
        foreach ($orders as $order) {
            if($order->status_last == 'Išrašyta sąskaita-faktūra' && isset($order->venipak->send)) {
                $status = $venipak->checkStatus($order->venipak->label);
                if(stripos($status, 'Delivered')) {
                    $orderStatus = new OrderStatus();
                    $orderStatus->order_id = $order->id;
                    $orderStatus->status_id = 4;
                    $orderStatus->save();
                } elseif(stripos($status, 'Return')) {
                    $orderStatus = new OrderStatus();
                    $orderStatus->order_id = $order->id;
                    $orderStatus->status_id = 12;
                    $orderStatus->save();
                }
            }
        }

    }
}
