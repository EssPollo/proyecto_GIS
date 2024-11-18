<?php

namespace Database\Seeders;

use App\Models\Paciente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Paciente::create([ 
            'nombre' => 'Paciente 1', 
            'apellido_p' => 'Apellido Paterno 1',
            'apellido_m' => 'Apellido Materno 1',
            'email' => 'paciente1@example.com', 
            'password' => bcrypt('paciente1'),
            'doctor_id' => 1, // Asegúrate de que este ID corresponde a un doctor existente 
        ]); 
        Paciente::create([ 
            'nombre' => 'Paciente 2', 
            'apellido_p' => 'Apellido Paterno 2',
            'apellido_m' => 'Apellido Materno 2',
            'email' => 'paciente2@example.com', 
            'password' => bcrypt('paciente2'),
            'doctor_id' => 1, // Asegúrate de que este ID corresponde a un doctor existente 
        ]); 
        Paciente::create([ 
            'nombre' => 'Paciente 3', 
            'apellido_p' => 'Apellido Paterno 3',
            'apellido_m' => 'Apellido Materno 3',
            'email' => 'paciente3@example.com', 
            'password' => bcrypt('paciente3'),
            'doctor_id' => 1, // Asegúrate de que este ID corresponde a un doctor existente 
        ]); 
        
    }
}