<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Marca;

class marcasSeeder extends Seeder
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
            'Nissan',
            'General Motors',
            'Volkswagen',
            'Toyota',
            'KIA',
            'Mazda',
            'Chrysler',
            'Honda',
            'Hyundai',
            'Ford',
            'Suzuki',
            'Renault',
            'SEAT',
            'Mitsubishi',
            'Peugeot',
            'Acura',
            'Volvo',
            'Subaru',
            'Isuzu',
            'Fiat',
];
        foreach ($arrays as $array) {
            // code...
            Marca::create(['marca'=>$array]);
        }
        

    }
}
