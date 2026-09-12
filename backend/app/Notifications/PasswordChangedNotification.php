<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PasswordChangedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage())
            ->subject('Sua senha foi alterada - Librando')
            ->greeting('Olá!')
            ->line('A senha da sua conta no Librando foi alterada com sucesso.')
            ->line('Se foi você quem fez essa alteração, nenhuma ação é necessária.')
            ->line('Se você NÃO reconhece essa alteração, entre em contato com o suporte imediatamente e redefina sua senha novamente.')
            ->salutation('Equipe Librando');
    }
}