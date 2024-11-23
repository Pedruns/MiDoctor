<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cita extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'paciente_id',
        'medico_id',
        'fecha',
        'hora',
        'estado',
        'tipo',
        'notas',
    ];

    public function paciente(){
        return $this->belongsTo(User::class, 'paciente_id');
    }
    public function medico(){
        return $this->belongsTo(User::class, 'medico_id');
    }
}