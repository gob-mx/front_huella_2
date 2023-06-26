<?php

namespace App\Http\Controllers\Expediente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use \Exception;
use App\Models\User;

use App\Models\Catalogos\Sexo;
use App\Models\Catalogos\EstadoCivil;
use App\Models\Catalogos\SeniaParticular;
use App\Models\Catalogos\TipoRegistro;
use App\Models\Catalogos\SituacionPersona;
use App\Models\Catalogos\Peligrosidad;
use App\Models\Catalogos\RegistrosNacionales;
use App\Models\Catalogos\Nacionalidad;

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
		dd('store');
	}

	public function show($id)
	{
		dd('show');
	}

	public function edit($id)
	{
		dd('edit');
	}

	public function update(Request $request, $id)
	{
		dd('update');
	}

	public function destroy($id)
	{
		dd('destroy');
	}

}
