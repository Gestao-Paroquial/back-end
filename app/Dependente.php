<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependente extends Model
{
    protected $fillable = [
        'id', 'nome', 'data_Nascimento', 'membro_id', 'tipo_dependente_id',
    ];
}
