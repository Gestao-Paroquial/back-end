<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MensagensParoco extends Model
{
    protected $fillable = [
        'titulo','subtitulo', 'mensagem', 'link'
    ];
}
