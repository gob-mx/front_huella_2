<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use App\Models\Administracion\ModulsPermissions;
use App\Models\Administracion\Moduls;
  
class PermissionTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$permissions = [
			'listar_usuarios',
			'crear_usuarios',
			'editar_usuarios',
			'eliminar_usuarios',
			'listar_roles',
			'crear_roles',
			'editar_roles',
			'eliminar_roles',
			'listar_permisos',
			'crear_permisos',
			'editar_permisos',
			'eliminar_permisos',
			'listar_reg_aud',
			'crear_reg_aud',
			'editar_reg_aud',
			'reporte_reg_aud',
		];
	 
		foreach ($permissions as $permission) {
			$storePermissions = Permission::create(['name' => $permission]);
		}

		$moduls = [
			['name' => 'USUARIOS', 'acronym' => 'usuarios'],
			['name' => 'ROLES', 'acronym' => 'roles'],
			['name' => 'PERMISOS', 'acronym' => 'permisos'],
			['name' => 'REGISTROS DE AUDITORÍA', 'acronym' => 'reg_aud'],
		];

		// $acronym = [
		// 	'permisos',
		// 	'roles',
		// 	'usuarios',
		// 	'log_aud'
		// ];

		foreach ($moduls as $modul) {
			$storeModul = Moduls::create(['name' => $modul['name'],'acronym' => $modul['acronym']]);
		}

		$array = [
			[ 'permission_id' =>  1, 'modul_id' => 1 ],
			[ 'permission_id' =>  2, 'modul_id' => 1 ],
			[ 'permission_id' =>  3, 'modul_id' => 1 ],
			[ 'permission_id' =>  4, 'modul_id' => 1 ],
			[ 'permission_id' =>  5, 'modul_id' => 2 ],
			[ 'permission_id' =>  6, 'modul_id' => 2 ],
			[ 'permission_id' =>  7, 'modul_id' => 2 ],
			[ 'permission_id' =>  8, 'modul_id' => 2 ],
			[ 'permission_id' =>  9, 'modul_id' => 3 ],
			[ 'permission_id' => 10, 'modul_id' => 3 ],
			[ 'permission_id' => 11, 'modul_id' => 3 ],
			[ 'permission_id' => 12, 'modul_id' => 3 ],
			[ 'permission_id' => 13, 'modul_id' => 4 ],
			[ 'permission_id' => 14, 'modul_id' => 4 ],
			[ 'permission_id' => 15, 'modul_id' => 4 ],
			[ 'permission_id' => 16, 'modul_id' => 4 ]
		];

		foreach ($array as $arr) {
			ModulsPermissions::create($arr);
		}
	}
}
