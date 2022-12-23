<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nome',
        'descricao',
        'limitado'
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
