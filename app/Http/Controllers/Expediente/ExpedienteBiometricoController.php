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
            'sexo_id' => 'required',
        ];
        $customMessages = [
            'nomnbre.required' => 'Campo <b>NOMBRE</b> es requerido',
            'fecha_nacimiento.required' => 'Campo <b>FECHA NACIMIENTO</b> es requerido',
            'sexo_id.required' => 'Campo <b>SEXO</b> es requerido',
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

		$fileenrolldata = $expediente->Persona->Subject->EnrollData;
		$enrolldata = utf8_encode($fileenrolldata);
		$pos = stripos($enrolldata, "ÿ¨\x00");
		$string = substr($enrolldata, $pos-4,9);
		$enrolldata = explode($string, $enrolldata);
		array_shift($enrolldata);
		foreach ($enrolldata as $key => $value) {
			$enrolldata[$key] = utf8_decode($string.$value);
		}
		

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
				'expediente',
				'fileenrolldata',
				'enrolldata'
			)
		);
	}

	public function update(Request $request, $id)
	{
		$rules = [
            'nombre' => 'required',
            'fecha_nacimiento' => 'required',
            'sexo_id' => 'required',
        ];
        $customMessages = [
            'nomnbre.required' => 'Campo <b>NOMBRE</b> es requerido',
            'fecha_nacimiento.required' => 'Campo <b>FECHA NACIMIENTO</b> es requerido',
            'sexo_id.required' => 'Campo <b>SEXO</b> es requerido',
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

		DB::beginTransaction();

        try {

        		$expediente = ExpedienteBiometrico::find($id);
        		$expediente->codigo_delito = $input['codigo_delito'];
				$expediente->tipo_registro_id = $input['tipo_registro_id'];
				$expediente->tipo_policia = $input['tipo_policia'];
				$expediente->situacion_persona_id = $input['situacion_persona_id'];
				$expediente->informacion = $input['informacion'];
				$expediente->peligrosidad_id = $input['peligrosidad_id'];
				$expediente->fecha_ingreso = $input['fecha_ingreso'];
				$expediente->registros_nacionales_id = $input['registros_nacionales_id'];
				$expediente->clave_identificacion_1 = $input['clave_identificacion_1'];
				$expediente->clave_identificacion_2 = $input['clave_identificacion_2'];
				$expediente->clave_identificacion_3 = $input['clave_identificacion_3'];
				$expediente->contacto_agencia = $input['contacto_agencia'];
				$expediente->comentarios = $input['comentarios'];
        		$expediente->save();

        		$persona = $expediente->Persona;
				$persona->nombre = $input['nombre'];
				$persona->apellido_paterno = $input['apellido_paterno'];
				$persona->apellido_materno = $input['apellido_materno'];
				$persona->fecha_nacimiento = $input['fecha_nacimiento'];
				$persona->sexo_id = $input['sexo_id'];
				$persona->estado_civil_id = $input['estado_civil_id'];
				$persona->curp = $input['curp'];
				$persona->nacionalidad_id = $input['nacionalidad_id'];
				$persona->pais_nacimiento = $input['pais_nacimiento'];
				$persona->entidad_nacimiento = $input['entidad_nacimiento'];
				$persona->peso = $input['peso'];
				$persona->estatura = $input['estatura'];
				$persona->save();

				$domicilio = $expediente->Persona->Domicilio;
				$domicilio->calle = $input['calle'];
				$domicilio->numero_exterior = $input['numero_exterior'];
				$domicilio->numero_interior = $input['numero_interior'];
				$domicilio->colonia = $input['colonia'];
				$domicilio->delegacion_municipio = $input['delegacion_municipio'];
				$domicilio->codigo_postal = $input['codigo_postal'];
				$domicilio->ciudad = $input['ciudad'];
				$domicilio->pais = $input['pais'];
				$domicilio->save();

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

        if ($expediente AND $domicilio AND $persona) {
            $response = [
                'st'    => true,
                'title' => "Expediente $expediente->id",
                'msg'   => "Actualizado Correctamente",
                'type'  => 'success',
                'expediente_id' => $expediente->id,
            ];
        }else{
            $response = [
                'st'    => false,
                'title' => "Error",
                'msg'   => "Favor de Intentar Nuevamente o Comunicarse con un Administrador<br>MDL-ERR-UPDT",
                'type'  => 'error',
            ];
        }

        return response()->json($response,200,[],JSON_UNESCAPED_UNICODE);
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

	public function template($template)
	{
		$expediente = ExpedienteBiometrico::find($template);
		$file = $expediente->Persona->Subject->Template;

		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename=Template_Id_'.$expediente->Persona->Subject->SubjectId.'.bin');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . strlen($file));
		echo $file;
		exit();
	}

	public function enrolldata($enrolldata)
	{
		$expediente = ExpedienteBiometrico::find($enrolldata);
		$file = $expediente->Persona->Subject->EnrollData;

		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename=EnrollData_Id_'.$expediente->Persona->Subject->SubjectId.'.wsq');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . strlen($file));
		echo $file;
		exit();
	}

	public function enrolldataByFingerPrint(Request $request)
	{
		// dd($request->all());
		// $expediente = ExpedienteBiometrico::find($enrolldata);
		$file = base64_decode($request->enrolldata);

		// $file = utf8_encode($file);
		
		// $pos = stripos($file, "ÿ¨\x00");

		// $string = substr($file, $pos-4,9);

		// $file = explode($string, $file);
		// array_shift($file);

		// foreach ($file as $key => $value) {
		// 	$file[$key] = utf8_decode($string.$value);
		// }

		// $file = $file[1];

		// dd($file);

		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename='.$request->name);
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . strlen($file));
		echo $file;
		exit();
	}

}
