<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetCodeNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(private readonly string $code)
    {
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage())
            ->subject('Seu código de recuperação de senha - Librando')
            ->greeting('Olá!')
            ->line('Use o código abaixo para redefinir sua senha no Librando:')
            ->line(new \Illuminate\Support\HtmlString(
                '<div style="font-size:28px; font-weight:bold; letter-spacing:6px; text-align:center; margin:16px 0;">'
                . e($this->code) .
                '</div>'
            ))
            ->line('Esse código expira em 15 minutos.')
            ->line('Se você não solicitou essa recuperação, ignore este e-mail — sua senha continua segura.')
            ->salutation('Equipe Librando');
    }
}