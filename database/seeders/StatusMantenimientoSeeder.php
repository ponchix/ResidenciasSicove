<?php

namespace Database\Seeders;

use App\Models\StatusMantenimiento;
use Illuminate\Database\Seeder;

class StatusMantenimientoSeeder extends Seeder
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
            'En Progreso',
            'Terminado',
            'Eliminado'
        ];
                foreach ($arrays as $array) {
                    // code...
                    StatusMantenimiento::create(['status'=>$array]);
                }
    }
    }

