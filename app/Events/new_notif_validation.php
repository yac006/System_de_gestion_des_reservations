<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class new_notif_validation implements ShouldBroadcast 
{

    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    public $nbr_notif;
    public $num_emp;

    
    public function __construct($nbr_notif , $num_emp)
    {
        $this->nbr_notif = $nbr_notif ;
        $this->num_emp = $num_emp ;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('ch-438');
    }



    public function broadcastWith()
    {
        return [
            "nbr_notif" => $this->nbr_notif ,
            "num_emp" => $this->num_emp     
        ]; 
    }
}
