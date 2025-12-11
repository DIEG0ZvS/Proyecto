<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $guarded = ['id'];
    protected $casts = [
    'fecha_hora' => 'datetime',
];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }

    public function medico()
    {
        return $this->belongsTo(Medico::class, 'medico_id');
    }
    
    public function diagnostico()
    {
        return $this->hasOne(Diagnostico::class, 'cita_id');
    }
}
