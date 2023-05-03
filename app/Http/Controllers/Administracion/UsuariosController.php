<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Http\Requests\Account\SettingsEmailRequest;
// use App\Http\Requests\Account\SettingsInfoRequest;
// use App\Http\Requests\Account\SettingsPasswordRequest;
// use App\Models\UserInfo;
// use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
// use Jackiedo\LogReader\LogReader;
use App\DataTables\Administracion\UsuariosDataTable;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Arr;
use App\Models\UserInfo;
use App\Models\User;
use App\Models\Administracion\Moduls;
use Hash;
use DB;

class UsuariosController extends Controller
{
    public function index(UsuariosDataTable $dataTable)
    {
        return $dataTable->render('administracion.usuarios.usuarios_lista');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $roles = Role::pluck('name')->all();

        if(!$request->ajax()){
            return view('administracion.usuarios.usuarios_vista');
        }

        $data = [ 'roles' => $roles ];
        return response()->json($data,200,[],JSON_UNESCAPED_UNICODE);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
			'nombre' => 'required',
			'apellido_paterno' => 'required',
			'apellido_materno' => 'required',
			'usuario' => 'required|unique:users,usuario',
			'password' => 'required|same:confirm-password',
			'email' => 'required|email|unique:users,email',
			'rfc' => 'sometimes|nullable|min:12|max:13',
			'curp' => 'sometimes|nullable|size:18',
			'telefono' => 'sometimes|nullable',
			'avatar' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048'
		];
		$customMessages = [
			'nombre.required' => 'Campo <b>Nombre</b> es obligatorio.',
			'apellido_paterno.required' => 'Campo <b>Apellido Paterno</b> es obligatorio.',
			'apellido_materno.required' => 'Campo <b>Apellido Materno</b> es obligatorio.',
			'usuario.required' => 'Campo <b>Usuario</b> es obligatorio.',
			'usuario.unique' => 'El Usuario <b>'.$request->usuario.'</b> ya esxiste, debes modificarlo.',
			'password.required' => 'Campo <b>Password</b> es obligatorio.',
			'password.same' => 'El <b>password y la confirmación del password</b> deben coincidir.',
			'email.required' => 'Campo <b>Correo Electrónico</b> es obligatorio.',
			'email.unique' => 'El Correo Electrónico <b>'.$request->email.'</b> ya esxiste, debes modificarlo.',
			'rfc.max' => 'El RFC <b>'.$request->rfc.'</b> no puede tener más de :max caracteres.',
			'rfc.min' => 'El RFC <b>'.$request->rfc.'</b> no puede tener menos de :min caracteres.',
			'curp.size' => 'El CURP <b>'.$request->curp.'</b> debe tener :size caracteres.',
			'avatar.max' => 'El <b>Avatar</b> no puede tener más de :max kilobytes.',
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
        // dd($input);
        $input['password'] = Hash::make($input['password']);

        $request['activo'] = $request->activo ?? '0';

		// $roles = json_decode($request->get('roles'));
		// $assignRole = [];
		
		// foreach ($roles as $key => $value) {
		// 	array_push($assignRole, $value->value);
		// }

		try {
			DB::beginTransaction();

			$user = User::create($input);
			$input['user_id'] = $user->id;

			if($request->avatar){

				$avatarNew = $request->file('avatar');
				$avatarExt = $avatarNew->extension();

				$avatarNew->move( public_path('avatars'), $user->usuario.'.'.$avatarExt );

				$input['avatar'] = $user->usuario.'.'.$avatarExt;

			}

			$userInfo = UserInfo::create($input);
			// $user->assignRole($assignRole);

			DB::commit();
		} catch (\PDOException $e) {
			\Log::debug(__METHOD__.' ==> '.auth()->user()->id.' ==> '.auth()->user()->email." ==> PDOException \n".(string)$e->getMessage());

			DB::rollBack();
			
			$response = [
				'st' 	=> false,
				'title' => "Error",
				'msg' 	=> (string)$e->getMessage(),
				'type' 	=> 'error',
			];
			return response()->json($response,200,[],JSON_UNESCAPED_UNICODE);
		} catch (\Exception $e) {
			\Log::debug(__METHOD__.' ==> '.auth()->user()->id.' ==> '.auth()->user()->email." ==> Exception \n".(string)$e->getMessage());

			DB::rollBack();
			
			$response = [
				'st' 	=> false,
				'title' => "Error",
				'msg' 	=> (string)$e->getMessage(),
				'type' 	=> 'error',
			];
			return response()->json($response,200,[],JSON_UNESCAPED_UNICODE);
		}

        if ($user) {
            $response = [
				'st' 	=> true,
				'title'	=> "Usuario Creado",
				'msg' 	=> $request->nombre.' '.$request->apellido_paterno.' '.$request->apellido_materno,
				'type' 	=> 'success',
				'redirect'	=> true,
				'u_id'	=> $user->id
			];
        }else{
            return [
                'st' 	=> false,
                'title' => "Error",
                'msg' 	=> "Favor de Intentar Nuevamente o Comunicarse con un Administrador<br>USR-ERR-STORE",
                'type' 	=> 'error',
            ];
        }

        return response()->json($response,200,[],JSON_UNESCAPED_UNICODE);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
	{
		// dd('show',$id);
		$user = User::with(['info'])->find($id);
		$roles = Role::pluck('name')->all();
		$user_roles = $user->roles->pluck('id','name')->all();

		return view('administracion.usuarios.partial.detalle_usuario',compact('user','roles','user_roles'))->render();
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
		$user = User::with(['info'])->find($id);
		$model = Role::with('permissions')->get();

		/*============================================================================
		=            Valida que solo roles SADMIN puedan mismo rol SADMIN            =
		============================================================================*/
		$userRoles = auth()->user()->getRoleNames()->toArray();
		if ( !in_array('SADMIN', $userRoles) ) {
			$model = $model->whereNotIn('name',['SADMIN']);
		}

		$roles_permisos = collect();
		$roles_permisos = $model->merge($roles_permisos);
		$roles_permisos = $roles_permisos->map(function ($a) {
			return (collect($a))->only([
				'id',
				'name',
				// 'guard_name',
				// 'created_at',
				// 'updated_at',
				'permissions',
				// 'pivot',
			]);
		});
		$roles_permisos = $roles_permisos->toArray();

		$roles = Role::pluck('id','name')->all();
		$permisos = Permission::pluck('id','name')->all();
		$moduls = DB::table('moduls_permissions')
					->join('moduls', 'moduls.id', '=', 'moduls_permissions.modul_id')
					->get();
		$moduls = $moduls->pluck('name','permission_id')->toArray();

		$user_roles = $user->roles->pluck('id','name')->all();
		$user_permisos = Role::whereIn('roles.id', $user_roles)->with('permissions')->get()->pluck('permissions')->flatten();
		$user_permisos = $user_permisos->unique('id')->pluck('id','name')->toArray();
		$user_modulos = DB::table('moduls_permissions')
					->join('moduls', 'moduls.id', '=', 'moduls_permissions.modul_id')
					->whereIn('permission_id',$user_permisos)->get();
		$user_modulos = $user_modulos->unique('id')->pluck('modul_id','name')->toArray();

		$moduls_permissions = Moduls::all();

		/*============================================================================
		=            Valida que solo roles SADMIN puedan mismo rol SADMIN            =
		============================================================================*/
		if ( !in_array('SADMIN', $userRoles) ) {
			$moduls_permissions = $moduls_permissions->whereNotIn('name',['LOGS']);
		}

		$directPermissions = $user->getDirectPermissions();
		// dd($directPermissions);


		// dd(
		// 	// $roles,
		// 	// $permisos,
		// 	$roles_permisos,
		// 	$moduls,
		// 	$user_roles,
		// 	$user_permisos,
		// 	$user_modulos,
		// 	$moduls_permissions,
		// );

		if(!$request->ajax()){
            return view('administracion.usuarios.usuarios_vista',compact('user','roles','permisos','moduls','user_roles','user_permisos','user_modulos','roles_permisos','moduls_permissions','directPermissions'));
        }

        $data = [
        	'user' => $user->toArray(),
        	'roles' => $roles,
        	'permisos' => $permisos,
        	'moduls' => $moduls,
        	'user_roles' => $user_roles,
        	'user_permisos' => $user_permisos,
        	'user_modulos' => $user_modulos,
        	'moduls_permissions' => $moduls_permissions,
        	'directPermissions' => $directPermissions
        ];

        return response()->json($data,200,[],JSON_UNESCAPED_UNICODE);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		// $file = $request->file('avatar');
		// dd($file);
    	//$request->offsetUnset('avatar');

    	// dd($id,$request->all());

    	if(isset($request['update'])){
    		$rules = [
				'roles' => 'required'
			];
		}else{
			$rules = [
				'nombre' => 'required',
				'apellido_paterno' => 'required',
				'apellido_materno' => 'required',
				'usuario' => 'required|unique:users,usuario,'.$id,
				'password' => 'same:confirm-password',
				'email' => 'required|email|unique:users,email,'.$id,
				'rfc' => 'sometimes|nullable|min:12|max:13',
				'curp' => 'sometimes|nullable|min:18|max:18',
				'telefono' => 'sometimes|nullable',
				'avatar' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
				'roles' => 'sometimes|nullable'
			];
		}


        $errors = validateErrors($request, $rules);

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

		if(isset($request['update'])){
			$roles = json_decode(json_encode($request->get('roles')));
        }

        if(!isset($request['update'])){
			$request['activo'] = $request->activo ?? '0';

			$input = $request->all();

	        if(!empty($input['password'])){ 
	            $input['password'] = Hash::make($input['password']);
	        }else{
	            $input = Arr::except($input,array('password'));    
	        }
	    }

	    // dd($request->all());

		try {
			DB::beginTransaction();

			if(!isset($request['update'])){

				$user = User::find($id);
				$user->update($input);

				$userInfo = UserInfo::where('user_id',$user->id)->first();

				if ($request->avatar_remove === '1') {
					$avatarOld = public_path('avatars/'.$userInfo->avatar);

					if (is_file($avatarOld) && file_exists($avatarOld)) {
						\File::delete($avatarOld);
					}

					$input['avatar'] = null;
				}

				if($request->avatar){

					$avatarOld = public_path('avatars/'.$userInfo->avatar);

					if (is_file($avatarOld) && file_exists($avatarOld)) {
						\File::delete($avatarOld);
					}

					$avatarNew = $request->file('avatar');
					$avatarExt = $avatarNew->extension();

					$avatarNew->move( public_path('avatars'), $user->usuario.'.'.$avatarExt );

					$input['avatar'] = $user->usuario.'.'.$avatarExt;

				}

				$userInfo->update($input);
			}else{

				$user = User::find($id);

				if ($request->permisos) {
					$user->syncPermissions($request->permisos);
				}else{
					$user->syncPermissions([]);
				}

				// dd('roles');

				DB::table('model_has_roles')->where('model_id',$id)->delete();
				$user->assignRole($roles);
			}

			DB::commit();
		} catch (\PDOException $e) {
			\Log::debug(__METHOD__.' ==> '.auth()->user()->id.' ==> '.auth()->user()->email." ==> PDOException \n".(string)$e->getMessage());

			DB::rollBack();
			
			$response = [
				'st' 	=> true,
				'title' => "Error",
				'msg' 	=> (string)$e->getMessage(),
				'type' 	=> 'error',
			];
			return response()->json($response,200,[],JSON_UNESCAPED_UNICODE);
		} catch (\Exception $e) {
			\Log::debug(__METHOD__.' ==> '.auth()->user()->id.' ==> '.auth()->user()->email." ==> Exception \n".(string)$e->getMessage());

			DB::rollBack();
			
			$response = [
				'st' 	=> true,
				'title' => "Error",
				'msg' 	=> (string)$e->getMessage(),
				'type' 	=> 'error',
			];
			return response()->json($response,200,[],JSON_UNESCAPED_UNICODE);
		}

        if ($user) {
	        $response = [
				'st'	=> true,
				'title'	=> 'Usuario Actualizado',
				'msg'	=> $request->nombre.' '.$request->apellido_paterno.' '.$request->apellido_materno,
				'type'	=> 'success'
			];

			// dd($response);
		}else{
			$response = [
				'st'	=> true,
				'title'	=> 'Error',
				'msg'	=> "Favor de Intentar Nuevamente o Comunicarse con un Administrador<br>USR-ERR-UPDATE",
				'type'	=> 'error'
			];
		}

        return response()->json($response,200,[],JSON_UNESCAPED_UNICODE);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
