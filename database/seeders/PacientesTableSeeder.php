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
                'Foto' => 'uploads/default.png',
                'nombre1' => 'Carlos',
                'nombre2' => 'Andrés',
                'apellido1' => 'Pérez',
                'apellido2' => 'Gómez',
                'genero_id' => 1,
                'departamento_id' => 1,
                'municipio_id' => 1, // Medellín
                'tipo_documento_id' => 2,
            ],
            [
                'numero_documento' => '1001001002',
                'Foto' => 'uploads/default.png',
                'nombre1' => 'María',
                'nombre2' => 'Fernanda',
                'apellido1' => 'López',
                'apellido2' => 'Ramos',
                'genero_id' => 2,
                'departamento_id' => 2,
                'municipio_id' => 3, // Bogotá
                'tipo_documento_id' => 1,
            ],
            [
                'numero_documento' => '1001001003',
                'Foto' => 'uploads/default.png',
                'nombre1' => 'Juan',
                'nombre2' => 'Diego',
                'apellido1' => 'Martínez',
                'apellido2' => 'Ruiz',
                'genero_id' => 1,
                'departamento_id' => 3,
                'municipio_id' => 5, // Cali
                'tipo_documento_id' => 2,
            ],
            [
                'numero_documento' => '1001001004',
                'Foto' => 'uploads/default.png',
                'nombre1' => 'Ana',
                'nombre2' => 'Lucía',
                'apellido1' => 'Moreno',
                'apellido2' => 'Hernández',
                'genero_id' => 2,
                'departamento_id' => 4,
                'municipio_id' => 7, // Bucaramanga
                'tipo_documento_id' => 1,
            ],
            [
                'numero_documento' => '1001001005',
                'Foto' => 'uploads/default.png',
                'nombre1' => 'Luis',
                'nombre2' => 'Alberto',
                'apellido1' => 'Castro',
                'apellido2' => 'Vega',
                'genero_id' => 1,
                'departamento_id' => 5,
                'municipio_id' => 9, // Cartagena
                'tipo_documento_id' => 1,
            ],
        ]);
    }
}
