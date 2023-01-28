<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Notification extends Model
{
    use HasFactory;

 	public $timestamps = false;


    // public function fromDateTime($value)
    // {
    //     return Carbon::parse(parent::fromDateTime($value))->format('Y-d-m H:i:s');
    // }

    protected $fillable = ['id' , 'type' , 'notifiable_type' , 'data' , 'read_at'];




}
