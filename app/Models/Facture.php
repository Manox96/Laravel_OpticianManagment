<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'date',
        'montant_total'
    ];

    public function details_facture(){
        return $this->hasMany(Details_facture::class);
    }
    
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
