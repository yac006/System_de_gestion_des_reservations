<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Planification extends Model
{


    use HasFactory;


        protected $fillable = [  
                                'title' ,
                                'start_date', 
                                'end_date' , 
                                'num_demande',
                                'num_emp'
                            ];
                            
        public function fromDateTime($value)
        {
            return Carbon::parse(parent::fromDateTime($value))->format('Y-d-m H:i:s');
        }
                            
                            
        
                        
}
