<?php

namespace App\Http\Controllers\Registro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use \Exception;
use App\Models\RegistroImplicados\CarpetaInvestigacion;
use App\Models\RegistroImplicados\CatEstatusInvestigacion;

class ImplicadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estatus_carpeta = CatEstatusInvestigacion::all();
        return view('registro.implicados.implicados_form',compact('estatus_carpeta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd( $request->all());
        $rules = [
            'carpeta_investigacion' => 'required',
            // 'apellido_paterno' => 'required',
            // 'apellido_materno' => 'required',
        ];
        // $customMessages = [
        //     'name.required' => 'Campo <b>Nombre Rol</b> es requerido',
        //     'name.unique' => 'Campo <b>Nombre Rol</b> ya esxiste',
        //     'permisos.required' => 'Debes Elegir un <b>Rol</b> al menos',
        // ];

        $errors = validateErrors($request, $rules);

        if($errors){
            $response = [
                'st'    => true,
                'title' => "Campos Requeridos",
                'msg'   => $errors,
                'type'  => 'warning',
            ];
            // \Log::debug(__METHOD__.' ==> '.auth()->user()->id.' ==> '.auth()->user()->email." ==> validateErrors \n".json_encode($response));
            return response()->json($response,200,[],JSON_UNESCAPED_UNICODE);
        }

        $input = $request->all();

        try {

            $carpeta_investigacion = [
                'carpeta_investigacion' => $input['carpeta_investigacion'],
                'averiguacion_previa' => $input['averiguacion_previa'],
                'delito' => $input['delito'],
                'descripcion_delito' => $input['descripcion_delito'],
                'total_implicados' => $input['total_implicados'],
                'observaciones' => $input['observaciones'],
                'fecha_hechos' => $input['fecha_hechos'],
                'fecha_registro' => $input['fecha_registro'],
                'estatus_investigacion_id' => $input['estatus_investigacion_id'],
            ];

            $storeCarpInv = CarpetaInvestigacion::create($carpeta_investigacion);
            
        } catch (Exception $e) {
            $response = [
                'st'    => false,
                'title' => "Error",
                'msg'   => (string)$e->getMessage(),
                'type'  => 'error',
            ];
            return response()->json($response,200,[],JSON_UNESCAPED_UNICODE);
        }

        if ($storeCarpInv) {
            $response = [
                'st'    => true,
                'title' => "Carpeta de Investigacion $request->carpeta_investigacion",
                'msg'   => "Generada Correctamente",
                'type'  => 'success',
                'ci_id' => $storeCarpInv->id,
            ];
        }else{
            $response = [
                'st'    => false,
                'title' => "Error",
                'msg'   => "Favor de Intentar Nuevamente o Comunicarse con un Administrador<br>MDL-ERR-STORE",
                'type'  => 'error',
            ];
        }

        return response()->json($response,200,[],JSON_UNESCAPED_UNICODE);

        dd($carpeta_investigacion);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd('show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carpeta = CarpetaInvestigacion::find($id);
        $estatus_carpeta = CatEstatusInvestigacion::all();
        return view('registro.implicados.implicados_form',compact('estatus_carpeta','carpeta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd('update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
