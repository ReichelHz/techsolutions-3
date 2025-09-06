<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Proyecto; 

class ProyectoSeeder extends Seeder
{
    public function run(): void
    {
        
        Proyecto::create([
            'nombre' => 'Proyecto Beta',
            'descripcion' => 'Descripción del Proyecto Beta',
            'fecha_inicio' => '2023-02-01',
            'fecha_fin' => null,
            'estado' => 'en progreso',
        ]);

        Proyecto::create([
            'nombre' => 'Proyecto Alpha',
            'descripcion' => 'Descripción del Proyecto Alpha',
            'fecha_inicio' => '2023-01-01',
            'fecha_fin' => '2023-06-01',
            'estado' => 'completado',
        ]);
    }
}