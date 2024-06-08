<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use Illuminate\Support\Facades\URL;

class ForgotPassword extends Notification
{
    use Queueable;

    public $token;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = URL::temporarySignedRoute('change-password', now()->addHours(12), ['token' => $this->token]);
    
        return (new MailMessage)
                    ->greeting('¡Hola!')
                    ->subject('Restablecer Contraseña')
                    ->line('Has recibido este correo electrónico para restablecer la contraseña de tu cuenta.')
                    ->action('Restablecer Contraseña', $url)
                    ->line("Si no solicitaste esto, por favor ignora este correo.")
                    ->line('¡Gracias!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
