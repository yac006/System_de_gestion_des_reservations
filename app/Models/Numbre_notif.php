<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Numbre_notif extends Model
{
    use HasFactory;


        protected $fillable = ['id' , 'notifiable_id' , 'notif_number' , 'notifiable_name'];
}
