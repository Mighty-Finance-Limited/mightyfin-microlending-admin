<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LoanRemainder extends Notification
{
    use Queueable;
    public $data;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject($this->data['subject'].' | '.$this->data['loan_type'].' Loan')
                    ->line('Dear '.$this->data['name'])
                    ->line($this->data['msg'])
                    ->line('Amount: '.$this->data['amount'])
                    ->line('Repayment Plan: '.$this->data['duration'])
                    ->action('Make Payments', url('/'))
                    ->line('Thank You.');
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
            'name' => $this->data['name'],
            'msg' => $this->data['msg'],
            'type' => $this->data['type'],
            'user_id' => $this->data['user_id'],
            'application_id' => $this->data['application_id']
        ];
    }
}
