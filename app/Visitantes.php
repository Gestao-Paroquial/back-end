<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitantes extends Model
{
    protected $fillable = [
        'comunidades_id','nome', 'email', 'telefone'
    ];


    public function comunidades()
    {
        return $this->belongsTo(Comunidades::class, "comunidades_id", "id");
    }
}
