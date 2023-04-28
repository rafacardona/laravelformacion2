<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendContactForm extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var string
     */
    public string $textSubject;
    /**
     * @var string
     */
    public string $textMessage;


    /**
     * Create a new message instance.
     *
     * Los datos de entrada para enviar el mail, se pasan por el constructor
     */
    public function __construct(string $subject, string $message)
    {
        $this->textMessage = $message;
        $this->textSubject = $subject;
    }

    /**
     * @return SendContactForm
     */
    public function build(): SendContactForm
    {

        return $this
            ->subject("Formulario de contacnto -" . config("app.name"))
            ->markdown("emails.contact");
    }
}
