<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MembrosPastorais extends Model
{
	protected $fillable = [
        'comunidades_id','pastorais_id'	,'nome','email',
		'telefone','celular','endereco','nro','compl',
		'bairro','cidade','uf','cep', 
    ];

}
