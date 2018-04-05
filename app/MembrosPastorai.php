<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MembrosPastorai extends Model
{
    protected $fillable = [
        'id','pastorai_id','membro_id'
    ];  
    
}
