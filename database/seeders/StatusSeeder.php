<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
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
                'Fuera de servicio',
                'Taller',
                'Eliminado'
            ];
                    foreach ($arrays as $array) {
                        // code...
                        Status::create(['status'=>$array]);
                    }
    }
}
