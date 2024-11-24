<?php

namespace Tests\Feature;

use App\Models\Libro;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LibroTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_consultar_ruta_y_verificar_codigo_y_texto() //Este test si pasa
    {
        User::where('email', 'test@example.com')->delete();
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);
        $response = $this->actingAs($user)->get('/inicio');

        $response->assertStatus(200); // Verifica el código 200
        $response->assertSee('Bienvenido a BokNetOF'); // Verifica el contenido
    }

    public function test_crear_libro_y_asegurar_redireccionamiento() //Este tambien ya funciona
    {
        User::where('email', 'test@example.com')->delete();

        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);

        $datosLibro = [
            'titulo' => 'Libro de Prueba',
            'autor' => 'Autor Ejemplo',
            'ISBN' => '1234567890123', // Cambiar 'isbn' por 'ISBN'
            'editorial' => 'Editorial Ejemplo',
            'fechaPublicacion' => '2024-01-01',
            'estatus' => 'disponible',
            'generos' => [1], // Asegúrate de que existan géneros con ID 1 en tu base de datos
        ];

        $response = $this->actingAs($user)->post('/libro', $datosLibro);

        $this->assertDatabaseHas('libros', ['titulo' => $datosLibro]);
        $response->assertRedirect('/libro');
    }

    public function test_validacion_fallida_al_crear_libro() //Este también ya funciona 
    {
        User::where('email', 'test@example.com')->delete();

        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);

        $datosInvalidos = [
            'titulo' => '', // Campo requerido faltante
            'autor' => 'Autor Ejemplo',
            'ISBN' => '', // Campo requerido faltante
            'editorial' => '', // Campo requerido faltante
            'fechaPublicacion' => '', // Campo requerido faltante
            'estatus' => '', // Campo requerido faltante
        ];
    
        $response = $this->actingAs($user)->post('/libro', $datosInvalidos);
    
        $response->assertSessionHasErrors(['titulo', 'ISBN', 'editorial', 'fechaPublicacion', 'estatus']); // Verifica todos los errores de los campos requeridos
    }

    public function test_eliminar_libro_y_asegurar_redireccionamiento()
    {
        User::where('email', 'test@example.com')->delete();

        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);

        $libro = Libro::factory()->create(); // Crea un libro para eliminar

        $response = $this->actingAs($user)->delete("/libro/{$libro->id}");

        $this->assertDatabaseMissing('libros', ['id' => $libro]); // Verifica eliminación
        $response->assertRedirect('/libro'); // Verifica redirección
    }
}
