<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewMemberRegistration extends Notification
{
    use Queueable;


    private $introLines = "";
    private $outroLines = "";
    private $subject = "";
    private $actionText = "";
    private $actionUrl = "";

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($introLines, $outroLines, $subject, $actionText, $actionUrl)
    {
        $this->introLines = $introLines;
        $this->outroLines = $outroLines;
        $this->subject = $subject;
        $this->actionText = $actionText;
        $this->actionUrl = $actionUrl;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    public function toDatabase($notifiable)
    {
        return (new MailMessage)
            ->line($this->introLines)
            ->subject($this->subject)
            ->action($this->actionText, url($this->actionUrl))
            ->success()
            ->line($this->outroLines)
            ->data();
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
