<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $guarded = ['id'];

    public function medico()
    {
        return $this->belongsTo(Medico::class, 'medico_id');
    }
}
