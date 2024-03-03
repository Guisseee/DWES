<?php

namespace Database\Seeders;

use App\Models\Etiqueta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tarea;

class TareaEtiquetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tareasComida= Tarea::where('titulo','Hacer de comer')->first();
        $tareasRecoger= Tarea::where('titulo', 'Recoger')->first();
        $tareasEntrenar= Tarea::where('titulo', 'Entrenar')->first();

        $etiquetasHogar= Etiqueta::where('nombre', 'Cosas del hogar')->first();
        $etiquetasAyuda= Etiqueta::where('nombre', 'Ayuda')->first();
        $etiquetasProductividad= Etiqueta::where('nombre', 'Productividad')->first();

        $tareasComida->etiquetas()->attach($etiquetasHogar);
        $tareasRecoger->etiquetas()->attach($etiquetasAyuda);
        $tareasEntrenar->etiquetas()->attach($etiquetasProductividad);
    }
}
