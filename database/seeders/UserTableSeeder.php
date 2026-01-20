<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'lastname' => 'User',
                'genero' => 'M',
                'email' => 'admin@uma.edu.pe',
                'password' => Hash::make('123456'),
                'grado' => 'Ing',
                'firma' => ''
            ],
            [
                'name' => 'Roxana Marisel',
                'lastname' => 'Purizaca Curo',
                'genero' => 'F',
                'email' => 'directora.enfermeria_y_decana@uma.edu.pe',
                'password' => Hash::make('xyz123'),
                'grado' => 'Dra.',
                'firma' => ''
            ],
            [
                'name' => 'Jhonnel Williams',
                'lastname' => 'Samaniego Joaquin',
                'genero' => 'M',
                'email' => 'director.farmacia_y_decano@uma.edu.pe',
                'password' => Hash::make('xyz123'),
                'grado' => 'Dr.',
                'firma' => ''
            ],

            [
                'name' => 'Luis Ronald',
                'lastname' => 'Luyo Pachas',
                'genero' => 'M',
                'email' => 'director.psicologia@uma.edu.pe',
                'password' => Hash::make('xyz123'),
                'grado' => 'Mg.',
                'firma' => ''
            ],

            [
                'name' => 'Daniel Enrique',
                'lastname' => 'Ramirez Salazar',
                'genero' => 'M',
                'email' => 'director.nutricion@uma.edu.pe',
                'password' => Hash::make('xyz123'),
                'grado' => 'Dr.',
                'firma' => ''
            ],
            [
                'name' => 'Lucía Fernanda',
                'lastname' => 'Gonzales Prado',
                'genero' => 'F',
                'email' => 'directora.administracion@uma.edu.pe',
                'password' => Hash::make('xyz123'),
                'grado' => 'Mg.',
                'firma' => ''
            ],
            [
                'name' => 'Oscar Manuel',
                'lastname' => 'Torres Medina',
                'genero' => 'M',
                'email' => 'director.contabilidad@uma.edu.pe',
                'password' => Hash::make('xyz123'),
                'grado' => 'Mg.',
                'firma' => ''
            ],
            [
                'name' => 'Ana Beatriz',
                'lastname' => 'Mendoza Quispe',
                'genero' => 'F',
                'email' => 'directora.ia@uma.edu.pe',
                'password' => Hash::make('xyz123'),
                'grado' => 'Mg.',
                'firma' => ''
            ],
            [
                'name' => 'Carlos Alberto',
                'lastname' => 'Vargas Peña',
                'genero' => 'M',
                'email' => 'director.terapia@uma.edu.pe',
                'password' => Hash::make('xyz123'),
                'grado' => 'Dr.',
                'firma' => ''
            ],
        ];

        User::insert($users);
    }
}
