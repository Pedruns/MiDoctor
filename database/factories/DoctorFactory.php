<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'especialidad' => fake()->sentence(),
            'cedula' => fake()->sentence(),
            'consultorio' => fake()->sentence(),
            'acerca' => fake()->sentence(),
            'ruta_archivo' => NULL,
            'estado' => 'confirmado',
        ];
    }
}
