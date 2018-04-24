<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dizimo extends Model
{
    protected $fillable = [
        'id', 'membro_id', 'mes', 'ano', 'valor',
    ];

    public function membro()
    {
        return $this->belongsTo(Membro::class);
    }
}
