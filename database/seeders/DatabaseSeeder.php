<?php

namespace Database\Seeders;

use App\Models\StatusAsignacion;
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
        // \App\Models\User::factory(10)->create();
        $this->call([
            marcasSeeder::class,
            SeederTablaPermisos::class,
            ServiciosSeeder::class,
            StatusAsignacionSeeder::class,
            StatusConductorSeeder::class,
            StatusMantenimientoSeeder::class,
            StatusSeeder::class,
            SuperAdminSeeder::class,
            TiposVehSeeder::class,
        ]);
    }
}
