<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membro extends Model
{
    protected $fillable = [
        'nome', 'email', 'data_Nascimento', 'nome_Pai', 'nome_Mae', 'estado_Civil', 'batizado', 'crismado', '1_encaristia', 'endereco', 'nro', 'compl', 'bairro', 'cidade', 'uf', 'cep', 'status'
    ];

    public function telefones()
    {
         return $this->hasMany('App\Telefone','id_entidade','id')->where('classe_telefone_id','3');
         
    }

    public function dependentes()
    {
         return $this->hasMany('App\Dependente');
         
    }

    public function dizimos()
    {
        return $this->hasMany('App\Dizimo')->orderBy('mes','ano');
    }

    public function comunidade()
    {
        return $this->belongsTo(Comunidade::class);
    }

    public function pastorais()
    {
        return $this->hasManyThrough('App\Pastorai','App\MembrosPastorai','membro_id','id','id','pastorai_id');
    }
}
