<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
    protected $guarded = ['id'];
    
    // Opcionalmente, para ser más explícitos:
    // protected $fillable = ['cita_id', 'medico_id', 'paciente_id', 'diagnostico'];

    public function cita()
    {
        return $this->belongsTo(Cita::class, 'cita_id');
    }

    public function medico()
    {
        return $this->belongsTo(Medico::class, 'medico_id');
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }
}
