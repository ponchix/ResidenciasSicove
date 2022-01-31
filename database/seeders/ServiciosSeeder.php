<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiciosSeeder extends Seeder
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
            'A/C Diagnóstico',
            'A/C Recarga de Gas',
            'A/C Reemplazo Compresor',
            'A/C Reemplazo Condensador',
            'A/C Reemplazo Evaporador',
            'Balanceo de Llantas',
            'Cambio de Aceite',
            'Cambio de Líquido de Transmisión',
            'Diagnóstico de Sistema de Carga',
            'Inspección de Banda de Motor',
            'Inspección de Batería',
            'Inspección de Frenos',
            'Lavado',
            'Otro Mantenimiento',
            'Reemplazo Alternador',
            'Reemplazo de Amortiguadores',
            'Reemplazo de Anticongelante',
            'Reemplazo de Arranque',
            'Reemplazo de Balatas de Freno',
            'Reemplazo de Baleros de Ruedas',
            'Reemplazo de Banda de Motor',
            'Reemplazo de Batería',
            'Reemplazo de Bobina de Arranque',
            'Reemplazo de Bomba de Aceite',
            'Reemplazo de Bomba de Agua',
            ];
                    foreach ($arrays as $array) {
                        // code...
                        Service::create(['nombre'=>$array]);
                    }
    }
}
