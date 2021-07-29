<?php
namespace App\Notifications;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;
use App\Notifications\Auth;
class MyResetPassword extends ResetPassword

{
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Solicitud de restablecimiento de contraseña')
            ->greeting('¡Hola!')
            ->line('Estás recibiendo este correo porque hiciste una solicitud de recuperación de contraseña para tu cuenta.')
            ->action('Recuperar contraseña', route('password.reset', $this->token))
            ->line('Si no realizaste esta solicitud, no se requiere realizar ninguna otra acción.')
            ->line('Este enlace solo es válido dentro de los proximos 60 minutos.')
            ->salutation('Saludos, '. config('app.name'));
    }
}