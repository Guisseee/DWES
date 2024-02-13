<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('productos')->insert([
            'nombre' => 'Pantalon',
            'descripcion' => 'Pantalon corto'
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Falda',
            'descripcion' => 'Falda Rosa'
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Camiseta',
            'descripcion' => 'Camiseta Larga'
        ]);
    }
}
