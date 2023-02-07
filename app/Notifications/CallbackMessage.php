<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Http\Requests\ContactFormRequest;
use Lang;

class CallbackMessage extends Notification implements ShouldQueue
{

    use Queueable;

    protected $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(ContactFormRequest $message)
    {
        $this->message = $message->validated();
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
        return (new MailMessage)
                    ->subject(Lang::get('callback_form.subject', ['name' => config('admin.name')]))
                    ->greeting(" ")
                    ->salutation(" ")
                    ->from($this->message['email'], 'no-reply')
                    ->line(Lang::get('callback_form.name', ['user_name' => $this->message['name']]))
                    ->line(Lang::get('callback_form.email', ['user_email' => $this->message['email']]))
                    ->line(Lang::get('callback_form.phone', ['user_phone' => $this->message['phone']]))
                    ->line(Lang::get('callback_form.message', ['user_message' => $this->message['message']]));
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
