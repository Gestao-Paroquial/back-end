<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPagamento extends Model
{
    protected $fillable = [
        'id', 'descricao',
    ];
}
