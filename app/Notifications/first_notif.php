<?php

namespace App\Notifications;

use App\Models\Notification as ModelsNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class first_notif extends Notification
{
    use Queueable;

    private $exp_user_id ;
    private $exp_nom ;
    private $exp_prenom;
    private $type_rsv ;
    private $user_avatar ;


    public function __construct($exp_user_id , $exp_nom , $exp_prenom , $type_rsv , $user_avatar)
    {
        $this->exp_user_id = $exp_user_id ;
        $this->exp_nom = $exp_nom ;
        $this->exp_prenom = $exp_prenom ;
        $this->type_rsv = $type_rsv ;
        $this->user_avatar = $user_avatar ;
    }



    public function via($notifiable)
    {
        return ['database'];
    }



    public function toDatabase(){

        return [
            'user_id' => $this->exp_user_id ,
            'nom' => $this->exp_nom ,
            'prenom' => $this->exp_prenom ,
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
