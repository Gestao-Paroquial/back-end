<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// use App\Comunidades;

class Pastorais extends Model
{
    protected $fillable = [
        'comunidades_id','nome', 'descricao',
    ];

    public function comunidade()
    {
        return $this->belongsTo(Comunidades::class, "comunidades_id", "id");
    }
}
