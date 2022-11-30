<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocao extends Model
{
    use HasFactory;

    protected $table = "promocao";
    protected $fillable = ['titulo','message'];


    public function cliente() {
        return $this->belongsTo('App\Models\Cliente');
    }
}
