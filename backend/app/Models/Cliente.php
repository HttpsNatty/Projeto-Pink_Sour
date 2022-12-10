<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Cliente extends Authenticatable
{
    use HasFactory;
    use Notifiable;


    protected $fillable = [
        'nome',
        'email',
        'data',
        'senha',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    public function reservas() {
        return $this->hasMany('App\Models\Reserva');
    }

    public function reservasFeitas() {
        return $this->belongsToMany('App\Models\Reserva');
    }
}
