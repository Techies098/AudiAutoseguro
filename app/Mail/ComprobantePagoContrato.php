<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
// use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Mail\Attachment;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;

class ComprobantePagoContrato extends Mailable
{
    use Queueable, SerializesModels;
    public $pdf;
    public $data;

    public function __construct($pdf, $data)
    {
        $this->pdf = $pdf;
        $this->data = $data;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Comprobante Pago Contrato',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'cliente.contratos.comprobante',
        );
    }

    public function build()
    {
        return $this->view('cliente.contratos.comprobante')
            ->with('data', $this->data)
            ->attachData($this->pdf, 'comprobante.pdf', [
                'mime' => 'application/pdf',
            ]
        );
    }
}
