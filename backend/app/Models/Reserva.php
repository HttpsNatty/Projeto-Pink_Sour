<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'data', 'horas', 'pessoas', 'cliente_id'];

    // protected $casts = [
    //     'items' => 'array'
    // ];

    // protected $guarded = [];

    // protected $dates = ['date'];

    public function cliente() {
        return $this->belongsTo('App\Models\Cliente');
    }

    // public function clientes() {
    //     return $this->belongsToMany('App\Models\Cliente');
    // }
}
