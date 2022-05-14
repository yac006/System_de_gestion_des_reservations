<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{

    use HasFactory;


    public function users()
    {
        return $this->belongsTo(User::class);
    }


    public function secteurs()
    {
        return $this->belongsTo(Secteur::class);
    }
    

    public function demandes()
    {
        return $this->hasMany(Demande::class , 'num_emp' , 'num_emp');
    }



    
}
