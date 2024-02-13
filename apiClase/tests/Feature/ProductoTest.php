<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Producto;

class ProductoTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_get_productos()
    {
      $producto= new Producto();
      $producto->nombre = "Camisa";
      $producto->descripcion = "Camisa de algodon";
      $producto->save();

      $response= $this->get('/api/productos');
      $response->assertStatus(200);
      $response->assertJsonFragment([
        'id' => $producto->id,
        'nombre' => $producto->nombre,
        'descripcion' => $producto->descripcion
        ]);
        $response = $this->get('/api/productos');

        $response->assertStatus(200);
    }
}