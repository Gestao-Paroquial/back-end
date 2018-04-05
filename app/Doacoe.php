<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doacoe extends Model
{
    protected $fillable = [
        'id', 'data', 'descricao', 'valor' 
    ];

    public function comunidade()
    {
        return $this->belongsTo(Comunidade::class);
    }
}
