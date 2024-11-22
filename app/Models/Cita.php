<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    public function paciente(){
        return $this->belongsTo(User::class, 'paciente_id');
    }
    public function medico(){
        return $this->belongsTo(User::class, 'medico_id');
    }
}