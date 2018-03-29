<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
	protected $fillable = [
        'id', 'telefone', 'classe_telefone_id', 'id_entidade'
    ];
       
}
