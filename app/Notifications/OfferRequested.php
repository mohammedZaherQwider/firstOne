<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OfferRequested extends Notification
{
    use Queueable;
    protected $offer;
    protected $sender;
    protected $msg;

    /**
     * Create a new notification instance.
     */
    public function __construct($offer, $sender)
    {
        $this->offer = $offer;
        $this->sender = $sender;
        $this->msg = "تم طلب العرض {$this->offer->name} بواسطة {$this->sender->name}";
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toDatabase($notifiable)
    {
        return [
            'msg' => $this->msg
        ];
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
