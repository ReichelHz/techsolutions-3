<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

use Database\Seeders\ProyectoSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('12345678'),
        ]);

  
        $this->call(ProyectoSeeder::class);
    }
}