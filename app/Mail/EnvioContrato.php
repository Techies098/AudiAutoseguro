<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class EnvioContrato extends Mailable
{
    use Queueable, SerializesModels;

    public $mensaje;
    public $adjunto;
    public $contrato;
    /**
     * Create a new message instance.
     */
    public function __construct($mensaje, $contrato, $adjunto)
    {
        $this->mensaje = $mensaje;
        $this->adjunto = $adjunto;
        $this->contrato = $contrato;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Envio Contrato',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'administrador.contratos.mails.enviarcorreo',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            Attachment::fromData(fn () => $this->adjunto->get(), 'Contrato.pdf')->withMime('application/pdf')
        ];
    }
}
