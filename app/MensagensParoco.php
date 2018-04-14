<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MensagensParoco extends Model
{
    protected $fillable = [
        'id', 'titulo', 'subtitulo', 'mensagem', 'link',
    ];
}
