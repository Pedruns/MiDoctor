<?php

namespace App\Policies;

use App\Models\Cita;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CitaPolicy
{
    public function propietario(User $user, Cita $cita): Response
    {
        return $user->id === $cita->paciente_id
            ? Response::allow()
            : Response::deny('No te pertenece esta cita.');
    }
}
