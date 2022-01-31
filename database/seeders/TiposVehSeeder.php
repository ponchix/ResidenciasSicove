<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoVehiculo;

class TiposVehSeeder extends Seeder
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
'AUTOMOVIL',
'BUS',
'TRAILER',
'PICK-UP',
'CAMIONETA',
'CAMIÓN',
'VAN',
'SUV',
'MOTOCICLETA',
];
        foreach ($arrays as $array) {
            // code...
            TipoVehiculo::create(['Nombre'=>$array]);
        }
    }
}
