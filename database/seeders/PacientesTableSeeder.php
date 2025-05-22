<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PacientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('pacientes')->insert([
            [
                'numero_documento' => '1001001001',
                'Foto' => 'foto1.jpg',
                'nombre1' => 'Carlos',
                'nombre2' => 'Andrés',
                'apellido1' => 'Pérez',
                'apellido2' => 'Gómez',
                'genero_id' => 1,
                'departamento_id' => 1,
                'tipo_documento_id' => 2,
            ],
            [
                'numero_documento' => '1001001002',
                'Foto' => 'foto2.jpg',
                'nombre1' => 'María',
                'nombre2' => 'Fernanda',
                'apellido1' => 'López',
                'apellido2' => 'Ramos',
                'genero_id' => 2,
                'departamento_id' => 2,
                'tipo_documento_id' => 1,
            ],
            [
                'numero_documento' => '1001001003',
                'Foto' => 'foto3.jpg',
                'nombre1' => 'Juan',
                'nombre2' => 'Diego',
                'apellido1' => 'Martínez',
                'apellido2' => 'Ruiz',
                'genero_id' => 1,
                'departamento_id' => 3,
                'tipo_documento_id' => 2,
            ],
            [
                'numero_documento' => '1001001004',
                'Foto' => 'foto4.jpg',
                'nombre1' => 'Ana',
                'nombre2' => 'Lucía',
                'apellido1' => 'Moreno',
                'apellido2' => 'Hernández',
                'genero_id' => 2,
                'departamento_id' => 4,
                'tipo_documento_id' => 1,
            ],
            [
                'numero_documento' => '1001001005',
                'Foto' => 'foto5.jpg',
                'nombre1' => 'Luis',
                'nombre2' => 'Alberto',
                'apellido1' => 'Castro',
                'apellido2' => 'Vega',
                'genero_id' => 1,
                'departamento_id' => 5,
                'tipo_documento_id' => 1,
            ],
        ]);
    }
}
