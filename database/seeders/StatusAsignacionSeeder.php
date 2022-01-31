<?php

namespace Database\Seeders;

use App\Models\StatusAsignacion;
use Illuminate\Database\Seeder;

class StatusAsignacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $arrays=[
            'Activo',
            'Entregado',
            'Archivado'
        ];
                foreach ($arrays as $array) {
                    // code...
                    StatusAsignacion::create(['status'=>$array]);
                }
    }
}
