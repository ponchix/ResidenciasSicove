<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//spatie
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permisos = [
            //Tabla Vehiculos
            'Ver vehiculo',
            'Crear vehiculo',
            'Editar vehiculo',
            'Borrar vehiculo',
            'Estado vehiculo',
            'Perfil vehiculo',
            //tabla Usuarios
            'Ver usuario',
            'Crear usuario',
            'Editar usuario',
            'Borrar usuario',
            //Tabla Tipo de Vehiculos
            'Ver tipo',
            'Crear tipo',
            'Editar tipo',
            'Borrar tipo',
            //Tabla Services
            'Ver servicios',
            'Crear servicios',
            'Editar servicios',
            'Borrar servicios',
            //Tablas roles
            'ver-role',
            'crear-role',
            'editar-role',
            'borrar-role',
            //Tabla Proveedores
            'Ver proveedor',
            'Crear proveedor',
            'Editar proveedor',
            'Borrar proveedor',
            //Tabla Modelo
            'Ver modelo',
            'Crear modelo',
            'Editar modelo',
            'Borrar modelo',
            //Tabla Mecanicos
            'Ver mecanico',
            'Crear mecanico',
            'Editar mecanico',
            'Borrar mecanico',
            'Perfil mecanico',
            //Tabla Marcas
            'Ver marca',
            'Crear marca',
            'Editar marca',
            'Borrar marca',
            //Tabla Mantenimientos
            'Ver mantenimiento',
            'Crear mantenimiento',
            'Editar mantenimiento',
            'Borrar mantenimiento',
            'Detalles mantenimiento',
            'Alta mantenimiento',
            //Tabla Incidentes
            'Ver incidente',
            'Crear incidente',
            'Editar incidente',
            'Borrar incidente',
            //Tablas gastos
            'Ver gasto',
            'Crear gasto',
            'Editar gasto',
            'Borrar gasto',
            //Tablas condcutores
            'Ver conductor',
            'Crear conductor',
            'Editar conductor',
            'Borrar conductor',
            'Perfil conductor',
            //Tabla assignments
            'Ver asignacion',
            'Crear asignacion',
            'Editar asignacion',
            'Borrar asignacion',
            'Ver archivado',
            'Detalle asignacion',
            'Entrega asignacion',
            'Asignacion',
            //Tabla Fuels
            'Ver combustible',
            'Carga combustible',
            'Editar carga',
            'Borrar carga',
            //Tabla TypeFuels
            'Ver tipos combustible',
            'Agregar tipos combustible',
            'Editar tipos combustible',
            'Borrar tipos combustible',
           


        ];
        foreach ($permisos as $permiso) {
            // code...
            Permission::create(['name' => $permiso]);
        }
    }
}
