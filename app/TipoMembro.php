<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoMembro extends Model
{
    protected $fillable = [
        'id', 'descricao',
    ];
}
