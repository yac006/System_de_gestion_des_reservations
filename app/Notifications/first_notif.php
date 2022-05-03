<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class first_notif extends Notification
{
    use Queueable;

    private $user_name ;
    private $titre ;
    private $user_id ;
    private $type_rsv ;
    private $user_avatar ;


    public function __construct($user_name , $titre , $user_id , $type_rsv , $user_avatar)
    {
        $this->user_name = $user_name ;
        $this->titre = $titre ;
        $this->user_id = $user_id ;
        $this->type_rsv = $type_rsv ;
        $this->user_avatar = $user_avatar ;
    }



    public function via($notifiable)
    {
        return ['database'];
    }



    public function toDatabase(){

        return [
            'user_name' => $this->user_name ,
            'titre' => $this->titre ,
            'user_id' => $this->user_id ,
            'type' => $this->type_rsv ,
            'avatar_path' => $this->user_avatar
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
