<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doacoe extends Model
{
    protected $fillable = [
        'id', 'data', 'descricao', 'valor', 'code', 'nome_doador'
    ];

    public function comunidade()
    {
        return $this->belongsTo(Comunidade::class);
    }

   const DESCRICAO_PAGSEGURO ='Doação';
}
