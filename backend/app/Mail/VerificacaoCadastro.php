<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VerificacaoCadastro extends Mailable
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
            subject: 'Verificação de cadastro - Librando',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.verificacao-cadastro',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}