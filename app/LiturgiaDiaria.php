<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LiturgiaDiaria extends Model
{
   protected $fillable = [
      'dia',
      'mes',
      'ano',
      'primeira_leitura',
      'segunda_leitura',
      'salmo',
      'evangelho',
      'cor_liturgica',
      'tempo_liturgico'
   ];
   protected $guarded = ['id','created_at','updated_at'];
}
