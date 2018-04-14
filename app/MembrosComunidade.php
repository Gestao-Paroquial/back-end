<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MembrosComunidade extends Model
{
    protected $fillable = [
        'id', 'comunidade_id', 'membro_id',
    ];
}
