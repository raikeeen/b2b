<?php

namespace App\Mail;

use App\Models\DocumentB1;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMailWitchDoc extends Mailable
{
    use Queueable, SerializesModels;
    protected $details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $factura = DocumentB1::Find($this->details->document_b1_id);
        $location = public_path($this->details->getFactura());
        return $this->subject('Sąskaita faktūra')->markdown('mails.OrderMailWithDoc')->attach($location);
    }
}
