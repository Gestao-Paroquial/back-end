<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comunidade extends Model
{
     protected $fillable = [
        'id', 'nome', 'email' ,'cnpj' , 'endereco', 'nro', 'compl',
        'bairro', 'cidade', 'uf', 'cep',
    ];
    

    public function telefones()
    {
         return $this->hasMany('App\Telefone','id_entidade','id')->where('classe_telefone_id','1');
         
    }

    public function membros()
    {
        return $this->hasManyThrough('App\Membro','App\MembrosComunidade','comunidade_id','id','id','membro_id');
    }

    public function pastorais()
    {
        return $this->hasMany('App\Pastorai','comunidade_id','id');
    }

    public function doacoes()
    {
        return $this->hasMany('App\Doacoe');
    }


}
