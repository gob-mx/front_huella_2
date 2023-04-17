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
// use App\DataTables\Administracion\PermisosDataTable;
use Illuminate\Support\Facades\Validator;
// use Spatie\Permission\Models\Role;
// use Illuminate\Support\Arr;
// use App\Models\UserInfo;
use App\Models\Administracion\ModulsPermissions;
use Spatie\Permission\Models\Permission;
use App\Models\Administracion\Moduls;
use App\Models\User;
use Hash;
use DB;

class ModulosController extends Controller
{
	public function index(PermisosDataTable $dataTable)
	{
		return 'Index ModulosController';
	}

	public function store(Request $request)
	{

		$rules = [
			'name' => 'required|unique:moduls,name',
			'acronym' => 'required|unique:moduls,acronym'
		];
		$customMessages = [
			'name.required' => 'Campo <b>Nombre del Módulo</b> es Obligatorio',
			'name.unique' => 'Campo <b>Nombre del Módulo</b> ya esxiste, debes modificarlo',
			'acronym.required' => 'Campo <b>Nombre del Acrónimo</b> es Obligatorio',
			'acronym.unique' => 'Campo <b>Nombre del Acrónimo</b> ya esxiste, debes modificarlo'
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

		// dd($request->all());

		$input = $request->all();

		try {
			DB::beginTransaction();

			$storeModul = Moduls::create($input);

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

		if ($storeModul) {
			$response = [
				'st' 	=> true,
				'title'	=> "Módulo Creado",
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
		$acronimo_ant = $request->acronimo_ant;
		$request->offsetUnset('acronimo_ant');

		$rules = [
			'name' => 'required|unique:moduls,name,'.$id,
			'acronym' => 'required|unique:moduls,acronym,'.$id,
		];
		$customMessages = [
			'name.required' => 'Campo <b>Nombre del Módulo</b> es Obligatorio',
			'name.unique' => 'Campo <b>Nombre del Módulo</b> ya esxiste, debes modificarlo',
			'acronym.required' => 'Campo <b>Nombre del Acrónimo</b> es Obligatorio',
			'acronym.unique' => 'Campo <b>Nombre del Acrónimo</b> ya esxiste, debes modificarlo'
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

		try {
			DB::beginTransaction();

				$moduloUpdate = Moduls::find($id);
				$moduloUpdate->name = $request->input('name');
				$moduloUpdate->acronym = $request->input('acronym');

				$input['modul_id'] = $moduloUpdate->id;

				$permissions = $moduloUpdate->Permissions()->get();

				foreach ($permissions as $key) {
					$key->name = substr_replace( $key->name, '', -strlen('_'.$acronimo_ant) );
					$key->name = $key->name.'_'.$input['acronym'];

					$permissionUpdte = Permission::find($key->id);
					$permissionUpdte->name = $key->name;
					$permissionUpdte->save();
				}

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

		if ($moduloUpdate->save()) {
			$response = [
				'st' 	=> true,
				'title'	=> "Módulo Creado",
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
}
