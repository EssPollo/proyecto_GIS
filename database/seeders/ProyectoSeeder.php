<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProyectoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //crear proyectos
        $proyectos = [
            [
                //'empresa_id' => 1,
                //'cliente_id' => 1,
                //'tipo_proyecto_id' => 1,
                //'residente_obra_empleado_id' => 1,
                'nombre' => 'Proyecto 1',
                'fecha_inicio' => '2021-01-01',
                'fecha_fin' => '2021-12-31',
                'ganancia_esperada' => 3500000,
                'control_presupuesto' => 1,
                'direccion' => 'Calle 1',
                //'estado_id' => 1,
            ],
        ];

        foreach ($proyectos as $proyecto) {
            \App\Models\Proyecto::create($proyecto);
        }


    }
}