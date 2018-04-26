<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'id', 'nome', 'email', 'data', 'cpf', 'casamento', 'batismo'
    ];
}
