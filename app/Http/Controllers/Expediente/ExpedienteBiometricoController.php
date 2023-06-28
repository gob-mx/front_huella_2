<?php

namespace App\Http\Controllers\Expediente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use \Exception;
use Illuminate\Support\Facades\DB;
use App\Models\User;

use App\Models\Catalogos\Sexo;
use App\Models\Catalogos\EstadoCivil;
use App\Models\Catalogos\SeniaParticular;
use App\Models\Catalogos\TipoRegistro;
use App\Models\Catalogos\SituacionPersona;
use App\Models\Catalogos\Peligrosidad;
use App\Models\Catalogos\RegistrosNacionales;
use App\Models\Catalogos\Nacionalidad;

use App\Models\Expediente\ExpedienteBiometrico;
use App\Models\Expediente\Persona;
use App\Models\Expediente\Domicilio;
use App\Models\Expediente\PersonaSenias;
use App\Models\Expediente\Senias;

class ExpedienteBiometricoController extends Controller
{

	public function index()
	{
		$sexo = Sexo::where('activo',1)->get();
		$estado_civil = EstadoCivil::where('activo',1)->get();
		$senia_particular = SeniaParticular::where('activo',1)->get();
		$tipo_registro = TipoRegistro::where('activo',1)->get();
		$situacion_persona = SituacionPersona::where('activo',1)->get();
		$peligrosidad = Peligrosidad::where('activo',1)->get();
		$registros_nacionales = RegistrosNacionales::where('activo',1)->get();
		$nacionalidad = Nacionalidad::where('activo',1)->get();

		return view('expediente.captura',compact('sexo','estado_civil','senia_particular','tipo_registro','situacion_persona','peligrosidad','registros_nacionales','nacionalidad'));
	}

	public function create()
	{
		dd('create');
	}

	public function store(Request $request)
	{
		$rules = [
            'nombre' => 'required',
            'fecha_nacimiento' => 'required',
            'sexo' => 'nullable',
        ];
        $customMessages = [
            'nomnbre.required' => 'Campo <b>NOMBRE</b> es requerido',
            'fecha_nacimiento.required' => 'Campo <b>FECHA NACIMIENTO</b> es requerido',
            'sexo.required' => 'Campo <b>SEXO</b> es requerido',
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

        $input = $request->all();

        try {

        	DB::beginTransaction();

	            $expediente = ExpedienteBiometrico::create($input);
	            $input['expediente_biometrico_id'] = $expediente->id;
	            $domicilio = Domicilio::create($input);
	            $input['domicilio_id'] = $domicilio->id;
	            $persona = Persona::create($input);
	            $personaUp = Persona::find($persona->id);
				$personaUp->subject_id = $persona->id;
				$personaUp->save();

            DB::commit();
            
        } catch (Exception $e) {
        	DB::rollBack();
            $response = [
                'st'    => false,
                'title' => "Error",
                'msg'   => (string)$e->getMessage(),
                'type'  => 'error',
            ];
            return response()->json($response,200,[],JSON_UNESCAPED_UNICODE);
        }

        if ($expediente AND $domicilio AND $persona AND $personaUp) {
            $response = [
                'st'    => true,
                'title' => "Expediente $expediente->id",
                'msg'   => "Generado Correctamente",
                'type'  => 'success',
                'expediente_id' => $expediente->id,
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

	public function show($id)
	{
		dd('show');
	}

	public function edit($id)
	{
		// dd($id);
		$catalogo = $this->getCatalogos();
		$sexo = $catalogo['sexo'];
		$estado_civil = $catalogo['estado_civil'];
		$senia_particular = $catalogo['senia_particular'];
		$tipo_registro = $catalogo['tipo_registro'];
		$situacion_persona = $catalogo['situacion_persona'];
		$peligrosidad = $catalogo['peligrosidad'];
		$registros_nacionales = $catalogo['registros_nacionales'];
		$nacionalidad = $catalogo['nacionalidad'];

		$expediente = ExpedienteBiometrico::find($id);

		// dd($expediente->Persona->Subject);
		

		return view('expediente.expediente_detalle',
			compact(
				'sexo',
				'estado_civil',
				'senia_particular',
				'tipo_registro',
				'situacion_persona',
				'peligrosidad',
				'registros_nacionales',
				'nacionalidad',
				'expediente'
			)
		);
	}

	public function update(Request $request, $id)
	{
		dd('update');
	}

	public function destroy($id)
	{
		dd('destroy');
	}

	public function getCatalogos()
	{
		return [
			'sexo' => Sexo::where('activo',1)->get(),
			'estado_civil' => EstadoCivil::where('activo',1)->get(),
			'senia_particular' => SeniaParticular::where('activo',1)->get(),
			'tipo_registro' => TipoRegistro::where('activo',1)->get(),
			'situacion_persona' => SituacionPersona::where('activo',1)->get(),
			'peligrosidad' => Peligrosidad::where('activo',1)->get(),
			'registros_nacionales' => RegistrosNacionales::where('activo',1)->get(),
			'nacionalidad' => Nacionalidad::where('activo',1)->get(),
		];

	}

}
