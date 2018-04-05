<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    protected $fillable = [
        'id', 'data_pagamento', 'valor' 
    ];
       
}
