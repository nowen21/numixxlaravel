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
        $super=User::create(['name'=>'Jose Dumar Jimenez Ruiz',
        'email'=>'nowen21@gmail.com','password'=>'N0w3n2104$',
        'sis_clinica_id'=>1
        ]);
       
        $super=User::create(['name'=>'ADMINISTRADOR NUMIXX',
        'email'=>'numixx@numixx.com','password'=>'Num1xx123$',
        'sis_clinica_id'=>1
        ]);
        $super=User::create(['name'=>'USUARIO DE REVISIONES',
        'email'=>'revisiones@numixx.com','password'=>'N0w3n2104$',
        'sis_clinica_id'=>1
        ]);
        $super=User::create(['name'=>'USUARIO DE PREPARACIONES',
        'email'=>'preparaciones@numixx.com','password'=>'N0w3n2104$',
        'sis_clinica_id'=>1
        ]);
        $super=User::create(['name'=>'USUARIO DE CONTROL PROCESOS',
        'email'=>'procesos@numixx.com','password'=>'N0w3n2104$',
        'sis_clinica_id'=>1
        ]);
        $super=User::create(['name'=>'USUARIO DE CONTROL PRUCTOS TERMINADOS',
        'email'=>'terminados@numixx.com','password'=>'N0w3n2104$',
        'sis_clinica_id'=>1
        ]);
    }
}
