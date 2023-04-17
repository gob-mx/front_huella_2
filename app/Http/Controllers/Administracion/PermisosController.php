<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Http\Requests\Account\SettingsEmailRequest;
// use App\Http\Requests\Account\SettingsInfoRequest;
// use App\Http\Requests\Account\SettingsPasswordRequest;
// use App\Models\UserInfo;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Storage;
// use Jackiedo\LogReader\LogReader;
use App\DataTables\Administracion\PermisosDataTable;
use Illuminate\Support\Facades\Validator;
use App\Models\Administracion\ModulsPermissions;
use Spatie\Permission\Models\Permission;
use App\Models\Administracion\Moduls;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Arr;
use App\Models\UserInfo;
use App\Models\User;
use Hash;
use DB;

class PermisosController extends Controller
{
	public function index(PermisosDataTable $dataTable)
	{
		return $dataTable->render('administracion.permisos.permisos_lista');
	}

	public function store(Request $request)
	{
		$request->offsetUnset('nombre');

		$rules = [
			'name' => 'required|unique:permissions,name'
		];
		$customMessages = [
			'name.required' => 'Campo <b>Nombre del Permiso</b> es Obligatorio',
			'name.unique' => 'Campo <b>Nombre del Permiso</b> ya esxiste, debes modificarlo'
		];

		$errors = validateErrors($request, $rules, $customMessages);

		if($errors){
			$response = [
				'st' 	=> false,
				'title' => "Campos Requeridos",
				'msg' 	=> $errors,
				'type' 	=> 'warning',
			];
			\Log::debug(__METHOD__.' ==> '.auth()->user()->id.' ==> '.auth()->user()->email." ==> validateErrors \n".json_encode($response));
			return response()->json($response,200,[],JSON_UNESCAPED_UNICODE);
		}

		$input = $request->all();
		$input['guard_name'] = 'web';

		// dd($input);

		try {
			DB::beginTransaction();

			$storePermission = Permission::create($input);
			$input['permission_id'] = $storePermission->id;
			// dd($input);
			$storeModulPermissions = ModulsPermissions::create($input);

			DB::commit();
		} catch (\PDOException $e) {
			\Log::debug(__METHOD__.' ==> '.auth()->user()->id.' ==> '.auth()->user()->email." ==> PDOException \n".(string)$e->getMessage());
			
			$response = [
				'st' 	=> false,
				'title' => "Error",
				'msg' 	=> (string)$e->getMessage(),
				'type' 	=> 'error',
			];
			return response()->json($response,200,[],JSON_UNESCAPED_UNICODE);

			DB::rollBack();
		} catch (\Exception $e) {
			\Log::debug(__METHOD__.' ==> '.auth()->user()->id.' ==> '.auth()->user()->email." ==> Exception \n".(string)$e->getMessage());
			
			$response = [
				'st' 	=> false,
				'title' => "Error",
				'msg' 	=> (string)$e->getMessage(),
				'type' 	=> 'error',
			];
			return response()->json($response,200,[],JSON_UNESCAPED_UNICODE);

			DB::rollBack();
		}

		if ($storePermission AND $storeModulPermissions) {
			$response = [
				'st' 	=> true,
				'title'	=> "Permiso Creado",
				'msg' 	=> $request->name,
				'type' 	=> 'success',
			];
		}else{
			return [
				'st' 	=> false,
				'title' => "Error",
				'msg' 	=> "Favor de Intentar Nuevamente o Comunicarse con un Administrador<br>MDL-ERR-STORE",
				'type' 	=> 'error',
			];
		}

		return response()->json($response,200,[],JSON_UNESCAPED_UNICODE);
	}

	public function update(Request $request, $id)
	{
		$rules = [
			'name' => 'required|unique:permissions,name,'.$id
		];
		$customMessages = [
			'name.required' => 'Campo <b>Nombre Permiso</b> es requerido',
			'name.unique' => 'Campo <b>Nombre Permiso</b> ya esxiste'
		];

		$errors = validateErrors($request, $rules, $customMessages);

		if($errors){
			$response = [
				'st' 	=> false,
				'title' => "Campos Requeridos",
				'msg' 	=> $errors,
				'type' 	=> 'warning',
			];
			\Log::debug(__METHOD__.' ==> '.auth()->user()->id.' ==> '.auth()->user()->email." ==> validateErrors \n".json_encode($response));
			return response()->json($response,200,[],JSON_UNESCAPED_UNICODE);
		}

		$permiso = Permission::find($id);
		$permiso->name = $request->input('name');
		
		if ($permiso->save()) {
			return [
				'st' => true,
				'title' => "Permiso: $permiso->name",
				'msg' => "<span class='text-success fw-bold'>Permiso Actualizado Correctamente</span>",
				'type' => 'success',
				'code' => 'ROL-000'
			];
		}else{
			return [
				'status' => true,
				'title' => "ERR ROL-002",
				'msg' => "<span class='kt-font-danger fw-bold'>Sin guardar Permiso, Favor de Intentar nuevamente o comunicarse con un Administrador</span>",
				'type' => 'error',
				'code' => 'ROL-002'
			];
		}
	}
}
