<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pastorais extends Model
{
    protected $fillable = [
        'comunidades_id','name', 'descricao',
    ];
}
