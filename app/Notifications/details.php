<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Maneger;

class details extends Notification
{
    use Queueable;
    public $detail;


    public function __construct($detail)
    {
        $this->detail = $detail;
    }


    public function via($notifiable)
    {
        return ['mail'];
    }


    public function toMail($notifiable)
    {
        $detail = $this->detail;

        return (new MailMessage)
            ->line('Details mail is : ' . $detail);

    }


    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
