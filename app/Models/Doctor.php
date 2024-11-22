<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'user_id',
        'specialty',
        'license_number',
        'office_location',
        'about',
    ];

    // Relación uno a uno inversa con User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
