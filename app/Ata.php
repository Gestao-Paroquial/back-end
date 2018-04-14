<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ata extends Model
{
    protected $fillable = [
        'id', 'data_Ata', 'descricao', 'totalGastos', 'totalArrecadacoes',
    ];

    public function detalhes()
    {
        return $this->hasMany('App\AtaDetalhe');
    }
}
