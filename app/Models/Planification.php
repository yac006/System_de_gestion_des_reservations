<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planification extends Model
{
    use HasFactory;


        protected $fillable = [  
                                'title' ,
                                'start_date', 
                                'end_date' , 
                                'type_client',
                                'nom',
                                'prenom',
                                'address',
                                'email',
                                'type_rsv',
                                'tele'
                            ];   
                            
                            

                        
}
