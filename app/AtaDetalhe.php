<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AtaDetalhe extends Model
{
    protected $fillable = [
        'id', 'descricao', 'valor' 
    ];
}
