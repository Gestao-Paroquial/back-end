<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pastorai extends Model
{
    protected $fillable = [
        'id', 'comunidade_id','nome', 'descricao', 'classe_telefone_id',
    ];

    public function comunidade()
    {
        return $this->belongsTo(Comunidade::class);
    }

    public function telefones()
    {
         return $this->hasMany('App\Telefone','id_entidade','id')->where('classe_telefone_id','2');
         
    }

    public function membros()
    {
        return $this->hasManyThrough('App\Membro','App\MembrosPastorai','pastorai_id','id','id','membro_id');
    }
        
}
