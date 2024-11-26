<?php

namespace App\Policies;

use App\Models\Doctor;
use App\Models\User;

class DoctorPolicy
{
    public function create(User $user)
    {
        // Permitir crear solo si no tiene un formulario
        return !Doctor::where('user_id', $user->id)->exists();
    }
}
