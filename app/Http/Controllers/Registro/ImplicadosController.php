<?php

namespace App\Http\Controllers\Registro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use \Exception;
use App\Models\RegistroImplicados\CarpetaInvestigacion;
use App\Models\RegistroImplicados\CatEstatusInvestigacion;
use App\Models\RegistroImplicados\DomicilioDelito;
use App\Models\RegistroImplicados\Implicados;
use App\Models\RegistroImplicados\Personas;

use App\Models\User;

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
        if($request->store_implicado){
            // return $this->store_implicado($request);
            return $this->store_implicado_demo($request);
        }

        $rules = [
            'carpeta_investigacion' => 'required|unique:carpeta_investigacion,carpeta_investigacion',
            'estatus_investigacion_id' => 'required',
            'averiguacion_previa' => 'nullable|unique:carpeta_investigacion,averiguacion_previa',
        ];
        $customMessages = [
            'carpeta_investigacion.required' => 'Campo <b>CARPETA DE INVESTIGACIÓN</b> es requerido',
            'carpeta_investigacion.unique' => '<b>CARPETA DE INVESTIGACIÓN</b> ya esxiste',
            'averiguacion_previa.required' => 'Campo <b>NÚMERO DE AVERIGUACIÓN PREVIA</b> es requerido',
            'averiguacion_previa.unique' => '<b>NÚMERO DE AVERIGUACIÓN PREVIA</b> ya esxiste',
        ];

        $errors = validateErrors($request, $rules, $customMessages);

        if($errors){
            $response = [
                'st'    => false,
                'title' => "Campos Requeridos",
                'msg'   => $errors,
                'type'  => 'warning',
            ];
            // \Log::debug(__METHOD__.' ==> '.auth()->user()->id.' ==> '.auth()->user()->email." ==> validateErrors \n".json_encode($response));
            return response()->json($response,200,[],JSON_UNESCAPED_UNICODE);
        }
        // dd( $request->all());

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

            $storeCI = CarpetaInvestigacion::create($carpeta_investigacion);

            $domicilio_delito = [
                'pais' => $input['pais_delito'],
                'calle' => $input['calle_delito'],
                'numero_exterior' => $input['numero_exterior_delito'],
                'numero_interior' => $input['numero_interior_delito'],
                'colonia' => $input['colonia_delito'],
                'delegacion_municipio' => $input['delegacion_municipio_delito'],
                'codigo_postal' => $input['codigo_postal_delito'],
                'carpeta_investigacion_id' => $storeCI->id,
            ];

            $storeDD = DomicilioDelito::create($domicilio_delito);
            
        } catch (Exception $e) {
            $response = [
                'st'    => false,
                'title' => "Error",
                'msg'   => (string)$e->getMessage(),
                'type'  => 'error',
            ];
            return response()->json($response,200,[],JSON_UNESCAPED_UNICODE);
        }

        if ($storeCI) {
            $response = [
                'st'    => true,
                'title' => "Carpeta de Investigacion $request->carpeta_investigacion",
                'msg'   => "Generada Correctamente",
                'type'  => 'success',
                'ci_id' => $storeCI->id,
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

    public function store_implicado_demo($request)
    {

        // dd('store_implicado',$request->all());

        $input = $request->all();

        try {

            $personas = [
                'nombre' => $input['nombre'],
                'apellido_paterno' => $input['apellido_paterno'],
                'apellido_materno' => $input['apellido_materno'],
                'carpeta_investigacion_id' => $input['carpeta_investigacion_id'],
                'implicado' => '1',
                'password' => bcrypt('12345678'),
            ];

            // DD($personas);

            $storePer = User::create($personas);

            $implicados = [
                'carpeta_investigacion_id' => $input['carpeta_investigacion_id'],
                'persona_id' => $storePer->id,
                'tipo_implicado_id' => '1',
            ];

            $storeImp = Implicados::create($implicados);
            
        } catch (Exception $e) {
            $response = [
                'st'    => false,
                'title' => "Error",
                'msg'   => (string)$e->getMessage(),
                'type'  => 'error',
            ];
            return response()->json($response,200,[],JSON_UNESCAPED_UNICODE);
        }

        if ($storePer) {
            $response = [
                'st'    => true,
                'title' => "Carpeta de Investigacion $request->carpeta_investigacion",
                'msg'   => "Generada Correctamente",
                'type'  => 'success',
                'ci_id' => $input['carpeta_investigacion_id'],
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

        // $personas = \DB::connection('mysql')->table('carpeta_investigacion')
        //     ->join("implicados","implicados.carpeta_investigacion_id","=","carpeta_investigacion.id")
        //     ->join("personas","personas.id","=","implicados.persona_id")
        //     ->where('carpeta_investigacion.id',$id)
        //     ->get();

        $personas = \DB::connection('mysql')->table('carpeta_investigacion')
            ->join("implicados","implicados.carpeta_investigacion_id","=","carpeta_investigacion.id")
            ->join("personas","personas.id","=","implicados.persona_id")
            ->where('carpeta_investigacion.id',$id)
            ->get();

        // dd($personas);

        return view('registro.implicados.implicados_editar',compact('estatus_carpeta','carpeta','personas'));
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

    public function store_implicado($request)
    {

        // dd('store_implicado',$request->all());

        $input = $request->all();

        try {

            $personas = [
                'nombre' => $input['nombre'],
                'apellido_paterno' => $input['apellido_paterno'],
                'apellido_materno' => $input['apellido_materno'],
                'alias' => $input['alias'],
                'rfc' => $input['rfc'],
                'curp' => $input['curp'],
                'fecha_nacimiento' => $input['fecha_nacimiento'],
                'estatura' => $input['estatura'],
                'celular' => $input['celular'],
                'telefono' => $input['telefono'],
                'nacionalidad' => $input['nacionalidad'],
                'pais_nacimiento' => $input['pais_nacimiento'],
                'lugar_nacimiento' => $input['lugar_nacimiento'],
                'estudios' => $input['estudios'],
                'ocupacion' => $input['ocupacion'],
            ];

            $storePer = Personas::create($personas);

            $implicados = [
                'carpeta_investigacion_id' => $input['carpeta_investigacion_id'],
                'persona_id' => $storePer->id,
                'tipo_implicado_id' => '1',
            ];

            $storeImp = Implicados::create($implicados);
            
        } catch (Exception $e) {
            $response = [
                'st'    => false,
                'title' => "Error",
                'msg'   => (string)$e->getMessage(),
                'type'  => 'error',
            ];
            return response()->json($response,200,[],JSON_UNESCAPED_UNICODE);
        }

        if ($storePer) {
            $response = [
                'st'    => true,
                'title' => "Carpeta de Investigacion $request->carpeta_investigacion",
                'msg'   => "Generada Correctamente",
                'type'  => 'success',
                'ci_id' => $input['carpeta_investigacion_id'],
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
    }
}
