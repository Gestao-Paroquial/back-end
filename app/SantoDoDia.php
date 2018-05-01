<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SantoDoDia extends Model
{
    protected $fillable = [
        'id','nome','historia','titulo_historia','dia','imagem'
    ];
}
