<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
            //Operaciones sobre tabla roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',

            //Operacions sobre tabla empresas
            'ver-empresa',
            'crear-empresa',
            'editar-empresa',
            'borrar-empresa',

            //Operacions sobre tabla almacenes
            'ver-almacen',
            'crear-almacen',
            'editar-almacen',
            'borrar-almacen',

            //Operacions sobre tabla articulos
            'ver-articulo',
            'crear-articulo',
            'editar-articulo',
            'borrar-articulo',

            //Operacions sobre tabla proyectos
            'ver-proyecto',
            'crear-proyecto',
            'editar-proyecto',
            'borrar-proyecto'

        ];

        foreach($permisos as $permiso) {
            Permission::create(['name'=>$permiso]);
        }
    }
}
