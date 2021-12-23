<?php

namespace App\Jobs;

use App\Models\B1Api;
use App\Models\DocumentB1;
use App\Models\Order;
use App\Models\Tax;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GetDocumentB1 implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $order = Order::Find($this->id);

        $itemB1 = [];
        foreach ($order->orderitem as $item) {

            array_push($itemB1, [
                'id' => $item->product->b1_product_id,
                'name' => $item->name,
                'quantity' => $item->amount*100,
                'vatRate' => config('cart.tax'),
                'price' => Tax::priceWithTax($item->price)*100,
                'sum' => Tax::priceWithTax($item->price*$item->qty)*100,
            ]);
        }

        $referenceOrderB1 = B1Api::pushOrder($order,$itemB1);

        $order->order_b1 = $referenceOrderB1['data']['orderId'];

        $newDocumentB1 = new DocumentB1();
        $newDocumentB1->name = $referenceOrderB1['data']['invoiceDocument'];
        $newDocumentB1->price = $order->total;
        $newDocumentB1->save();

        $order->document_b1_id = $newDocumentB1->id;
        $order->save();

        B1Api::getInvoice($order);

        dispatch(new SendMailFactura($order))->onQueue('mail');
    }
}
