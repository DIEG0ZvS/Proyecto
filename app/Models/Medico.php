<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Especialidad;

class Medico extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function citas()
    {
        return $this->hasMany(Cita::class, 'medico_id');
    }

    public function horarios()
    {
        return $this->hasMany(Horario::class, 'medico_id');
    }

    public function especialidad()
    {
        return $this->belongsTo(Especialidad::class, 'especialidad_id');
    }
}