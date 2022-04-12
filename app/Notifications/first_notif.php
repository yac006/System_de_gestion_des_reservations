<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class first_notif extends Notification
{
    use Queueable;

    private $nom_exped ;


    public function __construct($nom_exped)
    {
        $this->nom_exped = $nom_exped ;
    }



    public function via($notifiable)
    {
        return ['database'];
    }



    public function toDatabase(){

        return [
            'id' => '23' ,
            'title' => 'demande_rsv' ,
            'type' => 'salle' ,
            'nom_expd' => $this->nom_exped
        ];
        
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
