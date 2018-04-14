<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Casamento extends Model
{
    protected $fillable = [
        'id', 'nomeNoivo', 'dataNascNoivo', 'nomeNoiva', 'dataNascNoiva',
    ];

    public function telefones()
    {
        return $this->hasMany('App\Telefone', 'id_entidade', 'id')->where('classe_telefone_id', '4');

    }

    public function agenda()
    {
        return $this->belongsTo(Agenda::class);
    }
}
