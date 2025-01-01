<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RendezVous extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_time',
        'finish_time',
        'client_id'
    ];

    public function client() {
        return $this->belongsTo(Client::class);
    }
}
