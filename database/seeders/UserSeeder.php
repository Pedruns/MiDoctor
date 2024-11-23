<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
            'name' => 'test',
            'email' => 'test@example.com',
            'password' => static::$password ??= Hash::make('password'),
            'number' => '+524691147587',
            'birthdate' => '2002-10-28',
        ]);
        $user1->assignRole('moderador');

        $user2 = User::create([
            'name' => 'Pepe',
            'email' => 'pepe@example.com',
            'password' => static::$password ??= Hash::make('password'),
            'number' => '+524698432154',
            'birthdate' => '2002-12-1',
        ]);
        $user2->assignRole('paciente');

        $user3 = User::create([
            'name' => 'Pedro',
            'email' => 'Pedro@example.com',
            'password' => static::$password ??= Hash::make('password'),
            'number' => '+524798542154',
            'birthdate' => '2001-01-1',
        ]);
        $user3->assignRole('medico');
    }
}
