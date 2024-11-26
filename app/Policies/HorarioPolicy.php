<?php

namespace App\Policies;

use App\Models\Horario;
use App\Models\User;

class HorarioPolicy
{
    public function create(User $user)
    {
        // Permitir crear solo si no tiene un formulario
        return !Horario::where('user_id', $user->id)->exists();
    }
}
