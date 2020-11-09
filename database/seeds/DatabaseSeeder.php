<?php

use App\Models\Formulaciones\Hidrpedi;
use App\Models\Tipoacion;
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
        $this->call(DepartamentosSeeder::class);
        $this->call(MunicipiosSeeder::class);
        $this->call(ClinicasSeeder::class);
        $this->call(SisClinicasSeeder::class);
        

        $this->call(UsersSeeder::class);
        $this->call(RolesYPermisosSeeder::class);
        $this->call(AsignarRolSeeder::class);

        $this->call(UnidadsSeeder::class);
        $this->call(RangonptsSeeder::class);
        $this->call(UnidrangSeeder::class);
        $this->call(NptsSeeder::class);
        $this->call(UrangnptSeeder::class);
        $this->call(CasasSeeder::class);
        $this->call(MedicamesSeeder::class);
        $this->call(MedicameSisClinicaSeeder::class);
        $this->call(MmarcasSeeder::class);
        $this->call(MinvimasSeeder::class);
        $this->call(MlotesSeeder::class);
        $this->call(EpsSeeder::class);
        $this->call(MnptsSeeder::class);
        $this->call(GenerosSeeder::class);
        

        $this->call(ServiciosSeeder::class);
        $this->call(CondiciosSeeder::class);
        $this->call(PacientesSeeder::class);
        $this->call(DmedicosSeeder::class);
        $this->call(DmarcasSeeder::class);
        $this->call(DlotesSeeder::class);
        $this->call(HidrpedisSeeder::class);
        $this->call(LipopedisSeeder::class);
        $this->call(RangosSeeder::class);
        $this->call(RnptsSeeder::class);
        $this->call(RcondicisSeeder::class);
        $this->call(RcodigosSeeder::class);
        $this->call(CrangosSeeder::class);
        $this->call(TipoaccionsSeeder::class);
        $this->call(ItemOrdenesSeeder::class);
    }
}
