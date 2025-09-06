<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
// Importa el nuevo seeder
use Database\Seeders\ProyectoSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Crear usuario de prueba
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('12345678'),
        ]);

        // Llama a los otros seeders que has creado
        $this->call(ProyectoSeeder::class);
    }
}