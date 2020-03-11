<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SisEstasSeeder::class);
        $this->call(RolesYPermisosSeeder::class);
        $this->call(ClinicasSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(CasasSeeder::class);
        $this->call(NptsSeeder::class);
        $this->call(MedicamesSeeder::class);
        $this->call(MmarcasSeeder::class);
        $this->call(MinvimasSeeder::class);
        $this->call(MlotesSeeder::class);
        $this->call(EpsSeeder::class);
        $this->call(MnptsSeeder::class);
        $this->call(GenerosSeeder::class);
        $this->call(DepartamentosSeeder::class);
        $this->call(MunicipiosSeeder::class);
        $this->call(ServiciosSeeder::class);
        $this->call(CondiciosSeeder::class);
        $this->call(PacientesSeeder::class); 
        $this->call(DmedicosSeeder::class);
        $this->call(DmarcasSeeder::class);
        $this->call(DlotesSeeder::class);
    }
}
