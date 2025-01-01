<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Details_facture extends Model
{
    use HasFactory;
    protected $fillable = [
        'facture_id',
        'produit_id',
        'quantite',
        'prix_unitaire'
    ];

    public function facture(){
        return $this->belongsTo(Facture::class);
    }

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
}
