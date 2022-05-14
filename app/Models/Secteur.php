<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secteur extends Model
{

    use HasFactory;


    public function employes()
    {
        return $this->hasMany(Employe::class , 'num_secteur' , 'num_secteur');
    }
}
