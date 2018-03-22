<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoLancamento extends Model
{
    protected $fillable = [
       'id',  'descricao' 
    ];
}
