<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membro extends Model
{
    protected $fillable = [
        'nome', 'email', 'data_Nascimento', 'nome_Pai', 'nome_Mae', 'estado_Civil', 'batizado', 'crismado', '1_eucaristia', 'endereco', 'nro', 'compl', 'bairro', 'cidade', 'uf', 'cep', 'status', 'tipo_membro_id', 'classe_telefone_id',
    ];

    protected $attributes = [
        'classe_telefone_id' => 3,
    ];

    public function telefones()
    {
        return $this->hasMany('App\Telefone', 'id_entidade', 'id')->where('classe_telefone_id', '3');

    }

    public function dependentes()
    {
        return $this->hasMany('App\Dependente');

    }

    public function dizimos()
    {
        return $this->hasMany('App\Dizimo')->orderBy('mes', 'ano');
    }

    public function comunidades()
    {
        return $this->hasManyThrough('App\Comunidade', 'App\MembrosComunidade', 'membro_id', 'id', 'id', 'comunidade_id');
    }

    public function pastorais()
    {
        return $this->hasManyThrough('App\Pastorai', 'App\MembrosPastorai', 'membro_id', 'id', 'id', 'pastorai_id');
    }

    public function tipoMembro()
    {
        return $this->belongsTo(TipoMembro::class);
    }
}
