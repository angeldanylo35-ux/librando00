<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RecuperacaoSenha extends Mailable
{
    use Queueable, SerializesModels;

    public string $link;

    public function __construct(string $link)
    {
        $this->link = $link;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Recuperação de senha - Librando'
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.recuperacao-senha'
        );
    }

    public function attachments(): array
    {
        return [];
    }
}