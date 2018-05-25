<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SantoDoDia extends Model
{
    protected $fillable = ['name','history','day','month','image'];
    protected $guarded = ['id', 'created_at', 'update_at'];    
}
