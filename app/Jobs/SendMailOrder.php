<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMailOrder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $details;
    protected $order;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details, $order)
    {
        $this->details = $details;
        $this->order = $order;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->order->user->email)->send(new \App\Mail\NewOrderMail($this->details));
        Mail::to('info@rm-autodalys.eu')->send(new \App\Mail\NewOrderMail($this->details));
    }
}
