<?php

namespace App\Notifications;

use App\Models\Employer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OTPNotification extends Notification
{
    use Queueable;

    private $employer;
    private $pin;

    /**
     * Create a new notification instance.
     */
    public function __construct(Employer $employer, $pin)
    {
        $this->employer = $employer;
        $this->pin = $pin;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('NSITF ESSP: OTP')
            ->line('Hi ' . $this->employer->company_name)
            ->line('Your OTP is: ' . $this->pin)
            ->line('Do not share this pin with anyone.');
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
