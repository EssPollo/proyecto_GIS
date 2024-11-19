<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class NotificacionBotTelegram extends Notification
{
    use Queueable;
    private $mensaje;

    /**
     * Create a new notification instance.
     */
    public function __construct($mensaje)
    {
        //
        $this->mensaje=$mensaje;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return [TelegramChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toTelegram(object $notifiable): TelegramMessage
    {
        try{
            return (new TelegramMessage)
            ->to('5173246341')
            ->content($this->mensaje);

        }catch( \Exception $e) {
            logger()->error('Error en el mensaje de telegram: ' . $e->getMessage());
        }
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
