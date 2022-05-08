<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class new_account_notif extends Notification
{
    use Queueable;



    public $id ;
    public $email ;
    public $created_at ;



    public function __construct($id , $email , $created_at )
    {
        $this->id = $id ;
        $this->email = $email ;
        $this->created_at = $created_at ;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }



    public function toDatabase()
    {

        return [
                'last_users_id' => $this->id ,
                'email' => $this->email ,
                'created_at' => $this->created_at
        ];
    }


    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
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
