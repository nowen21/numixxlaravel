<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuariox = [
            ['name' => 'Jose Dumar Jimenez Ruiz', 'email' => 'nowen21@gmail.com', 'password' => 'N0w3n2104$', 'sis_clinica_id' => 1],
            ['name' => 'ADMINISTRADOR NUMIXX', 'email' => 'numixx@numixx.com', 'password' => 'Num1xx123$', 'sis_clinica_id' => 1],
            ['name' => 'USUARIO DE REVISIONES', 'email' => 'revisiones@numixx.com', 'password' => 'N0w3n2104', 'sis_clinica_id' => 1],
            ['name' => 'USUARIO DE PREPARACIONES', 'email' => 'preparaciones@numixx.com', 'password' => 'N0w3n2104', 'sis_clinica_id' => 1],
            ['name' => 'USUARIO DE CONTROL PROCESOS', 'email' => 'procesos@numixx.com', 'password' => 'N0w3n2104', 'sis_clinica_id' => 1],
            ['name' => 'USUARIO DE CONTROL PRUCTOS TERMINADOS', 'email' => 'terminados@numixx.com', 'password' => 'N0w3n2104', 'sis_clinica_id' => 1],
            ['name' => 'ANA CAROLINA SERRANO', 'email' => 'cserrano@numixx.com', 'password' => 'N0w3n2104', 'sis_clinica_id' => 40],
            ['name' => 'JULIO DE LA ROCHE VALENCIA', 'email' => 'informacion@delaroche.cc', 'password' => 'N0w3n2104', 'sis_clinica_id' => 41],
            ['name' => 'ANDERSON CARRILLO', 'email' => 'carrilllo25@gmail.com', 'password' => 'ander123', 'sis_clinica_id' => 42],
        ];
        foreach ($usuariox as $key => $value) {
            $super = User::create($value);
        }
    }
}
