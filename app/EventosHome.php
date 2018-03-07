<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventosHome extends Model
{
      /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'eventos_home';

    public $timestamps = false;

    protected $fillable = [
        'descricao','destino', 'imagem', 
    ];
}
