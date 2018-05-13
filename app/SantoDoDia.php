<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SantoDoDia extends Model
{
    protected $fillable = ['id','nome','historia'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    //,'dia','imagem','titulo_historia'
}
