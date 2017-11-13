<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comunidades extends Model
{
    protected $fillable = [
        'nome',
        'email',
        'cnpj',
        'Telefone',
        'Celular',
        'Endereco',
        'nro',
        'compl',
        'bairro',
        'cidade',  
        'uf',      
        'cep'
    ];
}
