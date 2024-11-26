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
        $response->assertSee('Tu salud en un solo lugar');
    }

    public function test_usuario_puede_crear_cita()
    {
        Artisan::call('migrate');
        $this->artisan('db:seed', ['--class' => 'UserSeeder']);
        $user = User::findorfail(2);

        // Información del formulario

        $data = [
            'medico_id' => 3,
            'fecha' => '2024-12-01',
            'hora' => '14:00',
            'tipo' => 'Presencial',
            'notas' => 'hola que paso',
        ];

        $response = $this->actingAs($user)->post(route('cita.store'), $data);

        $this->assertDatabaseHas('citas', [
            'fecha' => '2024-12-01',
            'hora' => '14:00:00',
        ]);

        $response->assertRedirect(route('cita.index'));
    }

    public function test_usuario_recibe_errores_de_validacion()
    {
        Artisan::call('migrate');
        $this->artisan('db:seed', ['--class' => 'UserSeeder']);
        $user = User::findorfail(2);

        $data = [
            'medico_id' => 3,
            'fecha' => '2024-12-0',
            'hora' => '14:00:00',
            'tipo' => 'Presencial',
            'notas' => 'hola que paso',
        ];

        $response = $this->actingAs($user)->post(route('cita.store'), $data);

        $response->assertSessionHasErrors(['fecha', 'hora']);
    }

    public function test_usuario_puede_eliminar_cita()
    {
        Artisan::call('migrate');
        $this->artisan('db:seed', ['--class' => 'UserSeeder']);
        $user = User::findorfail(2);

        // creamos una cita con el ejemplo de la primer prueba
        $data = [
            'medico_id' => 3,
            'fecha' => '2024-12-01',
            'hora' => '14:00',
            'tipo' => 'Presencial',
            'notas' => 'hola que paso',
        ];

        $response = $this->actingAs($user)->post(route('cita.store'), $data);

        $response = $this->actingAs($user)->delete("/cita/{1}");

        $this->assertDatabaseMissing('citas', [
            'id' => 1,
        ]);

    }
}
