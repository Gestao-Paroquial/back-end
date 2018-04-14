<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batismo extends Model
{
    protected $fillable = [
        'id', 'agenda_id', 'classe_telefone_id', 'nomeBatizando', 'dataNascimento',
    ];

    public function telefones()
    {
        return $this->hasMany('App\Telefone', 'id_entidade', 'id')->where('classe_telefone_id', '5');

    }

    public function agenda()
    {
        return $this->belongsTo(Agenda::class);
    }
}
