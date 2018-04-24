<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MembrosPastorais extends Model
{
    protected $fillable = [
        'pastorais_id', 'nome', 'email',
        'telefone', 'celular', 'endereco', 'nro', 'compl',
        'bairro', 'cidade', 'uf', 'cep',
    ];

    public function pastorais()
    {
        return $this->belongsTo(Pastorais::class, "pastorais_id", "id");
    }
}
