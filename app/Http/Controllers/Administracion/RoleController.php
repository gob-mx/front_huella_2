<?php
	
namespace App\Http\Controllers\Administracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Yajra\Datatables\Datatables;
use DB;
	
class RoleController extends Controller
{
	public function index(Request $request)
	{
		if(!$request->ajax()){
			return view('roles.index');
		}

		$html = view('roles.roles_dt')->render();
		return [
			'status' => true,
			'html' => $html,
			'function' => 'roles_dt'
		];
	}

	public function roles_dt(Request $request){
		try{
			$qry = Role::orderBy('id','DESC')->get();

			return Datatables::of($qry)
				->addColumn('actions', function($qry) {
					$result = '';

					$result.= '<button class="btn btn-info btn-icon" onclick="load_page(\'container_target\',\'dashboard/roles/'.$qry->id.'\');"><i class="fa fa-eye" title="Ver"></i></button> ';
					
					if(Auth()->user()->hasPermissionTo('role-edit')){
						$result.= '<button class="btn btn-info btn-icon" onclick="load_page(\'container_target\',\'dashboard/roles/'.$qry->id.'/edit\');"><i class="fa fa-edit" title="Editar"></i></button> ';
					}
					
					if(Auth()->user()->hasPermissionTo('role-delete')){
						$result.= '<button type="button" class="btn btn-google btn-icon" onclick="role_destroy(\'container_target\',\'dashboard/roles/'.$qry->id.'\',\''.$qry->name.'\');"><i class="fa fa-trash-alt" title="Eliminar"></i></button> ';
					}
					
					return $result;
				})
				->rawColumns(['actions'])
				->toJson();
				
		}catch(\Exception $e){
			Bitacora::log(__METHOD__, $e, "Error en tiempo de ejecución", 'error');
		}
	}

	public function create()
	{
		$permission = Permission::get();
		$html = view('roles.create',compact('permission'))->render();
		return [
			'status' => true,
			'html' => $html,
			'function' => 'rol_create'
		];
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'name' => 'required|unique:roles,name',
			'permission' => 'required',
		],
		[
			'permission.required' => 'Al menos debe seleccionar un Permiso de Rol'
		]);

		$role = Role::create(['name' => $request->input('name')]);
		$role->syncPermissions($request->input('permission'));

		if ($role) {
			$html = view('roles.roles_dt')->with('message','Rol creado correctamente')->render();
			return [
				'status' => true,
				'title' => "$role->name",
				'msg' => "<span class='kt-font-cdmx'>Rol creado correctamente</span>",
				'type' => 'success',
				'code' => 'ROL-000',
				'html' => $html,
				'function' => 'roles_dt'
			];
		}else{
			return [
				'status' => false,
				'title' => "ERR ROL-004",
				'msg' => "<span class='kt-font-dabger'>Sin crear Rol, Favor de Intentar nuevamente o comunicarse con un Administrador</span>",
				'type' => 'error',
				'code' => 'ROL-002'
			];
		}
	}

	public function show($id)
	{
		$role = Role::find($id);
		$rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
			->where("role_has_permissions.role_id",$id)
			->get();

		$html = view('roles.show',compact('role','rolePermissions'))->render();
		return [
			'status' => true,
			'html' => $html
		];
	}

	public function edit($id)
	{
		$role = Role::find($id);
		$permission = Permission::get();
		$rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
			->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
			->all();

		$html = view('roles.edit',compact('role','permission','rolePermissions'))->render();
		return [
			'status' => true,
			'html' => $html,
			'function' => 'role_edit'
		];
	}

	public function update(Request $request, $id)
	{
		$this->validate($request, [
			'name' => 'required',
			'permission' => 'required',
		]);
	
		$role = Role::find($id);
		$role->name = $request->input('name');
		$role->syncPermissions($request->input('permission'));
		
		if ($role->save()) {

			$html = view('roles.roles_dt')->with('message','Rol actualizado correctamente')->render();
			return [
				'status' => true,
				'title' => "Rol: $role->name",
				'msg' => "<span class='kt-font-cdmx'>Permisos Actualizados Correctamente</span>",
				'type' => 'success',
				'code' => 'ROL-000',
				'html' => $html,
				'function' => 'roles_dt'
			];
		}else{
			return [
				'status' => true,
				'title' => "ERR ROL-002",
				'msg' => "<span class='kt-font-dabger'>Sin guardar Permisos, Favor de Intentar nuevamente o comunicarse con un Administrador</span>",
				'type' => 'error',
				'code' => 'ROL-002',
				'html' => $html
			];
		}
	}

	public function destroy($id)
	{
		$role = Role::find($id);
		// DB::table("roles")->where('id',$id)->delete();

		$html = view('roles.roles_dt')->render();
		return [
			'status' => true,
			'title' => "Rol: $role->name",
			// 'msg' => "<span class='kt-font-cdmx'>Rol eliminado correctamente</span>",
			'msg' => "<span class='kt-font-cdmx'>Eliminación no publicada</span>",
			'type' => 'success',
			'code' => 'ROL-000',
			'html' => $html,
			'function' => 'roles_dt'
		];
	}
}