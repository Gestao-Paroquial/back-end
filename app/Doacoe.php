<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doacoe extends Model
{
    protected $fillable = [
        'id', 'data', 'descricao', 'valor', 'code'
    ];

    public function comunidade()
    {
        return $this->belongsTo(Comunidade::class);
    }
}
