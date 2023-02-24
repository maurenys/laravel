<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

//spati
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
            $permisos = [
            //tabla roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',
            //tabla areas
            'ver-area',
            'crear-area',
            'editar-area',
            'borrar-area',

            'ver-trabajador',
            'crear-trabajador',
            'editar-trabajador',
            'borrar-trabajador',

            'ver-vacacion',
            'crear-vacacion',
            'editar-vacacion',
            'borrar-vacacion',
        ];

        foreach($permisos as $permiso){
            Permission::create(['name'=>$permiso]);

        }


    }
}
