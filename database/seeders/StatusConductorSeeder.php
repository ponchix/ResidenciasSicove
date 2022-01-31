<?php

namespace Database\Seeders;

use App\Models\StatusConductor;
use Illuminate\Database\Seeder;

class StatusConductorSeeder extends Seeder
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
            'Asignado',
            'Disponible',
            'Eliminado'
        ];
                foreach ($arrays as $array) {
                    // code...
                    StatusConductor::create(['status'=>$array]);
                }
    }
}
