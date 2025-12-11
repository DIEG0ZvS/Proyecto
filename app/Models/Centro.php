<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Centro extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // 1:1 con el admin
    }
    
    public function medicos()
    {
        // Un centro tiene muchos médicos (FK: centro_salud_id en tabla medicos)
        return $this->hasMany(Medico::class, 'centro_salud_id'); 
    }
}