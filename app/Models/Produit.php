<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'type',
        'quantite_stock',
        'prix'
    ];

    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }

}
