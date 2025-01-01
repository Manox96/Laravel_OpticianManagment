<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Client extends Model
{
    use HasFactory;


    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'numero',
        'adresse',
        'date_naissance'
    ];
    
    public function rendezVous(){
        return $this->hasMany(RendezVous::class);
    }

}
