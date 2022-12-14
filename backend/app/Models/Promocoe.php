<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocoe extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nome',
        'descricao'
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
