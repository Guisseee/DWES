<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TareaTest extends TestCase
{
    
    use RefreshDatabase;

    public function mostrarTareasTest(){
        $response = $this->get('/tareas');
        $response->assertStatus(200);
    }

    public function mostrarTareaTest(){
        $response = $this->get('/tareas/1');
        $response->assertStatus(200);
    }
    public function crearTareaTest(){
        $response = $this->post('/tareas',[
            'nombre' => 'Tarea 1',
            'descripcion' => 'Descripcion 1',
            'estado' => 'Pendiente',
        ]);
        $response->assertStatus(200);
    }

    public function actualizarTareaTest(){
        $response = $this->put('/tareas/1',[
            'nombre' => 'Tarea 1',
            'descripcion' => 'Descripcion 1',
            'estado' => 'Pendiente',
        ]);
        $response->assertStatus(200);
    }

    public function eliminarTareaTest(){
        $response = $this->delete('/tareas/1');
        $response->assertStatus(200);
    }
}
