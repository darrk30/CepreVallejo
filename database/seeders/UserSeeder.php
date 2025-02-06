<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Kevin Daniel',
            'email' => 'kevin@gmail.com',
            'password' => bcrypt('123456789'), 
            'url' => '',
        ])->assignRole('Administrador');
        
        User::create([
            'name' => 'Ram Ruiz',
            'email' => 'ram@gmail.com',
            'password' => bcrypt('123456789'),     
            'url' => '',       
        ])->assignRole('Profesor');

        User::create([
            'name' => 'Pepe',
            'email' => 'pepe@gmail.com',
            'password' => bcrypt('123456789'),   
            'url' => '',        
        ])->assignRole('Alumno');
        
    }
}
