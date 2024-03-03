<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TareasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tareas')->insert([
            'titulo' => 'Hacer de comer',
            'descripcion' => 'Hacer macarrones con tomate'
        ]);

        DB::table('tareas')->insert([
            'titulo' => 'Recoger',
            'descripcion' => 'Recoger la colada'
        ]);

        DB::table('tareas')->insert([
            'titulo' => 'Entrenar',
            'descripcion' => 'Ir al gimnasio'
        ]);
    }
}
