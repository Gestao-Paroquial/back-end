<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MembrosComunidade extends Model
{
    protected $fillable = [
        'id','comunidade_id','membros_id'
    ];
}
