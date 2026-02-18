<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PaymentSuccessNotification extends Notification
{
    use Queueable;
    protected $offer;
    protected $amount;
    protected $msg;
    /**
     * Create a new notification instance.
     */
    public function __construct($offer, $amount)
    {
        $this->offer = $offer;
        $this->amount = $amount;

        $this->msg = "تمت عملية الدفع بنجاح للعرض {$this->offer->title} بقيمة {$this->amount} ILS";
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
    public function toDatabase(object $notifiable)
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
