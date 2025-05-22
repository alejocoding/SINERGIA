<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'id' => '1107978187',
            'name' => 'Alejandro Velandia',
            'password' =>'1234567890',
        ]);

        $this->call(DepartamentosTableSeeder::class);
        $this->call(MunicipiosTableSeeder::class);
        $this->call(GenerosTableSeeder::class);
        $this->call(Tipos_documentoTableSeeder::class);
        $this->call(PacientesTableSeeder::class);
    }
}
