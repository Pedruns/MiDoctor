<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(UserSeeder::class);
        $user = User::findorfail(3);
        Doctor::factory()
        ->for($user)
        ->create();
        User::factory(5)
        ->has(Doctor::factory())
        ->create()
        ->each(function ($user) {
            $user->assignRole('medico');
        });
        User::factory(5)
        ->create()
        ->each(function ($user) {
            $user->assignRole('paciente');
        });
    }
}
