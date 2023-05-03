<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\Administracion\Moduls;
use App\Models\User;
use DB;

class RolesController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::with('permissions')->get();
        $modulos = Moduls::with('Permissions')->get();

        /*============================================================================
		=            Valida que solo roles SADMIN puedan mismo rol SADMIN            =
		============================================================================*/
		$userRoles = auth()->user()->getRoleNames()->toArray();
		if ( !in_array('SADMIN', $userRoles) ) {
			$roles = $roles->whereNotIn('name',['SADMIN']);
			$modulos = $modulos->whereNotIn('name',['LOGS']);
		}

        if(!$request->ajax()){
            return view('administracion.roles.roles_lista',compact('roles','modulos'));
        }

        $data = [ 'roles' => $roles ];
        return response()->json($data,200,[],JSON_UNESCAPED_UNICODE);
    }

    public function store(Request $request)
    {
        $rules = [
			'name' => 'required|unique:roles,name',
			'permisos' => 'required',
		];
		$customMessages = [
			'name.required' => 'Campo <b>Nombre Rol</b> es requerido',
			'name.unique' => 'Campo <b>Nombre Rol</b> ya esxiste',
			'permisos.required' => 'Debes Elegir un <b>Rol</b> al menos'
		];

		$errors = validateErrors($request, $rules, $customMessages);

		if($errors){
			$response = [
				'st' 	=> true,
				'title' => "Campos Requeridos",
				'msg' 	=> $errors,
				'type' 	=> 'warning',
			];
			\Log::debug(__METHOD__.' ==> '.auth()->user()->id.' ==> '.auth()->user()->email." ==> validateErrors \n".json_encode($response));
			return response()->json($response,200,[],JSON_UNESCAPED_UNICODE);
		}

        $input = $request->all();

		$input['guard_name'] = 'web';

		try {
			DB::beginTransaction();

			$storeRole = Role::create($input);
			$input['role_id'] = $storeRole->id;
			$storeRole->syncPermissions($input['permisos']);

			DB::commit();
		} catch (\PDOException $e) {
			\Log::debug(__METHOD__.' ==> '.auth()->user()->id.' ==> '.auth()->user()->email." ==> PDOException \n".(string)$e->getMessage());
			
			$response = [
				'st' 	=> true,
				'title' => "Error",
				'msg' 	=> (string)$e->getMessage(),
				'type' 	=> 'error',
			];
			return response()->json($response,200,[],JSON_UNESCAPED_UNICODE);

			DB::rollBack();
		} catch (\Exception $e) {
			\Log::debug(__METHOD__.' ==> '.auth()->user()->id.' ==> '.auth()->user()->email." ==> Exception \n".(string)$e->getMessage());
			
			$response = [
				'st' 	=> true,
				'title' => "Error",
				'msg' 	=> (string)$e->getMessage(),
				'type' 	=> 'error',
			];
			return response()->json($response,200,[],JSON_UNESCAPED_UNICODE);

			DB::rollBack();
		}

        if ($storeRole) {
            $response = [
				'st' 	=> true,
				'title'	=> "Rol Creado",
				'msg' 	=> $request->name,
				'type' 	=> 'success'
			];
        }else{
            return [
                'st' 	=> true,
                'title' => "Error",
                'msg' 	=> "Favor de Intentar Nuevamente o Comunicarse con un Administrador<br>USR-ERR-STORE",
                'type' 	=> 'error',
            ];
        }

        return response()->json($response,200,[],JSON_UNESCAPED_UNICODE);
    }

    public function update(Request $request, $id)
	{

		$rules = [
			'name' => 'required|unique:roles,name,'.$id,
			'permisos' => 'required',
		];
		$customMessages = [
			'name.required' => 'Campo <b>Nombre Rol</b> es requerido',
			'name.unique' => 'Campo <b>Nombre Rol</b> ya esxiste',
			'permisos.required' => 'Debes Elegir un <b>Permiso</b> al menos'
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
	
		$role = Role::find($id);
		$role->name = $request->input('name');
		$role->syncPermissions($request->input('permisos'));
		
		if ($role->save()) {
			return [
				'st' => true,
				'title' => "Rol: $role->name",
				'msg' => "<span class='text-success fw-bold'>Permisos Actualizados Correctamente</span>",
				'type' => 'success',
				'code' => 'ROL-000'
			];
		}else{
			return [
				'status' => true,
				'title' => "ERR ROL-002",
				'msg' => "<span class='kt-font-danger fw-bold'>Sin guardar Permisos, Favor de Intentar nuevamente o comunicarse con un Administrador</span>",
				'type' => 'error',
				'code' => 'ROL-002'
			];
		}
	}
}
