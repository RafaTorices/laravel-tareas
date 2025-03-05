<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TareaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tareas = [
            'Tarea1',
            'Tarea2',
            'Tarea3',
            'Tarea4',
        ];

        foreach ($tareas as $tarea) {
            DB::table('tareas')->insert([
                'nombre_tarea' => $tarea,
            ]);
        }
    }
}