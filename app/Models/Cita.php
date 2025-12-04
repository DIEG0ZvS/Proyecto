<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $guarded = ['id'];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }

    public function medico()
    {
        return $this->belongsTo(Medico::class, 'medico_id');
    }
}
