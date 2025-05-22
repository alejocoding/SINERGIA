<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tipos_documentoTableSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('tipos_documentos')->insert([
            ['nombre' => 'Cédula de ciudadanía'],
            ['nombre' => 'Cedula de extranjería'],

        ]);
    }
}
