<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    protected static ?string $password;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::create([
            'id' => '1',
            'name' => 'test',
            'email' => 'test@example.com',
            'password' => static::$password ??= Hash::make('password'),
            'number' => '+524691147587',
            'birthdate' => '2002-10-28',
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
            'current_team_id' => null,
        ]);
        $user1->assignRole('moderador');

        $user2 = User::create([
            'id' => '2',
            'name' => 'Jose',
            'email' => 'jose@example.com',
            'password' => static::$password ??= Hash::make('password'),
            'number' => '+524698432154',
            'birthdate' => '2002-12-1',
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
            'current_team_id' => null,
        ]);
        $user2->assignRole('paciente');

        $user3 = User::create([
            'id' => '3',
            'name' => 'Pedro',
            'email' => 'Pedro@example.com',
            'password' => static::$password ??= Hash::make('password'),
            'number' => '+524798542154',
            'birthdate' => '2001-01-1',
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
            'current_team_id' => null,
        ]);
        $user3->assignRole('medico');
        
    }
}
