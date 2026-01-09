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
                'email' => 'admin@example.com',
                'password' => Hash::make('123456'),
                'grado' => 'Ing',
                'firma' => '',
                'status' => 1,
            ],
        ];

        User::insert($users);
    }
}
