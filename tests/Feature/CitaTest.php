<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class CitaTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_usuario_puede_consultar_ruta_y_ver_texto()
    {
        Artisan::call('migrate');
        // Crear un usuario autenticado
        $this->artisan('db:seed', ['--class' => 'UserSeeder']);
        $user = User::findorfail(2);

        // Simular autenticación del usuario
        $response = $this->actingAs($user)->get('/');

        // Asegurar que el código de estado es 200 y que un texto específico aparece
        $response->assertStatus(200);
        $response->assertSee('que rollito primavera');
    }

    public function test_usuario_puede_crear_cita()
    {
        Artisan::call('migrate');
        $this->artisan('db:seed', ['--class' => 'UserSeeder']);
        $user = User::findorfail(2);

        // Información del formulario

        $data = [
            'fecha' => '2024-12-01',
            'hora' => '14:00:00',
            'tipo' => 'Presencial',
            'notas' => 'hola que paso',
            'medico_id' => 3,
        ];

        $response = $this->actingAs($user)->post(route('cita.store'), $data);

        $this->assertDatabaseHas('citas', [
            'fecha' => '2024-12-01',
            'hora' => '14:00:00',
        ]);

        $response->assertRedirect(route('cita.index'));
    }
}
