<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Alan',
            'username' => 'pollo',
            'ap_paterno' => 'Ramirez',
            'ap_materno' => 'Navarrete',
            'email' => 'alan@admin.com',
            'password' => bcrypt('admin123'),
            'estado' => true,
        ])->assignRole('Admin');
        User::create([
            'name' => 'Farmaceutico',
            'username' => 'farma',
            'ap_paterno' => 'no tiene',
            'ap_materno' => 'no tiene',
            'email' => 'farmaceutico@gmail.com',
            'password' => bcrypt('farma123'),
            'estado' => true,
        ])->assignRole('Farmaceutico');
        User::create([
            'name' => 'Doctor',
            'username' => 'Doc',
            'ap_paterno' => 'no tiene',
            'ap_materno' => 'no tiene',
            'email' => 'doctor@gmail.com',
            'password' => bcrypt('doctor123'),
            'estado' => true,
        ])->assignRole('Doctor');
    }
}
