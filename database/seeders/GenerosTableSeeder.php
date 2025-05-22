<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class GenerosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('generos')->insert([
            ['nombre' => 'Masculino', ],
            ['nombre' => 'Femenino',  ],
            ['nombre' => 'Otro',      ],
        ]);
    }
}
