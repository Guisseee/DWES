<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EtiquetasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('etiquetas')->insert([
            'nombre' => 'Cosas del hogar',
        ]);

        DB::table('etiquetas')->insert([
            'nombre' => 'Ayuda',
        ]);

        DB::table('etiquetas')->insert([
            'nombre' => 'Productividad',
        ]);
    }
}
