<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Agenda extends Model
{
     protected $fillable = [
        'id', 'data_Evento', 'hora_evento', 'titulo', 'descricao' 
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
