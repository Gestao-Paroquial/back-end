<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// use App\Comunidades;

class Pastorais extends Model
{
    protected $fillable = [
        'comunidades_id','nome', 'descricao',
    ];

    public function pastorais()
    {
        return $this->hasOne(Comunidades::class, "id", "id");
    }
}
