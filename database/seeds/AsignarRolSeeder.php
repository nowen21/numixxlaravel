<?php

use App\User;
use Illuminate\Database\Seeder;

class AsignarRolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::find(1);
        $user->assignRole('super-administrador');
        $user->assignRole('profesional-salud');
        $super=User::find(2);
        $super->assignRole('super-administrador');
    }
}
