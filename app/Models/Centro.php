<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Centro extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function medicos()
    {
        return $this->hasMany(Medico::class, 'centro_salud_id'); 
    }
}
