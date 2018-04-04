<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Agenda extends Model
{
     protected $fillable = [
        'id', 'data_inicio_evento', 'data_fim_evento', 'titulo', 'descricao' 
    ];

    public function casamento()
    {
        return $this->hasOne('App\Casamento');
    }
     
    public function batismo()
    {
        return $this->hasMany('App\Batismo');
    }  
    
}
